<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/simulation.proto

namespace Google\Ads\GoogleAds\V9\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Projected metrics for a specific CPV bid amount.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.common.CpvBidSimulationPoint</code>
 */
class CpvBidSimulationPoint extends \Google\Protobuf\Internal\Message
{
    /**
     * The simulated CPV bid upon which projected metrics are based.
     *
     * Generated from protobuf field <code>optional int64 cpv_bid_micros = 5;</code>
     */
    protected $cpv_bid_micros = null;
    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>optional int64 cost_micros = 6;</code>
     */
    protected $cost_micros = null;
    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>optional int64 impressions = 7;</code>
     */
    protected $impressions = null;
    /**
     * Projected number of views.
     *
     * Generated from protobuf field <code>optional int64 views = 8;</code>
     */
    protected $views = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $cpv_bid_micros
     *           The simulated CPV bid upon which projected metrics are based.
     *     @type int|string $cost_micros
     *           Projected cost in micros.
     *     @type int|string $impressions
     *           Projected number of impressions.
     *     @type int|string $views
     *           Projected number of views.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Common\Simulation::initOnce();
        parent::__construct($data);
    }

    /**
     * The simulated CPV bid upon which projected metrics are based.
     *
     * Generated from protobuf field <code>optional int64 cpv_bid_micros = 5;</code>
     * @return int|string
     */
    public function getCpvBidMicros()
    {
        return isset($this->cpv_bid_micros) ? $this->cpv_bid_micros : 0;
    }

    public function hasCpvBidMicros()
    {
        return isset($this->cpv_bid_micros);
    }

    public function clearCpvBidMicros()
    {
        unset($this->cpv_bid_micros);
    }

    /**
     * The simulated CPV bid upon which projected metrics are based.
     *
     * Generated from protobuf field <code>optional int64 cpv_bid_micros = 5;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCpvBidMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cpv_bid_micros = $var;

        return $this;
    }

    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>optional int64 cost_micros = 6;</code>
     * @return int|string
     */
    public function getCostMicros()
    {
        return isset($this->cost_micros) ? $this->cost_micros : 0;
    }

    public function hasCostMicros()
    {
        return isset($this->cost_micros);
    }

    public function clearCostMicros()
    {
        unset($this->cost_micros);
    }

    /**
     * Projected cost in micros.
     *
     * Generated from protobuf field <code>optional int64 cost_micros = 6;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCostMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cost_micros = $var;

        return $this;
    }

    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>optional int64 impressions = 7;</code>
     * @return int|string
     */
    public function getImpressions()
    {
        return isset($this->impressions) ? $this->impressions : 0;
    }

    public function hasImpressions()
    {
        return isset($this->impressions);
    }

    public function clearImpressions()
    {
        unset($this->impressions);
    }

    /**
     * Projected number of impressions.
     *
     * Generated from protobuf field <code>optional int64 impressions = 7;</code>
     * @param int|string $var
     * @return $this
     */
    public function setImpressions($var)
    {
        GPBUtil::checkInt64($var);
        $this->impressions = $var;

        return $this;
    }

    /**
     * Projected number of views.
     *
     * Generated from protobuf field <code>optional int64 views = 8;</code>
     * @return int|string
     */
    public function getViews()
    {
        return isset($this->views) ? $this->views : 0;
    }

    public function hasViews()
    {
        return isset($this->views);
    }

    public function clearViews()
    {
        unset($this->views);
    }

    /**
     * Projected number of views.
     *
     * Generated from protobuf field <code>optional int64 views = 8;</code>
     * @param int|string $var
     * @return $this
     */
    public function setViews($var)
    {
        GPBUtil::checkInt64($var);
        $this->views = $var;

        return $this;
    }

}

