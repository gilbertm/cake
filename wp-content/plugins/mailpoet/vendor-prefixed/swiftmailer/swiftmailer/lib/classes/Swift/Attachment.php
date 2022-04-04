<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Attachment extends Swift_Mime_Attachment
{
 public function __construct($data = null, $filename = null, $contentType = null)
 {
 \call_user_func_array([$this, 'MailPoetVendor\\Swift_Mime_Attachment::__construct'], Swift_DependencyContainer::getInstance()->createDependenciesFor('mime.attachment'));
 $this->setBody($data, $contentType);
 $this->setFilename($filename);
 }
 public static function fromPath($path, $contentType = null)
 {
 return (new self())->setFile(new Swift_ByteStream_FileByteStream($path), $contentType);
 }
}
