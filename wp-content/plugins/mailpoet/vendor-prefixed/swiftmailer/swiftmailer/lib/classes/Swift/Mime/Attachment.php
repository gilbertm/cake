<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_Attachment extends Swift_Mime_SimpleMimeEntity
{
 private $mimeTypes = [];
 public function __construct(Swift_Mime_SimpleHeaderSet $headers, Swift_Mime_ContentEncoder $encoder, Swift_KeyCache $cache, Swift_IdGenerator $idGenerator, $mimeTypes = [])
 {
 parent::__construct($headers, $encoder, $cache, $idGenerator);
 $this->setDisposition('attachment');
 $this->setContentType('application/octet-stream');
 $this->mimeTypes = $mimeTypes;
 }
 public function getNestingLevel()
 {
 return self::LEVEL_MIXED;
 }
 public function getDisposition()
 {
 return $this->getHeaderFieldModel('Content-Disposition');
 }
 public function setDisposition($disposition)
 {
 if (!$this->setHeaderFieldModel('Content-Disposition', $disposition)) {
 $this->getHeaders()->addParameterizedHeader('Content-Disposition', $disposition);
 }
 return $this;
 }
 public function getFilename()
 {
 return $this->getHeaderParameter('Content-Disposition', 'filename');
 }
 public function setFilename($filename)
 {
 $this->setHeaderParameter('Content-Disposition', 'filename', $filename);
 $this->setHeaderParameter('Content-Type', 'name', $filename);
 return $this;
 }
 public function getSize()
 {
 return $this->getHeaderParameter('Content-Disposition', 'size');
 }
 public function setSize($size)
 {
 $this->setHeaderParameter('Content-Disposition', 'size', $size);
 return $this;
 }
 public function setFile(Swift_FileStream $file, $contentType = null)
 {
 $this->setFilename(\basename($file->getPath()));
 $this->setBody($file, $contentType);
 if (!isset($contentType)) {
 $extension = \strtolower(\substr($file->getPath(), \strrpos($file->getPath(), '.') + 1));
 if (\array_key_exists($extension, $this->mimeTypes)) {
 $this->setContentType($this->mimeTypes[$extension]);
 }
 }
 return $this;
 }
}
