<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/batch_job_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for [BatchJobService.MutateBatchJob][google.ads.googleads.v9.services.BatchJobService.MutateBatchJob].
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.MutateBatchJobResponse</code>
 */
class MutateBatchJobResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The result for the mutate.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.services.MutateBatchJobResult result = 1;</code>
     */
    protected $result = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Services\MutateBatchJobResult $result
     *           The result for the mutate.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\BatchJobService::initOnce();
        parent::__construct($data);
    }

    /**
     * The result for the mutate.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.services.MutateBatchJobResult result = 1;</code>
     * @return \Google\Ads\GoogleAds\V9\Services\MutateBatchJobResult|null
     */
    public function getResult()
    {
        return $this->result;
    }

    public function hasResult()
    {
        return isset($this->result);
    }

    public function clearResult()
    {
        unset($this->result);
    }

    /**
     * The result for the mutate.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.services.MutateBatchJobResult result = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Services\MutateBatchJobResult $var
     * @return $this
     */
    public function setResult($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Services\MutateBatchJobResult::class);
        $this->result = $var;

        return $this;
    }

}

