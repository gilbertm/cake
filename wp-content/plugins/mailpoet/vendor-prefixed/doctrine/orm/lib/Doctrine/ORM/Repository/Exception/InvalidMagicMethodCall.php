<?php
declare (strict_types=1);
namespace MailPoetVendor\Doctrine\ORM\Repository\Exception;
if (!defined('ABSPATH')) exit;
use BadMethodCallException;
use MailPoetVendor\Doctrine\ORM\Exception\ORMException;
use MailPoetVendor\Doctrine\ORM\Exception\RepositoryException;
final class InvalidMagicMethodCall extends ORMException implements RepositoryException
{
 public static function becauseFieldNotFoundIn(string $entityName, string $fieldName, string $method) : self
 {
 return new self("Entity '" . $entityName . "' has no field '" . $fieldName . "'. " . "You can therefore not call '" . $method . "' on the entities' repository.");
 }
 public static function onMissingParameter(string $methodName) : self
 {
 return new self("You need to pass a parameter to '" . $methodName . "'");
 }
}
