<?php
namespace MailPoetVendor\Twig\RuntimeLoader;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Psr\Container\ContainerInterface;
class ContainerRuntimeLoader implements RuntimeLoaderInterface
{
 private $container;
 public function __construct(ContainerInterface $container)
 {
 $this->container = $container;
 }
 public function load($class)
 {
 if ($this->container->has($class)) {
 return $this->container->get($class);
 }
 }
}
\class_alias('MailPoetVendor\\Twig\\RuntimeLoader\\ContainerRuntimeLoader', 'MailPoetVendor\\Twig_ContainerRuntimeLoader');
