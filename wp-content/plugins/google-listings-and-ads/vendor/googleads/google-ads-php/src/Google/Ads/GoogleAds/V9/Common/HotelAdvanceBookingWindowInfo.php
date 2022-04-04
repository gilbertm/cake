<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/criteria.proto

namespace Google\Ads\GoogleAds\V9\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Criterion for number of days prior to the stay the booking is being made.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.common.HotelAdvanceBookingWindowInfo</code>
 */
class HotelAdvanceBookingWindowInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Low end of the number of days prior to the stay.
     *
     * Generated from protobuf field <code>optional int64 min_days = 3;</code>
     */
    protected $min_days = null;
    /**
     * High end of the number of days prior to the stay.
     *
     * Generated from protobuf field <code>optional int64 max_days = 4;</code>
     */
    protected $max_days = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $min_days
     *           Low end of the number of days prior to the stay.
     *     @type int|string $max_days
     *           High end of the number of days prior to the stay.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * Low end of the number of days prior to the stay.
     *
     * Generated from protobuf field <code>optional int64 min_days = 3;</code>
     * @return int|string
     */
    public function getMinDays()
    {
        return isset($this->min_days) ? $this->min_days : 0;
    }

    public function hasMinDays()
    {
        return isset($this->min_days);
    }

    public function clearMinDays()
    {
        unset($this->min_days);
    }

    /**
     * Low end of the number of days prior to the stay.
     *
     * Generated from protobuf field <code>optional int64 min_days = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMinDays($var)
    {
        GPBUtil::checkInt64($var);
        $this->min_days = $var;

        return $this;
    }

    /**
     * High end of the number of days prior to the stay.
     *
     * Generated from protobuf field <code>optional int64 max_days = 4;</code>
     * @return int|string
     */
    public function getMaxDays()
    {
        return isset($this->max_days) ? $this->max_days : 0;
    }

    public function hasMaxDays()
    {
        return isset($this->max_days);
    }

    public function clearMaxDays()
    {
        unset($this->max_days);
    }

    /**
     * High end of the number of days prior to the stay.
     *
     * Generated from protobuf field <code>optional int64 max_days = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMaxDays($var)
    {
        GPBUtil::checkInt64($var);
        $this->max_days = $var;

        return $this;
    }

}

