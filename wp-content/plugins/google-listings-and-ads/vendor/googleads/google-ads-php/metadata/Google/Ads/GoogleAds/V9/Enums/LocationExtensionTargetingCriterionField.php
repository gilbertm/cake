<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/enums/location_extension_targeting_criterion_field.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Enums;

class LocationExtensionTargetingCriterionField
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Pgoogle/ads/googleads/v9/enums/location_extension_targeting_criterion_field.protogoogle.ads.googleads.v9.enums"�
,LocationExtensionTargetingCriterionFieldEnum"�
(LocationExtensionTargetingCriterionField
UNSPECIFIED 
UNKNOWN
ADDRESS_LINE_1
ADDRESS_LINE_2
CITY
PROVINCE
POSTAL_CODE
COUNTRY_CODEB�
!com.google.ads.googleads.v9.enumsB-LocationExtensionTargetingCriterionFieldProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

