<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/reach_plan_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The list of plannable locations.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.ListPlannableLocationsResponse</code>
 */
class ListPlannableLocationsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The list of locations available for planning (Countries, DMAs,
     * sub-countries).
     * For locations like Countries and DMAs see
     * https://developers.google.com/google-ads/api/reference/data/geotargets for
     * more information.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.PlannableLocation plannable_locations = 1;</code>
     */
    private $plannable_locations;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Services\PlannableLocation[]|\Google\Protobuf\Internal\RepeatedField $plannable_locations
     *           The list of locations available for planning (Countries, DMAs,
     *           sub-countries).
     *           For locations like Countries and DMAs see
     *           https://developers.google.com/google-ads/api/reference/data/geotargets for
     *           more information.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\ReachPlanService::initOnce();
        parent::__construct($data);
    }

    /**
     * The list of locations available for planning (Countries, DMAs,
     * sub-countries).
     * For locations like Countries and DMAs see
     * https://developers.google.com/google-ads/api/reference/data/geotargets for
     * more information.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.PlannableLocation plannable_locations = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPlannableLocations()
    {
        return $this->plannable_locations;
    }

    /**
     * The list of locations available for planning (Countries, DMAs,
     * sub-countries).
     * For locations like Countries and DMAs see
     * https://developers.google.com/google-ads/api/reference/data/geotargets for
     * more information.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.PlannableLocation plannable_locations = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Services\PlannableLocation[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPlannableLocations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V9\Services\PlannableLocation::class);
        $this->plannable_locations = $arr;

        return $this;
    }

}

