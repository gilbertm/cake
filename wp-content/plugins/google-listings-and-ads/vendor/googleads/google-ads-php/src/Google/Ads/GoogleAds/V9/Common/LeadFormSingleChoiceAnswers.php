<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/asset_types.proto

namespace Google\Ads\GoogleAds\V9\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Defines possible answers for a single choice question, usually presented as
 * a single-choice drop-down list.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.common.LeadFormSingleChoiceAnswers</code>
 */
class LeadFormSingleChoiceAnswers extends \Google\Protobuf\Internal\Message
{
    /**
     * List of choices for a single question field. The order of entries defines
     * UI order. Minimum of 2 answers required and maximum of 12 allowed.
     *
     * Generated from protobuf field <code>repeated string answers = 1;</code>
     */
    private $answers;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $answers
     *           List of choices for a single question field. The order of entries defines
     *           UI order. Minimum of 2 answers required and maximum of 12 allowed.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Common\AssetTypes::initOnce();
        parent::__construct($data);
    }

    /**
     * List of choices for a single question field. The order of entries defines
     * UI order. Minimum of 2 answers required and maximum of 12 allowed.
     *
     * Generated from protobuf field <code>repeated string answers = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * List of choices for a single question field. The order of entries defines
     * UI order. Minimum of 2 answers required and maximum of 12 allowed.
     *
     * Generated from protobuf field <code>repeated string answers = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAnswers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->answers = $arr;

        return $this;
    }

}

