<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/campaign.proto

namespace Google\Ads\GoogleAds\V9\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Campaign setting for local campaigns.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.Campaign.LocalCampaignSetting</code>
 */
class LocalCampaignSetting extends \Google\Protobuf\Internal\Message
{
    /**
     * The location source type for this local campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.LocationSourceTypeEnum.LocationSourceType location_source_type = 1;</code>
     */
    protected $location_source_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $location_source_type
     *           The location source type for this local campaign.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * The location source type for this local campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.LocationSourceTypeEnum.LocationSourceType location_source_type = 1;</code>
     * @return int
     */
    public function getLocationSourceType()
    {
        return $this->location_source_type;
    }

    /**
     * The location source type for this local campaign.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.LocationSourceTypeEnum.LocationSourceType location_source_type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setLocationSourceType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\LocationSourceTypeEnum\LocationSourceType::class);
        $this->location_source_type = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalCampaignSetting::class, \Google\Ads\GoogleAds\V9\Resources\Campaign_LocalCampaignSetting::class);

