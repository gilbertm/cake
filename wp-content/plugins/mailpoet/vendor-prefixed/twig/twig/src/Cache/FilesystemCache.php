<?php
namespace MailPoetVendor\Twig\Cache;
if (!defined('ABSPATH')) exit;
class FilesystemCache implements CacheInterface
{
 public const FORCE_BYTECODE_INVALIDATION = 1;
 private $directory;
 private $options;
 public function __construct($directory, $options = 0)
 {
 $this->directory = \rtrim($directory, '\\/') . '/';
 $this->options = $options;
 }
 public function generateKey($name, $className)
 {
 $hash = \hash(\PHP_VERSION_ID < 80100 ? 'sha256' : 'xxh128', $className);
 return $this->directory . $hash[0] . $hash[1] . '/' . $hash . '.php';
 }
 public function load($key)
 {
 if (\file_exists($key)) {
 @(include_once $key);
 }
 }
 public function write($key, $content)
 {
 $dir = \dirname($key);
 if (!\is_dir($dir)) {
 if (\false === @\mkdir($dir, 0777, \true)) {
 \clearstatcache(\true, $dir);
 if (!\is_dir($dir)) {
 throw new \RuntimeException(\sprintf('Unable to create the cache directory (%s).', $dir));
 }
 }
 } elseif (!\is_writable($dir)) {
 throw new \RuntimeException(\sprintf('Unable to write in the cache directory (%s).', $dir));
 }
 $tmpFile = \tempnam($dir, \basename($key));
 if (\false !== @\file_put_contents($tmpFile, $content) && @\rename($tmpFile, $key)) {
 @\chmod($key, 0666 & ~\umask());
 if (self::FORCE_BYTECODE_INVALIDATION == ($this->options & self::FORCE_BYTECODE_INVALIDATION)) {
 // Compile cached file into bytecode cache
 if (\function_exists('opcache_invalidate') && \filter_var(\ini_get('opcache.enable'), \FILTER_VALIDATE_BOOLEAN)) {
 @\opcache_invalidate($key, \true);
 } elseif (\function_exists('apc_compile_file')) {
 \apc_compile_file($key);
 }
 }
 return;
 }
 throw new \RuntimeException(\sprintf('Failed to write cache file "%s".', $key));
 }
 public function getTimestamp($key)
 {
 if (!\file_exists($key)) {
 return 0;
 }
 return (int) @\filemtime($key);
 }
}
\class_alias('MailPoetVendor\\Twig\\Cache\\FilesystemCache', 'MailPoetVendor\\Twig_Cache_Filesystem');
