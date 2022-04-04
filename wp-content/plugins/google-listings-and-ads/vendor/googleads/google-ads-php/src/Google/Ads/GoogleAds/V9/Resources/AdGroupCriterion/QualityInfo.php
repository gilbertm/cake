<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/ad_group_criterion.proto

namespace Google\Ads\GoogleAds\V9\Resources\AdGroupCriterion;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A container for ad group criterion quality information.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.AdGroupCriterion.QualityInfo</code>
 */
class QualityInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The quality score.
     * This field may not be populated if Google does not have enough
     * information to determine a value.
     *
     * Generated from protobuf field <code>optional int32 quality_score = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $quality_score = null;
    /**
     * Output only. The performance of the ad compared to other advertisers.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket creative_quality_score = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $creative_quality_score = 0;
    /**
     * Output only. The quality score of the landing page.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket post_click_quality_score = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $post_click_quality_score = 0;
    /**
     * Output only. The click-through rate compared to that of other advertisers.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket search_predicted_ctr = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $search_predicted_ctr = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $quality_score
     *           Output only. The quality score.
     *           This field may not be populated if Google does not have enough
     *           information to determine a value.
     *     @type int $creative_quality_score
     *           Output only. The performance of the ad compared to other advertisers.
     *     @type int $post_click_quality_score
     *           Output only. The quality score of the landing page.
     *     @type int $search_predicted_ctr
     *           Output only. The click-through rate compared to that of other advertisers.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\AdGroupCriterion::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The quality score.
     * This field may not be populated if Google does not have enough
     * information to determine a value.
     *
     * Generated from protobuf field <code>optional int32 quality_score = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getQualityScore()
    {
        return isset($this->quality_score) ? $this->quality_score : 0;
    }

    public function hasQualityScore()
    {
        return isset($this->quality_score);
    }

    public function clearQualityScore()
    {
        unset($this->quality_score);
    }

    /**
     * Output only. The quality score.
     * This field may not be populated if Google does not have enough
     * information to determine a value.
     *
     * Generated from protobuf field <code>optional int32 quality_score = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setQualityScore($var)
    {
        GPBUtil::checkInt32($var);
        $this->quality_score = $var;

        return $this;
    }

    /**
     * Output only. The performance of the ad compared to other advertisers.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket creative_quality_score = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getCreativeQualityScore()
    {
        return $this->creative_quality_score;
    }

    /**
     * Output only. The performance of the ad compared to other advertisers.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket creative_quality_score = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setCreativeQualityScore($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\QualityScoreBucketEnum\QualityScoreBucket::class);
        $this->creative_quality_score = $var;

        return $this;
    }

    /**
     * Output only. The quality score of the landing page.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket post_click_quality_score = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getPostClickQualityScore()
    {
        return $this->post_click_quality_score;
    }

    /**
     * Output only. The quality score of the landing page.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket post_click_quality_score = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setPostClickQualityScore($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\QualityScoreBucketEnum\QualityScoreBucket::class);
        $this->post_click_quality_score = $var;

        return $this;
    }

    /**
     * Output only. The click-through rate compared to that of other advertisers.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket search_predicted_ctr = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getSearchPredictedCtr()
    {
        return $this->search_predicted_ctr;
    }

    /**
     * Output only. The click-through rate compared to that of other advertisers.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.QualityScoreBucketEnum.QualityScoreBucket search_predicted_ctr = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setSearchPredictedCtr($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\QualityScoreBucketEnum\QualityScoreBucket::class);
        $this->search_predicted_ctr = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityInfo::class, \Google\Ads\GoogleAds\V9\Resources\AdGroupCriterion_QualityInfo::class);

