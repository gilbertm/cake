<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/detailed_demographic_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Services;

class DetailedDemographicService
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
Pgoogle/ads/googleads/v9/enums/criterion_category_channel_availability_mode.protogoogle.ads.googleads.v9.enums"�
,CriterionCategoryChannelAvailabilityModeEnum"�
(CriterionCategoryChannelAvailabilityMode
UNSPECIFIED 
UNKNOWN
ALL_CHANNELS!
CHANNEL_TYPE_AND_ALL_SUBTYPES$
 CHANNEL_TYPE_AND_SUBSET_SUBTYPESB�
!com.google.ads.googleads.v9.enumsB-CriterionCategoryChannelAvailabilityModeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
Ogoogle/ads/googleads/v9/enums/criterion_category_locale_availability_mode.protogoogle.ads.googleads.v9.enums"�
+CriterionCategoryLocaleAvailabilityModeEnum"�
\'CriterionCategoryLocaleAvailabilityMode
UNSPECIFIED 
UNKNOWN
ALL_LOCALES
COUNTRY_AND_ALL_LANGUAGES
LANGUAGE_AND_ALL_COUNTRIES
COUNTRY_AND_LANGUAGEB�
!com.google.ads.googleads.v9.enumsB,CriterionCategoryLocaleAvailabilityModeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
<google/ads/googleads/v9/enums/advertising_channel_type.protogoogle.ads.googleads.v9.enums"�
AdvertisingChannelTypeEnum"�
AdvertisingChannelType
UNSPECIFIED 
UNKNOWN

SEARCH
DISPLAY
SHOPPING	
HOTEL	
VIDEO
MULTI_CHANNEL	
LOCAL	
SMART	
PERFORMANCE_MAX
B�
!com.google.ads.googleads.v9.enumsBAdvertisingChannelTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
@google/ads/googleads/v9/enums/advertising_channel_sub_type.protogoogle.ads.googleads.v9.enums"�
AdvertisingChannelSubTypeEnum"�
AdvertisingChannelSubType
UNSPECIFIED 
UNKNOWN
SEARCH_MOBILE_APP
DISPLAY_MOBILE_APP
SEARCH_EXPRESS
DISPLAY_EXPRESS
SHOPPING_SMART_ADS
DISPLAY_GMAIL_AD
DISPLAY_SMART_CAMPAIGN
VIDEO_OUTSTREAM	
VIDEO_ACTION

VIDEO_NON_SKIPPABLE
APP_CAMPAIGN
APP_CAMPAIGN_FOR_ENGAGEMENT
LOCAL_CAMPAIGN#
SHOPPING_COMPARISON_LISTING_ADS
SMART_CAMPAIGN
VIDEO_SEQUENCE%
!APP_CAMPAIGN_FOR_PRE_REGISTRATIONB�
!com.google.ads.googleads.v9.enumsBAdvertisingChannelSubTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
Dgoogle/ads/googleads/v9/common/criterion_category_availability.protogoogle.ads.googleads.v9.common<google/ads/googleads/v9/enums/advertising_channel_type.protoPgoogle/ads/googleads/v9/enums/criterion_category_channel_availability_mode.protoOgoogle/ads/googleads/v9/enums/criterion_category_locale_availability_mode.protogoogle/api/annotations.proto"�
CriterionCategoryAvailabilityU
channel (2D.google.ads.googleads.v9.common.CriterionCategoryChannelAvailabilityS
locale (2C.google.ads.googleads.v9.common.CriterionCategoryLocaleAvailability"�
$CriterionCategoryChannelAvailability�
availability_mode (2t.google.ads.googleads.v9.enums.CriterionCategoryChannelAvailabilityModeEnum.CriterionCategoryChannelAvailabilityModer
advertising_channel_type (2P.google.ads.googleads.v9.enums.AdvertisingChannelTypeEnum.AdvertisingChannelType|
advertising_channel_sub_type (2V.google.ads.googleads.v9.enums.AdvertisingChannelSubTypeEnum.AdvertisingChannelSubType-
 include_default_channel_sub_type (H �B#
!_include_default_channel_sub_type"�
#CriterionCategoryLocaleAvailability�
availability_mode (2r.google.ads.googleads.v9.enums.CriterionCategoryLocaleAvailabilityModeEnum.CriterionCategoryLocaleAvailabilityMode
country_code (	H �
language_code (	H�B
_country_codeB
_language_codeB�
"com.google.ads.googleads.v9.commonB"CriterionCategoryAvailabilityProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/common;common�GAA�Google.Ads.GoogleAds.V9.Common�Google\\Ads\\GoogleAds\\V9\\Common�"Google::Ads::GoogleAds::V9::Commonbproto3
�
<google/ads/googleads/v9/resources/detailed_demographic.proto!google.ads.googleads.v9.resourcesgoogle/api/field_behavior.protogoogle/api/resource.protogoogle/api/annotations.proto"�
DetailedDemographicK
resource_name (	B4�A�A.
,googleads.googleapis.com/DetailedDemographic
id (B�A
name (	B�AD
parent (	B4�A�A.
,googleads.googleapis.com/DetailedDemographic
launched_to_all (B�AZ
availabilities (2=.google.ads.googleads.v9.common.CriterionCategoryAvailabilityB�A:y�Av
,googleads.googleapis.com/DetailedDemographicFcustomers/{customer_id}/detailedDemographics/{detailed_demographic_id}B�
%com.google.ads.googleads.v9.resourcesBDetailedDemographicProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3
�
Cgoogle/ads/googleads/v9/services/detailed_demographic_service.proto google.ads.googleads.v9.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"l
GetDetailedDemographicRequestK
resource_name (	B4�A�A.
,googleads.googleapis.com/DetailedDemographic2�
DetailedDemographicService�
GetDetailedDemographic?.google.ads.googleads.v9.services.GetDetailedDemographicRequest6.google.ads.googleads.v9.resources.DetailedDemographic"N���86/v9/{resource_name=customers/*/detailedDemographics/*}�Aresource_nameE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v9.servicesBDetailedDemographicServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v9/services;services�GAA� Google.Ads.GoogleAds.V9.Services� Google\\Ads\\GoogleAds\\V9\\Services�$Google::Ads::GoogleAds::V9::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

