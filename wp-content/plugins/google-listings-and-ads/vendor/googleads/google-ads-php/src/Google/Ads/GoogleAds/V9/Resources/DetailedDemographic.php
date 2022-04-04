<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/detailed_demographic.proto

namespace Google\Ads\GoogleAds\V9\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A detailed demographic: a particular interest-based vertical to be targeted
 * to reach users based on long-term life facts.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.DetailedDemographic</code>
 */
class DetailedDemographic extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the detailed demographic.
     * Detailed demographic resource names have the form:
     * `customers/{customer_id}/detailedDemographics/{detailed_demographic_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the detailed demographic.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = 0;
    /**
     * Output only. The name of the detailed demographic. E.g."Highest Level of Educational
     * Attainment"
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $name = '';
    /**
     * Output only. The parent of the detailed_demographic.
     *
     * Generated from protobuf field <code>string parent = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $parent = '';
    /**
     * Output only. True if the detailed demographic is launched to all channels and locales.
     *
     * Generated from protobuf field <code>bool launched_to_all = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $launched_to_all = false;
    /**
     * Output only. Availability information of the detailed demographic.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.CriterionCategoryAvailability availabilities = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $availabilities;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the detailed demographic.
     *           Detailed demographic resource names have the form:
     *           `customers/{customer_id}/detailedDemographics/{detailed_demographic_id}`
     *     @type int|string $id
     *           Output only. The ID of the detailed demographic.
     *     @type string $name
     *           Output only. The name of the detailed demographic. E.g."Highest Level of Educational
     *           Attainment"
     *     @type string $parent
     *           Output only. The parent of the detailed_demographic.
     *     @type bool $launched_to_all
     *           Output only. True if the detailed demographic is launched to all channels and locales.
     *     @type \Google\Ads\GoogleAds\V9\Common\CriterionCategoryAvailability[]|\Google\Protobuf\Internal\RepeatedField $availabilities
     *           Output only. Availability information of the detailed demographic.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\DetailedDemographic::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the detailed demographic.
     * Detailed demographic resource names have the form:
     * `customers/{customer_id}/detailedDemographics/{detailed_demographic_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the detailed demographic.
     * Detailed demographic resource names have the form:
     * `customers/{customer_id}/detailedDemographics/{detailed_demographic_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * Output only. The ID of the detailed demographic.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Output only. The ID of the detailed demographic.
     *
     * Generated from protobuf field <code>int64 id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. The name of the detailed demographic. E.g."Highest Level of Educational
     * Attainment"
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The name of the detailed demographic. E.g."Highest Level of Educational
     * Attainment"
     *
     * Generated from protobuf field <code>string name = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The parent of the detailed_demographic.
     *
     * Generated from protobuf field <code>string parent = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Output only. The parent of the detailed_demographic.
     *
     * Generated from protobuf field <code>string parent = 4 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Output only. True if the detailed demographic is launched to all channels and locales.
     *
     * Generated from protobuf field <code>bool launched_to_all = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return bool
     */
    public function getLaunchedToAll()
    {
        return $this->launched_to_all;
    }

    /**
     * Output only. True if the detailed demographic is launched to all channels and locales.
     *
     * Generated from protobuf field <code>bool launched_to_all = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param bool $var
     * @return $this
     */
    public function setLaunchedToAll($var)
    {
        GPBUtil::checkBool($var);
        $this->launched_to_all = $var;

        return $this;
    }

    /**
     * Output only. Availability information of the detailed demographic.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.CriterionCategoryAvailability availabilities = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAvailabilities()
    {
        return $this->availabilities;
    }

    /**
     * Output only. Availability information of the detailed demographic.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.CriterionCategoryAvailability availabilities = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V9\Common\CriterionCategoryAvailability[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAvailabilities($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V9\Common\CriterionCategoryAvailability::class);
        $this->availabilities = $arr;

        return $this;
    }

}

