<?php
namespace MailPoetVendor\Twig\Node\Expression\Binary;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Compiler;
class SubBinary extends AbstractBinary
{
 public function operator(Compiler $compiler)
 {
 return $compiler->raw('-');
 }
}
\class_alias('MailPoetVendor\\Twig\\Node\\Expression\\Binary\\SubBinary', 'MailPoetVendor\\Twig_Node_Expression_Binary_Sub');
