<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/enums/conversion_action_counting_type.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Enums;

class ConversionActionCountingType
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
�
Cgoogle/ads/googleads/v9/enums/conversion_action_counting_type.protogoogle.ads.googleads.v9.enums"�
 ConversionActionCountingTypeEnum"c
ConversionActionCountingType
UNSPECIFIED 
UNKNOWN
ONE_PER_CLICK
MANY_PER_CLICKB�
!com.google.ads.googleads.v9.enumsB!ConversionActionCountingTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

