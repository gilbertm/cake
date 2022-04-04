<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/asset_group_listing_group_filter.proto

namespace Google\Ads\GoogleAds\V9\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Listing dimensions for the asset group listing group filter.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.ListingGroupFilterDimension</code>
 */
class ListingGroupFilterDimension extends \Google\Protobuf\Internal\Message
{
    protected $dimension;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBiddingCategory $product_bidding_category
     *           Bidding category of a product offer.
     *     @type \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBrand $product_brand
     *           Brand of a product offer.
     *     @type \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductChannel $product_channel
     *           Locality of a product offer.
     *     @type \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCondition $product_condition
     *           Condition of a product offer.
     *     @type \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCustomAttribute $product_custom_attribute
     *           Custom attribute of a product offer.
     *     @type \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductItemId $product_item_id
     *           Item id of a product offer.
     *     @type \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductType $product_type
     *           Type of a product offer.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\AssetGroupListingGroupFilter::initOnce();
        parent::__construct($data);
    }

    /**
     * Bidding category of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductBiddingCategory product_bidding_category = 1;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBiddingCategory|null
     */
    public function getProductBiddingCategory()
    {
        return $this->readOneof(1);
    }

    public function hasProductBiddingCategory()
    {
        return $this->hasOneof(1);
    }

    /**
     * Bidding category of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductBiddingCategory product_bidding_category = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBiddingCategory $var
     * @return $this
     */
    public function setProductBiddingCategory($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBiddingCategory::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Brand of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductBrand product_brand = 2;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBrand|null
     */
    public function getProductBrand()
    {
        return $this->readOneof(2);
    }

    public function hasProductBrand()
    {
        return $this->hasOneof(2);
    }

    /**
     * Brand of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductBrand product_brand = 2;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBrand $var
     * @return $this
     */
    public function setProductBrand($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductBrand::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Locality of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductChannel product_channel = 3;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductChannel|null
     */
    public function getProductChannel()
    {
        return $this->readOneof(3);
    }

    public function hasProductChannel()
    {
        return $this->hasOneof(3);
    }

    /**
     * Locality of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductChannel product_channel = 3;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductChannel $var
     * @return $this
     */
    public function setProductChannel($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductChannel::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Condition of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductCondition product_condition = 4;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCondition|null
     */
    public function getProductCondition()
    {
        return $this->readOneof(4);
    }

    public function hasProductCondition()
    {
        return $this->hasOneof(4);
    }

    /**
     * Condition of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductCondition product_condition = 4;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCondition $var
     * @return $this
     */
    public function setProductCondition($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCondition::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Custom attribute of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductCustomAttribute product_custom_attribute = 5;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCustomAttribute|null
     */
    public function getProductCustomAttribute()
    {
        return $this->readOneof(5);
    }

    public function hasProductCustomAttribute()
    {
        return $this->hasOneof(5);
    }

    /**
     * Custom attribute of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductCustomAttribute product_custom_attribute = 5;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCustomAttribute $var
     * @return $this
     */
    public function setProductCustomAttribute($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductCustomAttribute::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Item id of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductItemId product_item_id = 6;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductItemId|null
     */
    public function getProductItemId()
    {
        return $this->readOneof(6);
    }

    public function hasProductItemId()
    {
        return $this->hasOneof(6);
    }

    /**
     * Item id of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductItemId product_item_id = 6;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductItemId $var
     * @return $this
     */
    public function setProductItemId($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductItemId::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Type of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductType product_type = 7;</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductType|null
     */
    public function getProductType()
    {
        return $this->readOneof(7);
    }

    public function hasProductType()
    {
        return $this->hasOneof(7);
    }

    /**
     * Type of a product offer.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.ListingGroupFilterDimension.ProductType product_type = 7;</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductType $var
     * @return $this
     */
    public function setProductType($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\ListingGroupFilterDimension\ProductType::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getDimension()
    {
        return $this->whichOneof("dimension");
    }

}

