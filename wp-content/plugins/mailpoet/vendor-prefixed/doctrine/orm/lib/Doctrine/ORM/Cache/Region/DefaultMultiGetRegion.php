<?php
declare (strict_types=1);
namespace MailPoetVendor\Doctrine\ORM\Cache\Region;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Doctrine\Common\Cache\Cache;
use MailPoetVendor\Doctrine\Common\Cache\MultiGetCache;
use MailPoetVendor\Doctrine\ORM\Cache\CacheEntry;
use MailPoetVendor\Doctrine\ORM\Cache\CollectionCacheEntry;
use function assert;
use function count;
class DefaultMultiGetRegion extends DefaultRegion
{
 protected $cache;
 public function __construct($name, MultiGetCache $cache, $lifetime = 0)
 {
 assert($cache instanceof Cache);
 parent::__construct($name, $cache, $lifetime);
 }
 public function getMultiple(CollectionCacheEntry $collection)
 {
 $keysToRetrieve = [];
 foreach ($collection->identifiers as $index => $key) {
 $keysToRetrieve[$index] = $this->getCacheEntryKey($key);
 }
 $items = $this->cache->fetchMultiple($keysToRetrieve);
 if (count($items) !== count($keysToRetrieve)) {
 return null;
 }
 $returnableItems = [];
 foreach ($keysToRetrieve as $index => $key) {
 if (!$items[$key] instanceof CacheEntry) {
 return null;
 }
 $returnableItems[$index] = $items[$key];
 }
 return $returnableItems;
 }
}
