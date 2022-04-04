<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Preferences
{
 private static $instance = null;
 private function __construct()
 {
 }
 public static function getInstance()
 {
 if (!isset(self::$instance)) {
 self::$instance = new self();
 }
 return self::$instance;
 }
 public function setCharset($charset)
 {
 Swift_DependencyContainer::getInstance()->register('properties.charset')->asValue($charset);
 return $this;
 }
 public function setTempDir($dir)
 {
 Swift_DependencyContainer::getInstance()->register('tempdir')->asValue($dir);
 return $this;
 }
 public function setCacheType($type)
 {
 Swift_DependencyContainer::getInstance()->register('cache')->asAliasOf(\sprintf('cache.%s', $type));
 return $this;
 }
 public function setQPDotEscape($dotEscape)
 {
 $dotEscape = !empty($dotEscape);
 Swift_DependencyContainer::getInstance()->register('mime.qpcontentencoder')->asNewInstanceOf('MailPoetVendor\\Swift_Mime_ContentEncoder_QpContentEncoder')->withDependencies(['mime.charstream', 'mime.bytecanonicalizer'])->addConstructorValue($dotEscape);
 return $this;
 }
}
