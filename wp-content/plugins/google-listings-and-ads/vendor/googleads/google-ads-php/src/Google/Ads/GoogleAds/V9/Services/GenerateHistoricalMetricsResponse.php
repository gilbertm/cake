<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/keyword_plan_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for [KeywordPlanService.GenerateHistoricalMetrics][google.ads.googleads.v9.services.KeywordPlanService.GenerateHistoricalMetrics].
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.GenerateHistoricalMetricsResponse</code>
 */
class GenerateHistoricalMetricsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * List of keyword historical metrics.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.KeywordPlanKeywordHistoricalMetrics metrics = 1;</code>
     */
    private $metrics;
    /**
     * The aggregate metrics for all the keywords in the keyword planner plan.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.KeywordPlanAggregateMetricResults aggregate_metric_results = 2;</code>
     */
    protected $aggregate_metric_results = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Services\KeywordPlanKeywordHistoricalMetrics[]|\Google\Protobuf\Internal\RepeatedField $metrics
     *           List of keyword historical metrics.
     *     @type \Google\Ads\GoogleAds\V9\Common\KeywordPlanAggregateMetricResults $aggregate_metric_results
     *           The aggregate metrics for all the keywords in the keyword planner plan.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\KeywordPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * List of keyword historical metrics.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.KeywordPlanKeywordHistoricalMetrics metrics = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * List of keyword historical metrics.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.KeywordPlanKeywordHistoricalMetrics metrics = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Services\KeywordPlanKeywordHistoricalMetrics[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMetrics($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V9\Services\KeywordPlanKeywordHistoricalMetrics::class);
        $this->metrics = $arr;

        return $this;
    }

    /**
     * The aggregate metrics for all the keywords in the keyword planner plan.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.KeywordPlanAggregateMetricResults aggregate_metric_results = 2;</code>
     * @return \Google\Ads\GoogleAds\V9\Common\KeywordPlanAggregateMetricResults|null
     */
    public function getAggregateMetricResults()
    {
        return $this->aggregate_metric_results;
    }

    public function hasAggregateMetricResults()
    {
        return isset($this->aggregate_metric_results);
    }

    public function clearAggregateMetricResults()
    {
        unset($this->aggregate_metric_results);
    }

    /**
     * The aggregate metrics for all the keywords in the keyword planner plan.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.KeywordPlanAggregateMetricResults aggregate_metric_results = 2;</code>
     * @param \Google\Ads\GoogleAds\V9\Common\KeywordPlanAggregateMetricResults $var
     * @return $this
     */
    public function setAggregateMetricResults($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Common\KeywordPlanAggregateMetricResults::class);
        $this->aggregate_metric_results = $var;

        return $this;
    }

}

