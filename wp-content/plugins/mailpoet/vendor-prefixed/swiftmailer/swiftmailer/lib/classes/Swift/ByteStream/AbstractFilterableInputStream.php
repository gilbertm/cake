<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
abstract class Swift_ByteStream_AbstractFilterableInputStream implements Swift_InputByteStream, Swift_Filterable
{
 protected $sequence = 0;
 private $filters = [];
 private $writeBuffer = '';
 private $mirrors = [];
 protected abstract function doCommit($bytes);
 protected abstract function flush();
 public function addFilter(Swift_StreamFilter $filter, $key)
 {
 $this->filters[$key] = $filter;
 }
 public function removeFilter($key)
 {
 unset($this->filters[$key]);
 }
 public function write($bytes)
 {
 $this->writeBuffer .= $bytes;
 foreach ($this->filters as $filter) {
 if ($filter->shouldBuffer($this->writeBuffer)) {
 return;
 }
 }
 $this->doWrite($this->writeBuffer);
 return ++$this->sequence;
 }
 public function commit()
 {
 $this->doWrite($this->writeBuffer);
 }
 public function bind(Swift_InputByteStream $is)
 {
 $this->mirrors[] = $is;
 }
 public function unbind(Swift_InputByteStream $is)
 {
 foreach ($this->mirrors as $k => $stream) {
 if ($is === $stream) {
 if ('' !== $this->writeBuffer) {
 $stream->write($this->writeBuffer);
 }
 unset($this->mirrors[$k]);
 }
 }
 }
 public function flushBuffers()
 {
 if ('' !== $this->writeBuffer) {
 $this->doWrite($this->writeBuffer);
 }
 $this->flush();
 foreach ($this->mirrors as $stream) {
 $stream->flushBuffers();
 }
 }
 private function filter($bytes)
 {
 foreach ($this->filters as $filter) {
 $bytes = $filter->filter($bytes);
 }
 return $bytes;
 }
 private function doWrite($bytes)
 {
 $this->doCommit($this->filter($bytes));
 foreach ($this->mirrors as $stream) {
 $stream->write($bytes);
 }
 $this->writeBuffer = '';
 }
}
