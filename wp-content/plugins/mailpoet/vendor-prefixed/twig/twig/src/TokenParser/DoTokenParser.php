<?php
namespace MailPoetVendor\Twig\TokenParser;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Node\DoNode;
use MailPoetVendor\Twig\Token;
final class DoTokenParser extends AbstractTokenParser
{
 public function parse(Token $token)
 {
 $expr = $this->parser->getExpressionParser()->parseExpression();
 $this->parser->getStream()->expect(
 3
 );
 return new DoNode($expr, $token->getLine(), $this->getTag());
 }
 public function getTag()
 {
 return 'do';
 }
}
\class_alias('MailPoetVendor\\Twig\\TokenParser\\DoTokenParser', 'MailPoetVendor\\Twig_TokenParser_Do');
