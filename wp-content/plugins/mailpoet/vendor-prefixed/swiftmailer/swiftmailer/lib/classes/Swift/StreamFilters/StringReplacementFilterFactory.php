<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_StreamFilters_StringReplacementFilterFactory implements Swift_ReplacementFilterFactory
{
 private $filters = [];
 public function createFilter($search, $replace)
 {
 if (!isset($this->filters[$search][$replace])) {
 if (!isset($this->filters[$search])) {
 $this->filters[$search] = [];
 }
 if (!isset($this->filters[$search][$replace])) {
 $this->filters[$search][$replace] = [];
 }
 $this->filters[$search][$replace] = new Swift_StreamFilters_StringReplacementFilter($search, $replace);
 }
 return $this->filters[$search][$replace];
 }
}
