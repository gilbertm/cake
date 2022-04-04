<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_LoadBalancedTransport extends Swift_Transport_LoadBalancedTransport
{
 public function __construct($transports = [])
 {
 \call_user_func_array([$this, 'MailPoetVendor\\Swift_Transport_LoadBalancedTransport::__construct'], Swift_DependencyContainer::getInstance()->createDependenciesFor('transport.loadbalanced'));
 $this->setTransports($transports);
 }
}
