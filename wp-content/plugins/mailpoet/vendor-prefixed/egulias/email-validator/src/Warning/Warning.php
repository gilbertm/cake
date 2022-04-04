<?php
namespace MailPoetVendor\Egulias\EmailValidator\Warning;
if (!defined('ABSPATH')) exit;
abstract class Warning
{
 const CODE = 0;
 protected $message = '';
 protected $rfcNumber = 0;
 public function message()
 {
 return $this->message;
 }
 public function code()
 {
 return self::CODE;
 }
 public function RFCNumber()
 {
 return $this->rfcNumber;
 }
 public function __toString()
 {
 return $this->message() . " rfc: " . $this->rfcNumber . "interal code: " . static::CODE;
 }
}
