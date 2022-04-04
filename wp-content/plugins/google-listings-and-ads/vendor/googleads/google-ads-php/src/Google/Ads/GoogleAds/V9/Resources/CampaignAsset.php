<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/campaign_asset.proto

namespace Google\Ads\GoogleAds\V9\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A link between a Campaign and an Asset.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.CampaignAsset</code>
 */
class CampaignAsset extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the campaign asset.
     * CampaignAsset resource names have the form:
     * `customers/{customer_id}/campaignAssets/{campaign_id}~{asset_id}~{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Immutable. The campaign to which the asset is linked.
     *
     * Generated from protobuf field <code>optional string campaign = 6 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $campaign = null;
    /**
     * Immutable. The asset which is linked to the campaign.
     *
     * Generated from protobuf field <code>optional string asset = 7 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $asset = null;
    /**
     * Immutable. Role that the asset takes under the linked campaign.
     * Required.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AssetFieldTypeEnum.AssetFieldType field_type = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $field_type = 0;
    /**
     * Status of the campaign asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AssetLinkStatusEnum.AssetLinkStatus status = 5;</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. The resource name of the campaign asset.
     *           CampaignAsset resource names have the form:
     *           `customers/{customer_id}/campaignAssets/{campaign_id}~{asset_id}~{field_type}`
     *     @type string $campaign
     *           Immutable. The campaign to which the asset is linked.
     *     @type string $asset
     *           Immutable. The asset which is linked to the campaign.
     *     @type int $field_type
     *           Immutable. Role that the asset takes under the linked campaign.
     *           Required.
     *     @type int $status
     *           Status of the campaign asset.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\CampaignAsset::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the campaign asset.
     * CampaignAsset resource names have the form:
     * `customers/{customer_id}/campaignAssets/{campaign_id}~{asset_id}~{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. The resource name of the campaign asset.
     * CampaignAsset resource names have the form:
     * `customers/{customer_id}/campaignAssets/{campaign_id}~{asset_id}~{field_type}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
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
     * Immutable. The campaign to which the asset is linked.
     *
     * Generated from protobuf field <code>optional string campaign = 6 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCampaign()
    {
        return isset($this->campaign) ? $this->campaign : '';
    }

    public function hasCampaign()
    {
        return isset($this->campaign);
    }

    public function clearCampaign()
    {
        unset($this->campaign);
    }

    /**
     * Immutable. The campaign to which the asset is linked.
     *
     * Generated from protobuf field <code>optional string campaign = 6 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign = $var;

        return $this;
    }

    /**
     * Immutable. The asset which is linked to the campaign.
     *
     * Generated from protobuf field <code>optional string asset = 7 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getAsset()
    {
        return isset($this->asset) ? $this->asset : '';
    }

    public function hasAsset()
    {
        return isset($this->asset);
    }

    public function clearAsset()
    {
        unset($this->asset);
    }

    /**
     * Immutable. The asset which is linked to the campaign.
     *
     * Generated from protobuf field <code>optional string asset = 7 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setAsset($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset = $var;

        return $this;
    }

    /**
     * Immutable. Role that the asset takes under the linked campaign.
     * Required.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AssetFieldTypeEnum.AssetFieldType field_type = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getFieldType()
    {
        return $this->field_type;
    }

    /**
     * Immutable. Role that the asset takes under the linked campaign.
     * Required.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AssetFieldTypeEnum.AssetFieldType field_type = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setFieldType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\AssetFieldTypeEnum\AssetFieldType::class);
        $this->field_type = $var;

        return $this;
    }

    /**
     * Status of the campaign asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AssetLinkStatusEnum.AssetLinkStatus status = 5;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Status of the campaign asset.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AssetLinkStatusEnum.AssetLinkStatus status = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\AssetLinkStatusEnum\AssetLinkStatus::class);
        $this->status = $var;

        return $this;
    }

}

