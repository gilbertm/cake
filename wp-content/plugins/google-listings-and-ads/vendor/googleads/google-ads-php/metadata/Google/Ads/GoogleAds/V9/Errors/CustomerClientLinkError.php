<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/errors/customer_client_link_error.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Errors;

class CustomerClientLinkError
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
?google/ads/googleads/v9/errors/customer_client_link_error.protogoogle.ads.googleads.v9.errors"�
CustomerClientLinkErrorEnum"�
CustomerClientLinkError
UNSPECIFIED 
UNKNOWN*
&CLIENT_ALREADY_INVITED_BY_THIS_MANAGER\'
#CLIENT_ALREADY_MANAGED_IN_HIERARCHY
CYCLIC_LINK_NOT_ALLOWED"
CUSTOMER_HAS_TOO_MANY_ACCOUNTS#
CLIENT_HAS_TOO_MANY_INVITATIONS*
&CANNOT_HIDE_OR_UNHIDE_MANAGER_ACCOUNTS-
)CUSTOMER_HAS_TOO_MANY_ACCOUNTS_AT_MANAGER 
CLIENT_HAS_TOO_MANY_MANAGERS	B�
"com.google.ads.googleads.v9.errorsBCustomerClientLinkErrorProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/errors;errors�GAA�Google.Ads.GoogleAds.V9.Errors�Google\\Ads\\GoogleAds\\V9\\Errors�"Google::Ads::GoogleAds::V9::Errorsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

