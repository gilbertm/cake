<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_ContentEncoder_NativeQpContentEncoder implements Swift_Mime_ContentEncoder
{
 private $charset;
 public function __construct($charset = null)
 {
 $this->charset = $charset ?: 'utf-8';
 }
 public function charsetChanged($charset)
 {
 $this->charset = $charset;
 }
 public function encodeByteStream(Swift_OutputByteStream $os, Swift_InputByteStream $is, $firstLineOffset = 0, $maxLineLength = 0)
 {
 if ('utf-8' !== $this->charset) {
 throw new \RuntimeException(\sprintf('Charset "%s" not supported. NativeQpContentEncoder only supports "utf-8"', $this->charset));
 }
 $string = '';
 while (\false !== ($bytes = $os->read(8192))) {
 $string .= $bytes;
 }
 $is->write($this->encodeString($string));
 }
 public function getName()
 {
 return 'quoted-printable';
 }
 public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0)
 {
 if ('utf-8' !== $this->charset) {
 throw new \RuntimeException(\sprintf('Charset "%s" not supported. NativeQpContentEncoder only supports "utf-8"', $this->charset));
 }
 return $this->standardize(\quoted_printable_encode($string));
 }
 protected function standardize($string)
 {
 // transform CR or LF to CRLF
 $string = \preg_replace('~=0D(?!=0A)|(?<!=0D)=0A~', '=0D=0A', $string);
 // transform =0D=0A to CRLF
 $string = \str_replace(["\t=0D=0A", ' =0D=0A', '=0D=0A'], ["=09\r\n", "=20\r\n", "\r\n"], $string);
 switch (\ord(\substr($string, -1))) {
 case 0x9:
 $string = \substr_replace($string, '=09', -1);
 break;
 case 0x20:
 $string = \substr_replace($string, '=20', -1);
 break;
 }
 return $string;
 }
}
