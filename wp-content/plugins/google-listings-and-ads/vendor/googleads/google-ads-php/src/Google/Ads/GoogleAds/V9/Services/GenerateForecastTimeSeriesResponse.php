<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/keyword_plan_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for [KeywordPlanService.GenerateForecastTimeSeries][google.ads.googleads.v9.services.KeywordPlanService.GenerateForecastTimeSeries].
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.GenerateForecastTimeSeriesResponse</code>
 */
class GenerateForecastTimeSeriesResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * List of weekly time series forecasts for the keyword plan campaign.
     * One maximum.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.KeywordPlanWeeklyTimeSeriesForecast weekly_time_series_forecasts = 1;</code>
     */
    private $weekly_time_series_forecasts;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Services\KeywordPlanWeeklyTimeSeriesForecast[]|\Google\Protobuf\Internal\RepeatedField $weekly_time_series_forecasts
     *           List of weekly time series forecasts for the keyword plan campaign.
     *           One maximum.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\KeywordPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * List of weekly time series forecasts for the keyword plan campaign.
     * One maximum.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.KeywordPlanWeeklyTimeSeriesForecast weekly_time_series_forecasts = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getWeeklyTimeSeriesForecasts()
    {
        return $this->weekly_time_series_forecasts;
    }

    /**
     * List of weekly time series forecasts for the keyword plan campaign.
     * One maximum.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.KeywordPlanWeeklyTimeSeriesForecast weekly_time_series_forecasts = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Services\KeywordPlanWeeklyTimeSeriesForecast[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setWeeklyTimeSeriesForecasts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V9\Services\KeywordPlanWeeklyTimeSeriesForecast::class);
        $this->weekly_time_series_forecasts = $arr;

        return $this;
    }

}

