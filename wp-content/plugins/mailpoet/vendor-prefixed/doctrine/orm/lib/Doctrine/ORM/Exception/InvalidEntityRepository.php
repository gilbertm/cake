<?php
declare (strict_types=1);
namespace MailPoetVendor\Doctrine\ORM\Exception;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Doctrine\Persistence\ObjectRepository;
use LogicException;
final class InvalidEntityRepository extends ORMException implements ConfigurationException
{
 public static function fromClassName(string $className) : self
 {
 return new self("Invalid repository class '" . $className . "'. It must be a " . ObjectRepository::class . '.');
 }
}
