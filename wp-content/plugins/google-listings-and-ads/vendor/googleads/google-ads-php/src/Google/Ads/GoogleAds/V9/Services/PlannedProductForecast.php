<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/reach_plan_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Forecasted traffic metrics for a planned product.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.PlannedProductForecast</code>
 */
class PlannedProductForecast extends \Google\Protobuf\Internal\Message
{
    /**
     * Number of unique people reached that exactly matches the Targeting.
     * Note that a minimum number of unique people must be reached in order for
     * data to be reported. If the minimum number is not met, the on_target_reach
     * value will be rounded to 0.
     *
     * Generated from protobuf field <code>int64 on_target_reach = 1;</code>
     */
    protected $on_target_reach = 0;
    /**
     * Number of unique people reached. This includes people that may fall
     * outside the specified Targeting.
     * Note that a minimum number of unique people must be reached in order for
     * data to be reported. If the minimum number is not met, the total_reach
     * value will be rounded to 0.
     *
     * Generated from protobuf field <code>int64 total_reach = 2;</code>
     */
    protected $total_reach = 0;
    /**
     * Number of ad impressions that exactly matches the Targeting.
     *
     * Generated from protobuf field <code>int64 on_target_impressions = 3;</code>
     */
    protected $on_target_impressions = 0;
    /**
     * Total number of ad impressions. This includes impressions that may fall
     * outside the specified Targeting, due to insufficient information on
     * signed-in users.
     *
     * Generated from protobuf field <code>int64 total_impressions = 4;</code>
     */
    protected $total_impressions = 0;
    /**
     * Number of times the ad's impressions were considered viewable.
     * See https://support.google.com/google-ads/answer/7029393 for
     * more information about what makes an ad viewable and how
     * viewability is measured.
     *
     * Generated from protobuf field <code>optional int64 viewable_impressions = 5;</code>
     */
    protected $viewable_impressions = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $on_target_reach
     *           Number of unique people reached that exactly matches the Targeting.
     *           Note that a minimum number of unique people must be reached in order for
     *           data to be reported. If the minimum number is not met, the on_target_reach
     *           value will be rounded to 0.
     *     @type int|string $total_reach
     *           Number of unique people reached. This includes people that may fall
     *           outside the specified Targeting.
     *           Note that a minimum number of unique people must be reached in order for
     *           data to be reported. If the minimum number is not met, the total_reach
     *           value will be rounded to 0.
     *     @type int|string $on_target_impressions
     *           Number of ad impressions that exactly matches the Targeting.
     *     @type int|string $total_impressions
     *           Total number of ad impressions. This includes impressions that may fall
     *           outside the specified Targeting, due to insufficient information on
     *           signed-in users.
     *     @type int|string $viewable_impressions
     *           Number of times the ad's impressions were considered viewable.
     *           See https://support.google.com/google-ads/answer/7029393 for
     *           more information about what makes an ad viewable and how
     *           viewability is measured.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\ReachPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * Number of unique people reached that exactly matches the Targeting.
     * Note that a minimum number of unique people must be reached in order for
     * data to be reported. If the minimum number is not met, the on_target_reach
     * value will be rounded to 0.
     *
     * Generated from protobuf field <code>int64 on_target_reach = 1;</code>
     * @return int|string
     */
    public function getOnTargetReach()
    {
        return $this->on_target_reach;
    }

    /**
     * Number of unique people reached that exactly matches the Targeting.
     * Note that a minimum number of unique people must be reached in order for
     * data to be reported. If the minimum number is not met, the on_target_reach
     * value will be rounded to 0.
     *
     * Generated from protobuf field <code>int64 on_target_reach = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setOnTargetReach($var)
    {
        GPBUtil::checkInt64($var);
        $this->on_target_reach = $var;

        return $this;
    }

    /**
     * Number of unique people reached. This includes people that may fall
     * outside the specified Targeting.
     * Note that a minimum number of unique people must be reached in order for
     * data to be reported. If the minimum number is not met, the total_reach
     * value will be rounded to 0.
     *
     * Generated from protobuf field <code>int64 total_reach = 2;</code>
     * @return int|string
     */
    public function getTotalReach()
    {
        return $this->total_reach;
    }

    /**
     * Number of unique people reached. This includes people that may fall
     * outside the specified Targeting.
     * Note that a minimum number of unique people must be reached in order for
     * data to be reported. If the minimum number is not met, the total_reach
     * value will be rounded to 0.
     *
     * Generated from protobuf field <code>int64 total_reach = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTotalReach($var)
    {
        GPBUtil::checkInt64($var);
        $this->total_reach = $var;

        return $this;
    }

    /**
     * Number of ad impressions that exactly matches the Targeting.
     *
     * Generated from protobuf field <code>int64 on_target_impressions = 3;</code>
     * @return int|string
     */
    public function getOnTargetImpressions()
    {
        return $this->on_target_impressions;
    }

    /**
     * Number of ad impressions that exactly matches the Targeting.
     *
     * Generated from protobuf field <code>int64 on_target_impressions = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setOnTargetImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->on_target_impressions = $var;

        return $this;
    }

    /**
     * Total number of ad impressions. This includes impressions that may fall
     * outside the specified Targeting, due to insufficient information on
     * signed-in users.
     *
     * Generated from protobuf field <code>int64 total_impressions = 4;</code>
     * @return int|string
     */
    public function getTotalImpressions()
    {
        return $this->total_impressions;
    }

    /**
     * Total number of ad impressions. This includes impressions that may fall
     * outside the specified Targeting, due to insufficient information on
     * signed-in users.
     *
     * Generated from protobuf field <code>int64 total_impressions = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTotalImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->total_impressions = $var;

        return $this;
    }

    /**
     * Number of times the ad's impressions were considered viewable.
     * See https://support.google.com/google-ads/answer/7029393 for
     * more information about what makes an ad viewable and how
     * viewability is measured.
     *
     * Generated from protobuf field <code>optional int64 viewable_impressions = 5;</code>
     * @return int|string
     */
    public function getViewableImpressions()
    {
        return isset($this->viewable_impressions) ? $this->viewable_impressions : 0;
    }

    public function hasViewableImpressions()
    {
        return isset($this->viewable_impressions);
    }

    public function clearViewableImpressions()
    {
        unset($this->viewable_impressions);
    }

    /**
     * Number of times the ad's impressions were considered viewable.
     * See https://support.google.com/google-ads/answer/7029393 for
     * more information about what makes an ad viewable and how
     * viewability is measured.
     *
     * Generated from protobuf field <code>optional int64 viewable_impressions = 5;</code>
     * @param int|string $var
     * @return $this
     */
    public function setViewableImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->viewable_impressions = $var;

        return $this;
    }

}

