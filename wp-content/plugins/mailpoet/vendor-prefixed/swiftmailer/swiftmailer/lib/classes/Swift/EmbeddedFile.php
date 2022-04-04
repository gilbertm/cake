<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_EmbeddedFile extends Swift_Mime_EmbeddedFile
{
 public function __construct($data = null, $filename = null, $contentType = null)
 {
 \call_user_func_array([$this, 'MailPoetVendor\\Swift_Mime_EmbeddedFile::__construct'], Swift_DependencyContainer::getInstance()->createDependenciesFor('mime.embeddedfile'));
 $this->setBody($data);
 $this->setFilename($filename);
 if ($contentType) {
 $this->setContentType($contentType);
 }
 }
 public static function fromPath($path)
 {
 return (new self())->setFile(new Swift_ByteStream_FileByteStream($path));
 }
}
