<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
abstract class Swift_Transport_AbstractSmtpTransport implements Swift_Transport
{
 protected $buffer;
 protected $started = \false;
 protected $domain = '[127.0.0.1]';
 protected $eventDispatcher;
 protected $addressEncoder;
 protected $pipelining = null;
 protected $pipeline = [];
 protected $sourceIp;
 protected abstract function getBufferParams();
 public function __construct(Swift_Transport_IoBuffer $buf, Swift_Events_EventDispatcher $dispatcher, $localDomain = '127.0.0.1', Swift_AddressEncoder $addressEncoder = null)
 {
 $this->buffer = $buf;
 $this->eventDispatcher = $dispatcher;
 $this->addressEncoder = $addressEncoder ?? new Swift_AddressEncoder_IdnAddressEncoder();
 $this->setLocalDomain($localDomain);
 }
 public function setLocalDomain($domain)
 {
 if ('[' !== \substr($domain, 0, 1)) {
 if (\filter_var($domain, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4)) {
 $domain = '[' . $domain . ']';
 } elseif (\filter_var($domain, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV6)) {
 $domain = '[IPv6:' . $domain . ']';
 }
 }
 $this->domain = $domain;
 return $this;
 }
 public function getLocalDomain()
 {
 return $this->domain;
 }
 public function setSourceIp($source)
 {
 $this->sourceIp = $source;
 }
 public function getSourceIp()
 {
 return $this->sourceIp;
 }
 public function setAddressEncoder(Swift_AddressEncoder $addressEncoder)
 {
 $this->addressEncoder = $addressEncoder;
 }
 public function getAddressEncoder()
 {
 return $this->addressEncoder;
 }
 public function start()
 {
 if (!$this->started) {
 if ($evt = $this->eventDispatcher->createTransportChangeEvent($this)) {
 $this->eventDispatcher->dispatchEvent($evt, 'beforeTransportStarted');
 if ($evt->bubbleCancelled()) {
 return;
 }
 }
 try {
 $this->buffer->initialize($this->getBufferParams());
 } catch (Swift_TransportException $e) {
 $this->throwException($e);
 }
 $this->readGreeting();
 $this->doHeloCommand();
 if ($evt) {
 $this->eventDispatcher->dispatchEvent($evt, 'transportStarted');
 }
 $this->started = \true;
 }
 }
 public function isStarted()
 {
 return $this->started;
 }
 public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
 {
 if (!$this->isStarted()) {
 $this->start();
 }
 $sent = 0;
 $failedRecipients = (array) $failedRecipients;
 if ($evt = $this->eventDispatcher->createSendEvent($this, $message)) {
 $this->eventDispatcher->dispatchEvent($evt, 'beforeSendPerformed');
 if ($evt->bubbleCancelled()) {
 return 0;
 }
 }
 if (!($reversePath = $this->getReversePath($message))) {
 $this->throwException(new Swift_TransportException('Cannot send message without a sender address'));
 }
 $to = (array) $message->getTo();
 $cc = (array) $message->getCc();
 $bcc = (array) $message->getBcc();
 $tos = \array_merge($to, $cc, $bcc);
 $message->setBcc([]);
 try {
 $sent += $this->sendTo($message, $reversePath, $tos, $failedRecipients);
 } finally {
 $message->setBcc($bcc);
 }
 if ($evt) {
 if ($sent == \count($to) + \count($cc) + \count($bcc)) {
 $evt->setResult(Swift_Events_SendEvent::RESULT_SUCCESS);
 } elseif ($sent > 0) {
 $evt->setResult(Swift_Events_SendEvent::RESULT_TENTATIVE);
 } else {
 $evt->setResult(Swift_Events_SendEvent::RESULT_FAILED);
 }
 $evt->setFailedRecipients($failedRecipients);
 $this->eventDispatcher->dispatchEvent($evt, 'sendPerformed');
 }
 $message->generateId();
 //Make sure a new Message ID is used
 return $sent;
 }
 public function stop()
 {
 if ($this->started) {
 if ($evt = $this->eventDispatcher->createTransportChangeEvent($this)) {
 $this->eventDispatcher->dispatchEvent($evt, 'beforeTransportStopped');
 if ($evt->bubbleCancelled()) {
 return;
 }
 }
 try {
 $this->executeCommand("QUIT\r\n", [221]);
 } catch (Swift_TransportException $e) {
 }
 try {
 $this->buffer->terminate();
 if ($evt) {
 $this->eventDispatcher->dispatchEvent($evt, 'transportStopped');
 }
 } catch (Swift_TransportException $e) {
 $this->throwException($e);
 }
 }
 $this->started = \false;
 }
 public function ping()
 {
 try {
 if (!$this->isStarted()) {
 $this->start();
 }
 $this->executeCommand("NOOP\r\n", [250]);
 } catch (Swift_TransportException $e) {
 try {
 $this->stop();
 } catch (Swift_TransportException $e) {
 }
 return \false;
 }
 return \true;
 }
 public function registerPlugin(Swift_Events_EventListener $plugin)
 {
 $this->eventDispatcher->bindEventListener($plugin);
 }
 public function reset()
 {
 $this->executeCommand("RSET\r\n", [250], $failures, \true);
 }
 public function getBuffer()
 {
 return $this->buffer;
 }
 public function executeCommand($command, $codes = [], &$failures = null, $pipeline = \false, $address = null)
 {
 $failures = (array) $failures;
 $seq = $this->buffer->write($command);
 if ($evt = $this->eventDispatcher->createCommandEvent($this, $command, $codes)) {
 $this->eventDispatcher->dispatchEvent($evt, 'commandSent');
 }
 $this->pipeline[] = [$command, $seq, $codes, $address];
 if ($pipeline && $this->pipelining) {
 return null;
 }
 $response = null;
 while ($this->pipeline) {
 list($command, $seq, $codes, $address) = \array_shift($this->pipeline);
 $response = $this->getFullResponse($seq);
 try {
 $this->assertResponseCode($response, $codes);
 } catch (Swift_TransportException $e) {
 if ($this->pipeline && $address) {
 $failures[] = $address;
 } else {
 $this->throwException($e);
 }
 }
 }
 return $response;
 }
 protected function readGreeting()
 {
 $this->assertResponseCode($this->getFullResponse(0), [220]);
 }
 protected function doHeloCommand()
 {
 $this->executeCommand(\sprintf("HELO %s\r\n", $this->domain), [250]);
 }
 protected function doMailFromCommand($address)
 {
 $address = $this->addressEncoder->encodeString($address);
 $this->executeCommand(\sprintf("MAIL FROM:<%s>\r\n", $address), [250], $failures, \true);
 }
 protected function doRcptToCommand($address)
 {
 $address = $this->addressEncoder->encodeString($address);
 $this->executeCommand(\sprintf("RCPT TO:<%s>\r\n", $address), [250, 251, 252], $failures, \true, $address);
 }
 protected function doDataCommand(&$failedRecipients)
 {
 $this->executeCommand("DATA\r\n", [354], $failedRecipients);
 }
 protected function streamMessage(Swift_Mime_SimpleMessage $message)
 {
 $this->buffer->setWriteTranslations(["\r\n." => "\r\n.."]);
 try {
 $message->toByteStream($this->buffer);
 $this->buffer->flushBuffers();
 } catch (Swift_TransportException $e) {
 $this->throwException($e);
 }
 $this->buffer->setWriteTranslations([]);
 $this->executeCommand("\r\n.\r\n", [250]);
 }
 protected function getReversePath(Swift_Mime_SimpleMessage $message)
 {
 $return = $message->getReturnPath();
 $sender = $message->getSender();
 $from = $message->getFrom();
 $path = null;
 if (!empty($return)) {
 $path = $return;
 } elseif (!empty($sender)) {
 // Don't use array_keys
 \reset($sender);
 // Reset Pointer to first pos
 $path = \key($sender);
 // Get key
 } elseif (!empty($from)) {
 \reset($from);
 // Reset Pointer to first pos
 $path = \key($from);
 // Get key
 }
 return $path;
 }
 protected function throwException(Swift_TransportException $e)
 {
 if ($evt = $this->eventDispatcher->createTransportExceptionEvent($this, $e)) {
 $this->eventDispatcher->dispatchEvent($evt, 'exceptionThrown');
 if (!$evt->bubbleCancelled()) {
 throw $e;
 }
 } else {
 throw $e;
 }
 }
 protected function assertResponseCode($response, $wanted)
 {
 if (!$response) {
 $this->throwException(new Swift_TransportException('Expected response code ' . \implode('/', $wanted) . ' but got an empty response'));
 }
 list($code) = \sscanf($response, '%3d');
 $valid = empty($wanted) || \in_array($code, $wanted);
 if ($evt = $this->eventDispatcher->createResponseEvent($this, $response, $valid)) {
 $this->eventDispatcher->dispatchEvent($evt, 'responseReceived');
 }
 if (!$valid) {
 $this->throwException(new Swift_TransportException('Expected response code ' . \implode('/', $wanted) . ' but got code "' . $code . '", with message "' . $response . '"', $code));
 }
 }
 protected function getFullResponse($seq)
 {
 $response = '';
 try {
 do {
 $line = $this->buffer->readLine($seq);
 $response .= $line;
 } while (null !== $line && \false !== $line && ' ' != $line[3]);
 } catch (Swift_TransportException $e) {
 $this->throwException($e);
 } catch (Swift_IoException $e) {
 $this->throwException(new Swift_TransportException($e->getMessage(), 0, $e));
 }
 return $response;
 }
 private function doMailTransaction($message, $reversePath, array $recipients, array &$failedRecipients)
 {
 $sent = 0;
 $this->doMailFromCommand($reversePath);
 foreach ($recipients as $forwardPath) {
 try {
 $this->doRcptToCommand($forwardPath);
 ++$sent;
 } catch (Swift_TransportException $e) {
 $failedRecipients[] = $forwardPath;
 } catch (Swift_AddressEncoderException $e) {
 $failedRecipients[] = $forwardPath;
 }
 }
 if (0 != $sent) {
 $sent += \count($failedRecipients);
 $this->doDataCommand($failedRecipients);
 $sent -= \count($failedRecipients);
 $this->streamMessage($message);
 } else {
 $this->reset();
 }
 return $sent;
 }
 private function sendTo(Swift_Mime_SimpleMessage $message, $reversePath, array $to, array &$failedRecipients)
 {
 if (empty($to)) {
 return 0;
 }
 return $this->doMailTransaction($message, $reversePath, \array_keys($to), $failedRecipients);
 }
 public function __destruct()
 {
 try {
 $this->stop();
 } catch (\Exception $e) {
 }
 }
 public function __sleep()
 {
 throw new \BadMethodCallException('Cannot serialize ' . __CLASS__);
 }
 public function __wakeup()
 {
 throw new \BadMethodCallException('Cannot unserialize ' . __CLASS__);
 }
}
