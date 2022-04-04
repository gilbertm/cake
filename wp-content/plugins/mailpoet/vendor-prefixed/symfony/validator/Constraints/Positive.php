<?php
namespace MailPoetVendor\Symfony\Component\Validator\Constraints;
if (!defined('ABSPATH')) exit;
class Positive extends GreaterThan
{
 use NumberConstraintTrait;
 public $message = 'This value should be positive.';
 public function __construct($options = null)
 {
 parent::__construct($this->configureNumberConstraintOptions($options));
 }
 public function validatedBy() : string
 {
 return GreaterThanValidator::class;
 }
}
