<?php
namespace MailPoetVendor\Sabberworm\CSS\Parsing;
if (!defined('ABSPATH')) exit;
class SourceException extends \Exception
{
 private $iLineNo;
 public function __construct($sMessage, $iLineNo = 0)
 {
 $this->iLineNo = $iLineNo;
 if (!empty($iLineNo)) {
 $sMessage .= " [line no: {$iLineNo}]";
 }
 parent::__construct($sMessage);
 }
 public function getLineNo()
 {
 return $this->iLineNo;
 }
}
