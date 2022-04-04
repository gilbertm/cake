<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_SimpleHeaderSet implements Swift_Mime_CharsetObserver
{
 private $factory;
 private $headers = [];
 private $order = [];
 private $required = [];
 private $charset;
 public function __construct(Swift_Mime_SimpleHeaderFactory $factory, $charset = null)
 {
 $this->factory = $factory;
 if (isset($charset)) {
 $this->setCharset($charset);
 }
 }
 public function newInstance()
 {
 return new self($this->factory);
 }
 public function setCharset($charset)
 {
 $this->charset = $charset;
 $this->factory->charsetChanged($charset);
 $this->notifyHeadersOfCharset($charset);
 }
 public function addMailboxHeader($name, $addresses = null)
 {
 $this->storeHeader($name, $this->factory->createMailboxHeader($name, $addresses));
 }
 public function addDateHeader($name, \DateTimeInterface $dateTime = null)
 {
 $this->storeHeader($name, $this->factory->createDateHeader($name, $dateTime));
 }
 public function addTextHeader($name, $value = null)
 {
 $this->storeHeader($name, $this->factory->createTextHeader($name, $value));
 }
 public function addParameterizedHeader($name, $value = null, $params = [])
 {
 $this->storeHeader($name, $this->factory->createParameterizedHeader($name, $value, $params));
 }
 public function addIdHeader($name, $ids = null)
 {
 $this->storeHeader($name, $this->factory->createIdHeader($name, $ids));
 }
 public function addPathHeader($name, $path = null)
 {
 $this->storeHeader($name, $this->factory->createPathHeader($name, $path));
 }
 public function has($name, $index = 0)
 {
 $lowerName = \strtolower($name ?? '');
 if (!\array_key_exists($lowerName, $this->headers)) {
 return \false;
 }
 if (\func_num_args() < 2) {
 // index was not specified, so we only need to check that there is at least one header value set
 return (bool) \count($this->headers[$lowerName]);
 }
 return \array_key_exists($index, $this->headers[$lowerName]);
 }
 public function set(Swift_Mime_Header $header, $index = 0)
 {
 $this->storeHeader($header->getFieldName(), $header, $index);
 }
 public function get($name, $index = 0)
 {
 $name = \strtolower($name ?? '');
 if (\func_num_args() < 2) {
 if ($this->has($name)) {
 $values = \array_values($this->headers[$name]);
 return \array_shift($values);
 }
 } else {
 if ($this->has($name, $index)) {
 return $this->headers[$name][$index];
 }
 }
 }
 public function getAll($name = null)
 {
 if (!isset($name)) {
 $headers = [];
 foreach ($this->headers as $collection) {
 $headers = \array_merge($headers, $collection);
 }
 return $headers;
 }
 $lowerName = \strtolower($name ?? '');
 if (!\array_key_exists($lowerName, $this->headers)) {
 return [];
 }
 return $this->headers[$lowerName];
 }
 public function listAll()
 {
 $headers = $this->headers;
 if ($this->canSort()) {
 \uksort($headers, [$this, 'sortHeaders']);
 }
 return \array_keys($headers);
 }
 public function remove($name, $index = 0)
 {
 $lowerName = \strtolower($name ?? '');
 unset($this->headers[$lowerName][$index]);
 }
 public function removeAll($name)
 {
 $lowerName = \strtolower($name ?? '');
 unset($this->headers[$lowerName]);
 }
 public function defineOrdering(array $sequence)
 {
 $this->order = \array_flip(\array_map('strtolower', $sequence));
 }
 public function setAlwaysDisplayed(array $names)
 {
 $this->required = \array_flip(\array_map('strtolower', $names));
 }
 public function charsetChanged($charset)
 {
 $this->setCharset($charset);
 }
 public function toString()
 {
 $string = '';
 $headers = $this->headers;
 if ($this->canSort()) {
 \uksort($headers, [$this, 'sortHeaders']);
 }
 foreach ($headers as $collection) {
 foreach ($collection as $header) {
 if ($this->isDisplayed($header) || '' != $header->getFieldBody()) {
 $string .= $header->toString();
 }
 }
 }
 return $string;
 }
 public function __toString()
 {
 return $this->toString();
 }
 private function storeHeader($name, Swift_Mime_Header $header, $offset = null)
 {
 if (!isset($this->headers[\strtolower($name ?? '')])) {
 $this->headers[\strtolower($name ?? '')] = [];
 }
 if (!isset($offset)) {
 $this->headers[\strtolower($name ?? '')][] = $header;
 } else {
 $this->headers[\strtolower($name ?? '')][$offset] = $header;
 }
 }
 private function canSort()
 {
 return \count($this->order) > 0;
 }
 private function sortHeaders($a, $b)
 {
 $lowerA = \strtolower($a ?? '');
 $lowerB = \strtolower($b ?? '');
 $aPos = \array_key_exists($lowerA, $this->order) ? $this->order[$lowerA] : -1;
 $bPos = \array_key_exists($lowerB, $this->order) ? $this->order[$lowerB] : -1;
 if (-1 === $aPos && -1 === $bPos) {
 // just be sure to be determinist here
 return $a > $b ? -1 : 1;
 }
 if (-1 == $aPos) {
 return 1;
 } elseif (-1 == $bPos) {
 return -1;
 }
 return $aPos < $bPos ? -1 : 1;
 }
 private function isDisplayed(Swift_Mime_Header $header)
 {
 return \array_key_exists(\strtolower($header->getFieldName() ?? ''), $this->required);
 }
 private function notifyHeadersOfCharset($charset)
 {
 foreach ($this->headers as $headerGroup) {
 foreach ($headerGroup as $header) {
 $header->setCharset($charset);
 }
 }
 }
 public function __clone()
 {
 $this->factory = clone $this->factory;
 foreach ($this->headers as $groupKey => $headerGroup) {
 foreach ($headerGroup as $key => $header) {
 $this->headers[$groupKey][$key] = clone $header;
 }
 }
 }
}
