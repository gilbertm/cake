<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/errors/custom_audience_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Errors;

class CustomAudienceError
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
�
:google/ads/googleads/v9/errors/custom_audience_error.protogoogle.ads.googleads.v9.errors"�
CustomAudienceErrorEnum"�
CustomAudienceError
UNSPECIFIED 
UNKNOWN
NAME_ALREADY_USED
CANNOT_REMOVE_WHILE_IN_USE
RESOURCE_ALREADY_REMOVED-
)MEMBER_TYPE_AND_PARAMETER_ALREADY_EXISTED
INVALID_MEMBER_TYPE(
$MEMBER_TYPE_AND_VALUE_DOES_NOT_MATCH
POLICY_VIOLATION
INVALID_TYPE_CHANGE	B�
"com.google.ads.googleads.v9.errorsBCustomAudienceErrorProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/errors;errors�GAA�Google.Ads.GoogleAds.V9.Errors�Google\\Ads\\GoogleAds\\V9\\Errors�"Google::Ads::GoogleAds::V9::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

