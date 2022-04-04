<?php
namespace MailPoetVendor\Carbon\Exceptions;
if (!defined('ABSPATH')) exit;
use Exception;
use RuntimeException as BaseRuntimeException;
class ImmutableException extends BaseRuntimeException implements RuntimeException
{
 public function __construct($value, $code = 0, Exception $previous = null)
 {
 parent::__construct("{$value} is immutable.", $code, $previous);
 }
}
