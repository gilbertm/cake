<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
interface Swift_KeyCache
{
 const MODE_WRITE = 1;
 const MODE_APPEND = 2;
 public function setString($nsKey, $itemKey, $string, $mode);
 public function importFromByteStream($nsKey, $itemKey, Swift_OutputByteStream $os, $mode);
 public function getInputByteStream($nsKey, $itemKey, Swift_InputByteStream $is = null);
 public function getString($nsKey, $itemKey);
 public function exportToByteStream($nsKey, $itemKey, Swift_InputByteStream $is);
 public function hasKey($nsKey, $itemKey);
 public function clearKey($nsKey, $itemKey);
 public function clearAll($nsKey);
}
