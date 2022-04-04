<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/smart_campaign_setting_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The result for the Smart campaign setting mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.MutateSmartCampaignSettingResult</code>
 */
class MutateSmartCampaignSettingResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Returned for successful operations.
     *
     * Generated from protobuf field <code>string resource_name = 1;</code>
     */
    protected $resource_name = '';
    /**
     * The mutated Smart campaign setting with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.SmartCampaignSetting smart_campaign_setting = 2;</code>
     */
    protected $smart_campaign_setting = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Returned for successful operations.
     *     @type \Google\Ads\GoogleAds\V9\Resources\SmartCampaignSetting $smart_campaign_setting
     *           The mutated Smart campaign setting with only mutable fields after mutate.
     *           The field will only be returned when response_content_type is set to
     *           "MUTABLE_RESOURCE".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\SmartCampaignSettingService::initOnce();
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
     * The mutated Smart campaign setting with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.SmartCampaignSetting smart_campaign_setting = 2;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\SmartCampaignSetting|null
     */
    public function getSmartCampaignSetting()
    {
        return $this->smart_campaign_setting;
    }

    public function hasSmartCampaignSetting()
    {
        return isset($this->smart_campaign_setting);
    }

    public function clearSmartCampaignSetting()
    {
        unset($this->smart_campaign_setting);
    }

    /**
     * The mutated Smart campaign setting with only mutable fields after mutate.
     * The field will only be returned when response_content_type is set to
     * "MUTABLE_RESOURCE".
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.SmartCampaignSetting smart_campaign_setting = 2;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\SmartCampaignSetting $var
     * @return $this
     */
    public function setSmartCampaignSetting($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\SmartCampaignSetting::class);
        $this->smart_campaign_setting = $var;

        return $this;
    }

}

