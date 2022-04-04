<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/media_file.proto

namespace Google\Ads\GoogleAds\V9\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a ZIP archive media the content of which contains HTML5 assets.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.MediaBundle</code>
 */
class MediaBundle extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Raw zipped data.
     *
     * Generated from protobuf field <code>optional bytes data = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $data = null;
    /**
     * Output only. The url to access the uploaded zipped data.
     * E.g. https://tpc.googlesyndication.com/simgad/123
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string url = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $url = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $data
     *           Immutable. Raw zipped data.
     *     @type string $url
     *           Output only. The url to access the uploaded zipped data.
     *           E.g. https://tpc.googlesyndication.com/simgad/123
     *           This field is read-only.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\MediaFile::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Raw zipped data.
     *
     * Generated from protobuf field <code>optional bytes data = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getData()
    {
        return isset($this->data) ? $this->data : '';
    }

    public function hasData()
    {
        return isset($this->data);
    }

    public function clearData()
    {
        unset($this->data);
    }

    /**
     * Immutable. Raw zipped data.
     *
     * Generated from protobuf field <code>optional bytes data = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setData($var)
    {
        GPBUtil::checkString($var, False);
        $this->data = $var;

        return $this;
    }

    /**
     * Output only. The url to access the uploaded zipped data.
     * E.g. https://tpc.googlesyndication.com/simgad/123
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string url = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getUrl()
    {
        return isset($this->url) ? $this->url : '';
    }

    public function hasUrl()
    {
        return isset($this->url);
    }

    public function clearUrl()
    {
        unset($this->url);
    }

    /**
     * Output only. The url to access the uploaded zipped data.
     * E.g. https://tpc.googlesyndication.com/simgad/123
     * This field is read-only.
     *
     * Generated from protobuf field <code>optional string url = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->url = $var;

        return $this;
    }

}

