<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/product_group_view.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Resources;

class ProductGroupView
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
:google/ads/googleads/v9/resources/product_group_view.proto!google.ads.googleads.v9.resourcesgoogle/api/resource.protogoogle/api/annotations.proto"�
ProductGroupViewH
resource_name (	B1�A�A+
)googleads.googleapis.com/ProductGroupView:u�Ar
)googleads.googleapis.com/ProductGroupViewEcustomers/{customer_id}/productGroupViews/{adgroup_id}~{criterion_id}B�
%com.google.ads.googleads.v9.resourcesBProductGroupViewProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

