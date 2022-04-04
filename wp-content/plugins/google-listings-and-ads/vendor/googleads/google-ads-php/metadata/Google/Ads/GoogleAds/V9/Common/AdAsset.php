<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/ad_asset.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Common;

class AdAsset
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
:google/ads/googleads/v9/enums/policy_approval_status.protogoogle.ads.googleads.v9.enums"�
PolicyApprovalStatusEnum"�
PolicyApprovalStatus
UNSPECIFIED 
UNKNOWN
DISAPPROVED
APPROVED_LIMITED
APPROVED
AREA_OF_INTEREST_ONLYB�
!com.google.ads.googleads.v9.enumsBPolicyApprovalStatusProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
8google/ads/googleads/v9/enums/policy_review_status.protogoogle.ads.googleads.v9.enums"�
PolicyReviewStatusEnum"�
PolicyReviewStatus
UNSPECIFIED 
UNKNOWN
REVIEW_IN_PROGRESS
REVIEWED
UNDER_APPEAL
ELIGIBLE_MAY_SERVEB�
!com.google.ads.googleads.v9.enumsBPolicyReviewStatusProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
;google/ads/googleads/v9/enums/asset_performance_label.protogoogle.ads.googleads.v9.enums"�
AssetPerformanceLabelEnum"m
AssetPerformanceLabel
UNSPECIFIED 
UNKNOWN
PENDING
LEARNING
LOW
GOOD
BESTB�
!com.google.ads.googleads.v9.enumsBAssetPerformanceLabelProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
Xgoogle/ads/googleads/v9/enums/policy_topic_evidence_destination_not_working_device.protogoogle.ads.googleads.v9.enums"�
2PolicyTopicEvidenceDestinationNotWorkingDeviceEnum"q
.PolicyTopicEvidenceDestinationNotWorkingDevice
UNSPECIFIED 
UNKNOWN
DESKTOP
ANDROID
IOSB�
!com.google.ads.googleads.v9.enumsB3PolicyTopicEvidenceDestinationNotWorkingDeviceProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
`google/ads/googleads/v9/enums/policy_topic_evidence_destination_not_working_dns_error_type.protogoogle.ads.googleads.v9.enums"�
8PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeEnum"�
4PolicyTopicEvidenceDestinationNotWorkingDnsErrorType
UNSPECIFIED 
UNKNOWN
HOSTNAME_NOT_FOUND
GOOGLE_CRAWLER_DNS_ISSUEB�
!com.google.ads.googleads.v9.enumsB9PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
;google/ads/googleads/v9/enums/policy_topic_entry_type.protogoogle.ads.googleads.v9.enums"�
PolicyTopicEntryTypeEnum"�
PolicyTopicEntryType
UNSPECIFIED 
UNKNOWN

PROHIBITED
LIMITED
FULLY_LIMITED
DESCRIPTIVE

BROADENING
AREA_OF_INTEREST_ONLYB�
!com.google.ads.googleads.v9.enumsBPolicyTopicEntryTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
Wgoogle/ads/googleads/v9/enums/policy_topic_evidence_destination_mismatch_url_type.protogoogle.ads.googleads.v9.enums"�
1PolicyTopicEvidenceDestinationMismatchUrlTypeEnum"�
-PolicyTopicEvidenceDestinationMismatchUrlType
UNSPECIFIED 
UNKNOWN
DISPLAY_URL
	FINAL_URL
FINAL_MOBILE_URL
TRACKING_URL
MOBILE_TRACKING_URLB�
!com.google.ads.googleads.v9.enumsB2PolicyTopicEvidenceDestinationMismatchUrlTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
+google/ads/googleads/v9/common/policy.protogoogle.ads.googleads.v9.commonWgoogle/ads/googleads/v9/enums/policy_topic_evidence_destination_mismatch_url_type.protoXgoogle/ads/googleads/v9/enums/policy_topic_evidence_destination_not_working_device.proto`google/ads/googleads/v9/enums/policy_topic_evidence_destination_not_working_dns_error_type.protogoogle/api/annotations.proto"n
PolicyViolationKey
policy_name (	H �
violating_text (	H�B
_policy_nameB
_violating_text"�
PolicyValidationParameter
ignorable_policy_topics (	X
exempt_policy_violation_keys (22.google.ads.googleads.v9.common.PolicyViolationKey"�
PolicyTopicEntry
topic (	H �Z
type (2L.google.ads.googleads.v9.enums.PolicyTopicEntryTypeEnum.PolicyTopicEntryTypeF
	evidences (23.google.ads.googleads.v9.common.PolicyTopicEvidenceJ
constraints (25.google.ads.googleads.v9.common.PolicyTopicConstraintB
_topic"�

PolicyTopicEvidenceW
website_list (2?.google.ads.googleads.v9.common.PolicyTopicEvidence.WebsiteListH Q
	text_list (2<.google.ads.googleads.v9.common.PolicyTopicEvidence.TextListH 
language_code	 (	H h
destination_text_list (2G.google.ads.googleads.v9.common.PolicyTopicEvidence.DestinationTextListH g
destination_mismatch (2G.google.ads.googleads.v9.common.PolicyTopicEvidence.DestinationMismatchH l
destination_not_working (2I.google.ads.googleads.v9.common.PolicyTopicEvidence.DestinationNotWorkingH 
TextList
texts (	
WebsiteList
websites (	0
DestinationTextList
destination_texts (	�
DestinationMismatch�
	url_types (2~.google.ads.googleads.v9.enums.PolicyTopicEvidenceDestinationMismatchUrlTypeEnum.PolicyTopicEvidenceDestinationMismatchUrlType�
DestinationNotWorking
expanded_url (	H��
device (2�.google.ads.googleads.v9.enums.PolicyTopicEvidenceDestinationNotWorkingDeviceEnum.PolicyTopicEvidenceDestinationNotWorkingDevice#
last_checked_date_time (	H��
dns_error_type (2�.google.ads.googleads.v9.enums.PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeEnum.PolicyTopicEvidenceDestinationNotWorkingDnsErrorTypeH 
http_error_code (H B
reasonB
_expanded_urlB
_last_checked_date_timeB
value"�
PolicyTopicConstraintn
country_constraint_list (2K.google.ads.googleads.v9.common.PolicyTopicConstraint.CountryConstraintListH g
reseller_constraint (2H.google.ads.googleads.v9.common.PolicyTopicConstraint.ResellerConstraintH z
#certificate_missing_in_country_list (2K.google.ads.googleads.v9.common.PolicyTopicConstraint.CountryConstraintListH �
+certificate_domain_mismatch_in_country_list (2K.google.ads.googleads.v9.common.PolicyTopicConstraint.CountryConstraintListH �
CountryConstraintList%
total_targeted_countries (H �Z
	countries (2G.google.ads.googleads.v9.common.PolicyTopicConstraint.CountryConstraintB
_total_targeted_countries
ResellerConstraintI
CountryConstraint
country_criterion (	H �B
_country_criterionB
valueB�
"com.google.ads.googleads.v9.commonBPolicyProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/common;common�GAA�Google.Ads.GoogleAds.V9.Common�Google\\Ads\\GoogleAds\\V9\\Common�"Google::Ads::GoogleAds::V9::Commonbproto3
�
1google/ads/googleads/v9/common/asset_policy.protogoogle.ads.googleads.v9.common:google/ads/googleads/v9/enums/policy_approval_status.proto8google/ads/googleads/v9/enums/policy_review_status.protogoogle/api/annotations.proto"�
AdAssetPolicySummaryN
policy_topic_entries (20.google.ads.googleads.v9.common.PolicyTopicEntry_
review_status (2H.google.ads.googleads.v9.enums.PolicyReviewStatusEnum.PolicyReviewStatuse
approval_status (2L.google.ads.googleads.v9.enums.PolicyApprovalStatusEnum.PolicyApprovalStatusB�
"com.google.ads.googleads.v9.commonBAssetPolicyProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/common;common�GAA�Google.Ads.GoogleAds.V9.Common�Google\\Ads\\GoogleAds\\V9\\Common�"Google::Ads::GoogleAds::V9::Commonbproto3
�
;google/ads/googleads/v9/enums/served_asset_field_type.protogoogle.ads.googleads.v9.enums"�
ServedAssetFieldTypeEnum"�
ServedAssetFieldType
UNSPECIFIED 
UNKNOWN

HEADLINE_1

HEADLINE_2

HEADLINE_3
DESCRIPTION_1
DESCRIPTION_2B�
!com.google.ads.googleads.v9.enumsBServedAssetFieldTypeProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v9/enums;enums�GAA�Google.Ads.GoogleAds.V9.Enums�Google\\Ads\\GoogleAds\\V9\\Enums�!Google::Ads::GoogleAds::V9::Enumsbproto3
�
-google/ads/googleads/v9/common/ad_asset.protogoogle.ads.googleads.v9.common;google/ads/googleads/v9/enums/asset_performance_label.proto;google/ads/googleads/v9/enums/served_asset_field_type.protogoogle/api/annotations.proto"�
AdTextAsset
text (	H �b
pinned_field (2L.google.ads.googleads.v9.enums.ServedAssetFieldTypeEnum.ServedAssetFieldTypeo
asset_performance_label (2N.google.ads.googleads.v9.enums.AssetPerformanceLabelEnum.AssetPerformanceLabelQ
policy_summary_info (24.google.ads.googleads.v9.common.AdAssetPolicySummaryB
_text",
AdImageAsset
asset (	H �B
_asset",
AdVideoAsset
asset (	H �B
_asset"2
AdMediaBundleAsset
asset (	H �B
_assetB�
"com.google.ads.googleads.v9.commonBAdAssetProtoPZDgoogle.golang.org/genproto/googleapis/ads/googleads/v9/common;common�GAA�Google.Ads.GoogleAds.V9.Common�Google\\Ads\\GoogleAds\\V9\\Common�"Google::Ads::GoogleAds::V9::Commonbproto3'
        , true);
        static::$is_initialized = true;
    }
}

