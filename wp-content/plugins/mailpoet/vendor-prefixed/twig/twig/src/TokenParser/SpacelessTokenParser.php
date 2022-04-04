<?php
namespace MailPoetVendor\Twig\TokenParser;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Node\SpacelessNode;
use MailPoetVendor\Twig\Token;
final class SpacelessTokenParser extends AbstractTokenParser
{
 public function parse(Token $token)
 {
 $stream = $this->parser->getStream();
 $lineno = $token->getLine();
 @\trigger_error(\sprintf('The spaceless tag in "%s" at line %d is deprecated since Twig 2.7, use the "spaceless" filter with the "apply" tag instead.', $stream->getSourceContext()->getName(), $lineno), \E_USER_DEPRECATED);
 $stream->expect(
 3
 );
 $body = $this->parser->subparse([$this, 'decideSpacelessEnd'], \true);
 $stream->expect(
 3
 );
 return new SpacelessNode($body, $lineno, $this->getTag());
 }
 public function decideSpacelessEnd(Token $token)
 {
 return $token->test('endspaceless');
 }
 public function getTag()
 {
 return 'spaceless';
 }
}
\class_alias('MailPoetVendor\\Twig\\TokenParser\\SpacelessTokenParser', 'MailPoetVendor\\Twig_TokenParser_Spaceless');
