<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/customer_label_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Services;

class CustomerLabelService
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
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v9/resources/customer_label.proto!google.ads.googleads.v9.resourcesgoogle/api/resource.protogoogle/api/annotations.proto"�
CustomerLabelE
resource_name (	B.�A�A(
&googleads.googleapis.com/CustomerLabel@
customer (	B)�A�A#
!googleads.googleapis.com/CustomerH �:
label (	B&�A�A 
googleads.googleapis.com/LabelH�:^�A[
&googleads.googleapis.com/CustomerLabel1customers/{customer_id}/customerLabels/{label_id}B
	_customerB
_labelB�
%com.google.ads.googleads.v9.resourcesBCustomerLabelProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3
�
=google/ads/googleads/v9/services/customer_label_service.proto google.ads.googleads.v9.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"`
GetCustomerLabelRequestE
resource_name (	B.�A�A(
&googleads.googleapis.com/CustomerLabel"�
MutateCustomerLabelsRequest
customer_id (	B�AQ

operations (28.google.ads.googleads.v9.services.CustomerLabelOperationB�A
partial_failure (
validate_only ("{
CustomerLabelOperationB
create (20.google.ads.googleads.v9.resources.CustomerLabelH 
remove (	H B
	operation"�
MutateCustomerLabelsResponse1
partial_failure_error (2.google.rpc.StatusL
results (2;.google.ads.googleads.v9.services.MutateCustomerLabelResult"2
MutateCustomerLabelResult
resource_name (	2�
CustomerLabelService�
GetCustomerLabel9.google.ads.googleads.v9.services.GetCustomerLabelRequest0.google.ads.googleads.v9.resources.CustomerLabel"H���20/v9/{resource_name=customers/*/customerLabels/*}�Aresource_name�
MutateCustomerLabels=.google.ads.googleads.v9.services.MutateCustomerLabelsRequest>.google.ads.googleads.v9.services.MutateCustomerLabelsResponse"W���8"3/v9/customers/{customer_id=*}/customerLabels:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v9.servicesBCustomerLabelServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v9/services;services�GAA� Google.Ads.GoogleAds.V9.Services� Google\\Ads\\GoogleAds\\V9\\Services�$Google::Ads::GoogleAds::V9::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

