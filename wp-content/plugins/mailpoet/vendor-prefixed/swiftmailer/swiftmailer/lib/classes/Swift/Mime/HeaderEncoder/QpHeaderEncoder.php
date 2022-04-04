<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_HeaderEncoder_QpHeaderEncoder extends Swift_Encoder_QpEncoder implements Swift_Mime_HeaderEncoder
{
 public function __construct(Swift_CharacterStream $charStream)
 {
 parent::__construct($charStream);
 }
 protected function initSafeMap()
 {
 foreach (\array_merge(\range(0x61, 0x7a), \range(0x41, 0x5a), \range(0x30, 0x39), [0x20, 0x21, 0x2a, 0x2b, 0x2d, 0x2f]) as $byte) {
 $this->safeMap[$byte] = \chr($byte);
 }
 }
 public function getName()
 {
 return 'Q';
 }
 public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0)
 {
 return \str_replace([' ', '=20', "=\r\n"], ['_', '_', "\r\n"], parent::encodeString($string, $firstLineOffset, $maxLineLength));
 }
}
