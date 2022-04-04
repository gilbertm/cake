<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/distance_view_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Services;

class DistanceViewService
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
�
3google/ads/googleads/v9/enums/distance_bucket.protogoogle.ads.googleads.v9.enums"�
DistanceBucketEnum"�
DistanceBucket
UNSPECIFIED 
UNKNOWN
WITHIN_700M

WITHIN_1KM

WITHIN_5KM
WITHIN_10KM
WITHIN_15KM
WITHIN_20KM
WITHIN_25KM
WITHIN_30KM	
WITHIN_35KM

WITHIN_40KM
WITHIN_45KM
WITHIN_50KM
WITHIN_55KM
WITHIN_60KM
WITHIN_65KM
BEYOND_65KM
WITHIN_0_7MILES
WITHIN_1MILE
WITHIN_5MILES
WITHIN_10MILES
WITHIN_15MILES
WITHIN_20MILES
WITHIN_25MILES
WITHIN_30MILES
WITHIN_35MILES
WITHIN_40MILES
BEYOND_40MILESB�
!com.google.ads.googleads.v9.enumsBDistanceBucketProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
5google/ads/googleads/v9/resources/distance_view.proto!google.ads.googleads.v9.resourcesgoogle/api/field_behavior.protogoogle/api/resource.protogoogle/api/annotations.proto"�
DistanceViewD
resource_name (	B-�A�A\'
%googleads.googleapis.com/DistanceView^
distance_bucket (2@.google.ads.googleads.v9.enums.DistanceBucketEnum.DistanceBucketB�A
metric_system (B�AH �:z�Aw
%googleads.googleapis.com/DistanceViewNcustomers/{customer_id}/distanceViews/{placeholder_chain_id}~{distance_bucket}B
_metric_systemB�
%com.google.ads.googleads.v9.resourcesBDistanceViewProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3
�
<google/ads/googleads/v9/services/distance_view_service.proto google.ads.googleads.v9.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"^
GetDistanceViewRequestD
resource_name (	B-�A�A\'
%googleads.googleapis.com/DistanceView2�
DistanceViewService�
GetDistanceView8.google.ads.googleads.v9.services.GetDistanceViewRequest/.google.ads.googleads.v9.resources.DistanceView"G���1//v9/{resource_name=customers/*/distanceViews/*}�Aresource_nameE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v9.servicesBDistanceViewServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v9/services;services�GAA� Google.Ads.GoogleAds.V9.Services� Google\\Ads\\GoogleAds\\V9\\Services�$Google::Ads::GoogleAds::V9::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

