<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_ByteStream_TemporaryFileByteStream extends Swift_ByteStream_FileByteStream
{
 public function __construct()
 {
 $filePath = \tempnam(\sys_get_temp_dir(), 'FileByteStream');
 if (\false === $filePath) {
 throw new Swift_IoException('Failed to retrieve temporary file name.');
 }
 parent::__construct($filePath, \true);
 }
 public function getContent()
 {
 if (\false === ($content = \file_get_contents($this->getPath()))) {
 throw new Swift_IoException('Failed to get temporary file content.');
 }
 return $content;
 }
 public function __destruct()
 {
 if (\file_exists($this->getPath())) {
 @\unlink($this->getPath());
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
