<?php
namespace MailPoetVendor\Twig\RuntimeLoader;
if (!defined('ABSPATH')) exit;
class FactoryRuntimeLoader implements RuntimeLoaderInterface
{
 private $map;
 public function __construct(array $map = [])
 {
 $this->map = $map;
 }
 public function load($class)
 {
 if (isset($this->map[$class])) {
 $runtimeFactory = $this->map[$class];
 return $runtimeFactory();
 }
 }
}
\class_alias('MailPoetVendor\\Twig\\RuntimeLoader\\FactoryRuntimeLoader', 'MailPoetVendor\\Twig_FactoryRuntimeLoader');
