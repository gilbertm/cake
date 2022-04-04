<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/customer_client_link_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for a CustomerClientLink mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.MutateCustomerClientLinkResponse</code>
 */
class MutateCustomerClientLinkResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * A result that identifies the resource affected by the mutate request.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.services.MutateCustomerClientLinkResult result = 1;</code>
     */
    protected $result = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Services\MutateCustomerClientLinkResult $result
     *           A result that identifies the resource affected by the mutate request.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\CustomerClientLinkService::initOnce();
        parent::__construct($data);
    }

    /**
     * A result that identifies the resource affected by the mutate request.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.services.MutateCustomerClientLinkResult result = 1;</code>
     * @return \Google\Ads\GoogleAds\V9\Services\MutateCustomerClientLinkResult|null
     */
    public function getResult()
    {
        return $this->result;
    }

    public function hasResult()
    {
        return isset($this->result);
    }

    public function clearResult()
    {
        unset($this->result);
    }

    /**
     * A result that identifies the resource affected by the mutate request.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.services.MutateCustomerClientLinkResult result = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Services\MutateCustomerClientLinkResult $var
     * @return $this
     */
    public function setResult($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Services\MutateCustomerClientLinkResult::class);
        $this->result = $var;

        return $this;
    }

}

