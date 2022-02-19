<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/customer_customizer_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the customizer attribute mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.MutateCustomerCustomizerResult</code>
 */
class MutateCustomerCustomizerResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1;</code>
     */
    protected $resource_name = '';
    /**
     * The mutated CustomerCustomizer with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.CustomerCustomizer customer_customizer = 2;</code>
     */
    protected $customer_customizer = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V9\Resources\CustomerCustomizer $customer_customizer
     *           The mutated CustomerCustomizer with only mutable fields after mutate.
     *           The field will only be returned when response_content_type is set to
     *           "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\CustomerCustomizerService::initOnce();
        parent::__construct($data);
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1;</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * The mutated CustomerCustomizer with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.CustomerCustomizer customer_customizer = 2;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\CustomerCustomizer|null
     */
    public function getCustomerCustomizer()
    {
        return $this->customer_customizer;
    }

    public function hasCustomerCustomizer()
    {
        return isset($this->customer_customizer);
    }

    public function clearCustomerCustomizer()
    {
        unset($this->customer_customizer);
    }

    /**
     * The mutated CustomerCustomizer with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.CustomerCustomizer customer_customizer = 2;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\CustomerCustomizer $var
     * @return $this
     */
    public function setCustomerCustomizer($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\CustomerCustomizer::class);
        $this->customer_customizer = $var;

        return $this;
    }

}

