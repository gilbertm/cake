<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_ByteStream_ArrayByteStream implements Swift_InputByteStream, Swift_OutputByteStream
{
 private $array = [];
 private $arraySize = 0;
 private $offset = 0;
 private $mirrors = [];
 public function __construct($stack = null)
 {
 if (\is_array($stack)) {
 $this->array = $stack;
 $this->arraySize = \count($stack);
 } elseif (\is_string($stack)) {
 $this->write($stack);
 } else {
 $this->array = [];
 }
 }
 public function read($length)
 {
 if ($this->offset == $this->arraySize) {
 return \false;
 }
 // Don't use array slice
 $end = $length + $this->offset;
 $end = $this->arraySize < $end ? $this->arraySize : $end;
 $ret = '';
 for (; $this->offset < $end; ++$this->offset) {
 $ret .= $this->array[$this->offset];
 }
 return $ret;
 }
 public function write($bytes)
 {
 $to_add = \str_split($bytes);
 foreach ($to_add as $value) {
 $this->array[] = $value;
 }
 $this->arraySize = \count($this->array);
 foreach ($this->mirrors as $stream) {
 $stream->write($bytes);
 }
 }
 public function commit()
 {
 }
 public function bind(Swift_InputByteStream $is)
 {
 $this->mirrors[] = $is;
 }
 public function unbind(Swift_InputByteStream $is)
 {
 foreach ($this->mirrors as $k => $stream) {
 if ($is === $stream) {
 unset($this->mirrors[$k]);
 }
 }
 }
 public function setReadPointer($byteOffset)
 {
 if ($byteOffset > $this->arraySize) {
 $byteOffset = $this->arraySize;
 } elseif ($byteOffset < 0) {
 $byteOffset = 0;
 }
 $this->offset = $byteOffset;
 }
 public function flushBuffers()
 {
 $this->offset = 0;
 $this->array = [];
 $this->arraySize = 0;
 foreach ($this->mirrors as $stream) {
 $stream->flushBuffers();
 }
 }
}
