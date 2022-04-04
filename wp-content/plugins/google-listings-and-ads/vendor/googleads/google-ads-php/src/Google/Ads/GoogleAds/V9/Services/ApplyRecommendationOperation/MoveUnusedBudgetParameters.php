<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/recommendation_service.proto

namespace Google\Ads\GoogleAds\V9\Services\ApplyRecommendationOperation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Parameters to use when applying move unused budget recommendation.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.ApplyRecommendationOperation.MoveUnusedBudgetParameters</code>
 */
class MoveUnusedBudgetParameters extends \Google\Protobuf\Internal\Message
{
    /**
     * Budget amount to move from excess budget to constrained budget. This is
     * a required field.
     *
     * Generated from protobuf field <code>optional int64 budget_micros_to_move = 2;</code>
     */
    protected $budget_micros_to_move = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $budget_micros_to_move
     *           Budget amount to move from excess budget to constrained budget. This is
     *           a required field.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\RecommendationService::initOnce();
        parent::__construct($data);
    }

    /**
     * Budget amount to move from excess budget to constrained budget. This is
     * a required field.
     *
     * Generated from protobuf field <code>optional int64 budget_micros_to_move = 2;</code>
     * @return int|string
     */
    public function getBudgetMicrosToMove()
    {
        return isset($this->budget_micros_to_move) ? $this->budget_micros_to_move : 0;
    }

    public function hasBudgetMicrosToMove()
    {
        return isset($this->budget_micros_to_move);
    }

    public function clearBudgetMicrosToMove()
    {
        unset($this->budget_micros_to_move);
    }

    /**
     * Budget amount to move from excess budget to constrained budget. This is
     * a required field.
     *
     * Generated from protobuf field <code>optional int64 budget_micros_to_move = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setBudgetMicrosToMove($var)
    {
        GPBUtil::checkInt64($var);
        $this->budget_micros_to_move = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MoveUnusedBudgetParameters::class, \Google\Ads\GoogleAds\V9\Services\ApplyRecommendationOperation_MoveUnusedBudgetParameters::class);

