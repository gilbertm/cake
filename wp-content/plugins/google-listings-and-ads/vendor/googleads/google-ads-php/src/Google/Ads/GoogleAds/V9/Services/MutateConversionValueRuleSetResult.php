<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/conversion_value_rule_set_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the conversion value rule set mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.MutateConversionValueRuleSetResult</code>
 */
class MutateConversionValueRuleSetResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1;</code>
     */
    protected $resource_name = '';
    /**
     * The mutated conversion value rule set with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ConversionValueRuleSet conversion_value_rule_set = 2;</code>
     */
    protected $conversion_value_rule_set = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V9\Resources\ConversionValueRuleSet $conversion_value_rule_set
     *           The mutated conversion value rule set with only mutable fields after
     *           mutate. The field will only be returned when response_content_type is set
     *           to "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\ConversionValueRuleSetService::initOnce();
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
     * The mutated conversion value rule set with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ConversionValueRuleSet conversion_value_rule_set = 2;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ConversionValueRuleSet|null
     */
    public function getConversionValueRuleSet()
    {
        return $this->conversion_value_rule_set;
    }

    public function hasConversionValueRuleSet()
    {
        return isset($this->conversion_value_rule_set);
    }

    public function clearConversionValueRuleSet()
    {
        unset($this->conversion_value_rule_set);
    }

    /**
     * The mutated conversion value rule set with only mutable fields after
     * mutate. The field will only be returned when response_content_type is set
     * to "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ConversionValueRuleSet conversion_value_rule_set = 2;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ConversionValueRuleSet $var
     * @return $this
     */
    public function setConversionValueRuleSet($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ConversionValueRuleSet::class);
        $this->conversion_value_rule_set = $var;

        return $this;
    }

}

