<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/product_group_view_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Services;

class ProductGroupViewService
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
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
:google/ads/googleads/v9/resources/product_group_view.proto!google.ads.googleads.v9.resourcesgoogle/api/resource.protogoogle/api/annotations.proto"�
ProductGroupViewH
resource_name (	B1�A�A+
)googleads.googleapis.com/ProductGroupView:u�Ar
)googleads.googleapis.com/ProductGroupViewEcustomers/{customer_id}/productGroupViews/{adgroup_id}~{criterion_id}B�
%com.google.ads.googleads.v9.resourcesBProductGroupViewProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3
�
Agoogle/ads/googleads/v9/services/product_group_view_service.proto google.ads.googleads.v9.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"f
GetProductGroupViewRequestH
resource_name (	B1�A�A+
)googleads.googleapis.com/ProductGroupView2�
ProductGroupViewService�
GetProductGroupView<.google.ads.googleads.v9.services.GetProductGroupViewRequest3.google.ads.googleads.v9.resources.ProductGroupView"K���53/v9/{resource_name=customers/*/productGroupViews/*}�Aresource_nameE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v9.servicesBProductGroupViewServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v9/services;services�GAA� Google.Ads.GoogleAds.V9.Services� Google\\Ads\\GoogleAds\\V9\\Services�$Google::Ads::GoogleAds::V9::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

