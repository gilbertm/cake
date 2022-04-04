<?php
declare (strict_types=1);
namespace MailPoetVendor\Doctrine\ORM\Id;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Doctrine\ORM\EntityManager;
abstract class AbstractIdGenerator
{
 public abstract function generate(EntityManager $em, $entity);
 public function isPostInsertGenerator()
 {
 return \false;
 }
}
