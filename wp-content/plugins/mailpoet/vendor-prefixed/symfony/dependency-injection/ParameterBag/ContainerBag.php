<?php
namespace MailPoetVendor\Symfony\Component\DependencyInjection\ParameterBag;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\DependencyInjection\Container;
class ContainerBag extends FrozenParameterBag implements ContainerBagInterface
{
 private $container;
 public function __construct(Container $container)
 {
 $this->container = $container;
 }
 public function all()
 {
 return $this->container->getParameterBag()->all();
 }
 public function get($name)
 {
 return $this->container->getParameter($name);
 }
 public function has($name)
 {
 return $this->container->hasParameter($name);
 }
}
