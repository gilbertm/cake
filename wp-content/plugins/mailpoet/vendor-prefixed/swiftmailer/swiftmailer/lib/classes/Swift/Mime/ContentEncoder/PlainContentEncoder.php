<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_ContentEncoder_PlainContentEncoder implements Swift_Mime_ContentEncoder
{
 private $name;
 private $canonical;
 public function __construct($name, $canonical = \false)
 {
 $this->name = $name;
 $this->canonical = $canonical;
 }
 public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0)
 {
 if ($this->canonical) {
 $string = $this->canonicalize($string);
 }
 return $this->safeWordwrap($string, $maxLineLength, "\r\n");
 }
 public function encodeByteStream(Swift_OutputByteStream $os, Swift_InputByteStream $is, $firstLineOffset = 0, $maxLineLength = 0)
 {
 $leftOver = '';
 while (\false !== ($bytes = $os->read(8192))) {
 $toencode = $leftOver . $bytes;
 if ($this->canonical) {
 $toencode = $this->canonicalize($toencode);
 }
 $wrapped = $this->safeWordwrap($toencode, $maxLineLength, "\r\n");
 $lastLinePos = \strrpos($wrapped, "\r\n");
 $leftOver = \substr($wrapped, $lastLinePos);
 $wrapped = \substr($wrapped, 0, $lastLinePos);
 $is->write($wrapped);
 }
 if (\strlen($leftOver)) {
 $is->write($leftOver);
 }
 }
 public function getName()
 {
 return $this->name;
 }
 public function charsetChanged($charset)
 {
 }
 private function safeWordwrap($string, $length = 75, $le = "\r\n")
 {
 if (0 >= $length) {
 return $string;
 }
 $originalLines = \explode($le, $string);
 $lines = [];
 $lineCount = 0;
 foreach ($originalLines as $originalLine) {
 $lines[] = '';
 $currentLine =& $lines[$lineCount++];
 //$chunks = preg_split('/(?<=[\ \t,\.!\?\-&\+\/])/', $originalLine);
 $chunks = \preg_split('/(?<=\\s)/', $originalLine);
 foreach ($chunks as $chunk) {
 if (0 != \strlen($currentLine) && \strlen($currentLine . $chunk) > $length) {
 $lines[] = '';
 $currentLine =& $lines[$lineCount++];
 }
 $currentLine .= $chunk;
 }
 }
 return \implode("\r\n", $lines);
 }
 private function canonicalize($string)
 {
 return \str_replace(["\r\n", "\r", "\n"], ["\n", "\n", "\r\n"], $string);
 }
}
