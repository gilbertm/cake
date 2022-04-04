<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_Headers_DateHeader extends Swift_Mime_Headers_AbstractHeader
{
 private $dateTime;
 public function __construct($name)
 {
 $this->setFieldName($name);
 }
 public function getFieldType()
 {
 return self::TYPE_DATE;
 }
 public function setFieldBodyModel($model)
 {
 $this->setDateTime($model);
 }
 public function getFieldBodyModel()
 {
 return $this->getDateTime();
 }
 public function getDateTime()
 {
 return $this->dateTime;
 }
 public function setDateTime(\DateTimeInterface $dateTime)
 {
 $this->clearCachedValueIf($this->getCachedValue() != $dateTime->format(\DateTime::RFC2822));
 if ($dateTime instanceof \DateTime) {
 $immutable = new \DateTimeImmutable('@' . $dateTime->getTimestamp());
 $dateTime = $immutable->setTimezone($dateTime->getTimezone());
 }
 $this->dateTime = $dateTime;
 }
 public function getFieldBody()
 {
 if (!$this->getCachedValue()) {
 if (isset($this->dateTime)) {
 $this->setCachedValue($this->dateTime->format(\DateTime::RFC2822));
 }
 }
 return $this->getCachedValue();
 }
}
