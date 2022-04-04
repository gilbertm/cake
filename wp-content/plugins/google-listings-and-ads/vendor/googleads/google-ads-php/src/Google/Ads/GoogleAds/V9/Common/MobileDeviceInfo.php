<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/criteria.proto

namespace Google\Ads\GoogleAds\V9\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A mobile device criterion.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.common.MobileDeviceInfo</code>
 */
class MobileDeviceInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The mobile device constant resource name.
     *
     * Generated from protobuf field <code>optional string mobile_device_constant = 2;</code>
     */
    protected $mobile_device_constant = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $mobile_device_constant
     *           The mobile device constant resource name.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Common\Criteria::initOnce();
        parent::__construct($data);
    }

    /**
     * The mobile device constant resource name.
     *
     * Generated from protobuf field <code>optional string mobile_device_constant = 2;</code>
     * @return string
     */
    public function getMobileDeviceConstant()
    {
        return isset($this->mobile_device_constant) ? $this->mobile_device_constant : '';
    }

    public function hasMobileDeviceConstant()
    {
        return isset($this->mobile_device_constant);
    }

    public function clearMobileDeviceConstant()
    {
        unset($this->mobile_device_constant);
    }

    /**
     * The mobile device constant resource name.
     *
     * Generated from protobuf field <code>optional string mobile_device_constant = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMobileDeviceConstant($var)
    {
        GPBUtil::checkString($var, True);
        $this->mobile_device_constant = $var;

        return $this;
    }

}

