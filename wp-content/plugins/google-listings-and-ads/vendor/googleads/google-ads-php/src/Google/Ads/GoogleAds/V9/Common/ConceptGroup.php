<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/keyword_plan_common.proto

namespace Google\Ads\GoogleAds\V9\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The concept group for the keyword concept.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.common.ConceptGroup</code>
 */
class ConceptGroup extends \Google\Protobuf\Internal\Message
{
    /**
     * The concept group name.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    protected $name = '';
    /**
     * The concept group type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.KeywordPlanConceptGroupTypeEnum.KeywordPlanConceptGroupType type = 2;</code>
     */
    protected $type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The concept group name.
     *     @type int $type
     *           The concept group type.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Common\KeywordPlanCommon::initOnce();
        parent::__construct($data);
    }

    /**
     * The concept group name.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The concept group name.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The concept group type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.KeywordPlanConceptGroupTypeEnum.KeywordPlanConceptGroupType type = 2;</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The concept group type.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.KeywordPlanConceptGroupTypeEnum.KeywordPlanConceptGroupType type = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\KeywordPlanConceptGroupTypeEnum\KeywordPlanConceptGroupType::class);
        $this->type = $var;

        return $this;
    }

}

