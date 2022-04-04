<?php
namespace MailPoetVendor\Symfony\Component\Validator;
if (!defined('ABSPATH')) exit;
interface ConstraintViolationListInterface extends \Traversable, \Countable, \ArrayAccess
{
 public function add(ConstraintViolationInterface $violation);
 public function addAll(self $otherList);
 public function get($offset);
 public function has($offset);
 public function set($offset, ConstraintViolationInterface $violation);
 public function remove($offset);
}
