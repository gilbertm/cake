<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/errors/ad_group_customizer_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Errors;

class AdGroupCustomizerError
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
>google/ads/googleads/v9/errors/ad_group_customizer_error.protogoogle.ads.googleads.v9.errors"T
AdGroupCustomizerErrorEnum"6
AdGroupCustomizerError
UNSPECIFIED 
UNKNOWNB�
"com.google.ads.googleads.v9.errorsBAdGroupCustomizerErrorProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/errors;errors�GAA�Google.Ads.GoogleAds.V9.Errors�Google\\Ads\\GoogleAds\\V9\\Errors�"Google::Ads::GoogleAds::V9::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

