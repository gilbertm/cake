<?php
namespace MailPoetVendor\Doctrine\DBAL\Types;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform;
class StringType extends Type
{
 public function getSQLDeclaration(array $column, AbstractPlatform $platform)
 {
 return $platform->getVarcharTypeDeclarationSQL($column);
 }
 public function getDefaultLength(AbstractPlatform $platform)
 {
 return $platform->getVarcharDefaultLength();
 }
 public function getName()
 {
 return Types::STRING;
 }
}
