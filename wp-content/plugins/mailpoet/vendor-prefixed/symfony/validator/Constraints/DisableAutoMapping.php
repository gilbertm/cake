<?php
namespace MailPoetVendor\Symfony\Component\Validator\Constraints;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Validator\Constraint;
use MailPoetVendor\Symfony\Component\Validator\Exception\ConstraintDefinitionException;
class DisableAutoMapping extends Constraint
{
 public function __construct($options = null)
 {
 if (\is_array($options) && \array_key_exists('groups', $options)) {
 throw new ConstraintDefinitionException(\sprintf('The option "groups" is not supported by the constraint "%s".', __CLASS__));
 }
 parent::__construct($options);
 }
 public function getTargets()
 {
 return [self::PROPERTY_CONSTRAINT, self::CLASS_CONSTRAINT];
 }
}
