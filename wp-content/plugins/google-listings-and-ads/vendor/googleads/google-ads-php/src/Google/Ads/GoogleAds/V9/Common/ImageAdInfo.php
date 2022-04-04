<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V9\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An image ad.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.common.ImageAdInfo</code>
 */
class ImageAdInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Width in pixels of the full size image.
     *
     * Generated from protobuf field <code>optional int64 pixel_width = 15;</code>
     */
    protected $pixel_width = null;
    /**
     * Height in pixels of the full size image.
     *
     * Generated from protobuf field <code>optional int64 pixel_height = 16;</code>
     */
    protected $pixel_height = null;
    /**
     * URL of the full size image.
     *
     * Generated from protobuf field <code>optional string image_url = 17;</code>
     */
    protected $image_url = null;
    /**
     * Width in pixels of the preview size image.
     *
     * Generated from protobuf field <code>optional int64 preview_pixel_width = 18;</code>
     */
    protected $preview_pixel_width = null;
    /**
     * Height in pixels of the preview size image.
     *
     * Generated from protobuf field <code>optional int64 preview_pixel_height = 19;</code>
     */
    protected $preview_pixel_height = null;
    /**
     * URL of the preview size image.
     *
     * Generated from protobuf field <code>optional string preview_image_url = 20;</code>
     */
    protected $preview_image_url = null;
    /**
     * The mime type of the image.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.MimeTypeEnum.MimeType mime_type = 10;</code>
     */
    protected $mime_type = 0;
    /**
     * The name of the image. If the image was created from a MediaFile, this is
     * the MediaFile's name. If the image was created from bytes, this is empty.
     *
     * Generated from protobuf field <code>optional string name = 21;</code>
     */
    protected $name = null;
    protected $image;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $pixel_width
     *           Width in pixels of the full size image.
     *     @type int|string $pixel_height
     *           Height in pixels of the full size image.
     *     @type string $image_url
     *           URL of the full size image.
     *     @type int|string $preview_pixel_width
     *           Width in pixels of the preview size image.
     *     @type int|string $preview_pixel_height
     *           Height in pixels of the preview size image.
     *     @type string $preview_image_url
     *           URL of the preview size image.
     *     @type int $mime_type
     *           The mime type of the image.
     *     @type string $name
     *           The name of the image. If the image was created from a MediaFile, this is
     *           the MediaFile's name. If the image was created from bytes, this is empty.
     *     @type string $media_file
     *           The MediaFile resource to use for the image.
     *     @type string $data
     *           Raw image data as bytes.
     *     @type int|string $ad_id_to_copy_image_from
     *           An ad ID to copy the image from.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * Width in pixels of the full size image.
     *
     * Generated from protobuf field <code>optional int64 pixel_width = 15;</code>
     * @return int|string
     */
    public function getPixelWidth()
    {
        return isset($this->pixel_width) ? $this->pixel_width : 0;
    }

    public function hasPixelWidth()
    {
        return isset($this->pixel_width);
    }

    public function clearPixelWidth()
    {
        unset($this->pixel_width);
    }

    /**
     * Width in pixels of the full size image.
     *
     * Generated from protobuf field <code>optional int64 pixel_width = 15;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPixelWidth($var)
    {
        GPBUtil::checkInt64($var);
        $this->pixel_width = $var;

        return $this;
    }

    /**
     * Height in pixels of the full size image.
     *
     * Generated from protobuf field <code>optional int64 pixel_height = 16;</code>
     * @return int|string
     */
    public function getPixelHeight()
    {
        return isset($this->pixel_height) ? $this->pixel_height : 0;
    }

    public function hasPixelHeight()
    {
        return isset($this->pixel_height);
    }

    public function clearPixelHeight()
    {
        unset($this->pixel_height);
    }

    /**
     * Height in pixels of the full size image.
     *
     * Generated from protobuf field <code>optional int64 pixel_height = 16;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPixelHeight($var)
    {
        GPBUtil::checkInt64($var);
        $this->pixel_height = $var;

        return $this;
    }

    /**
     * URL of the full size image.
     *
     * Generated from protobuf field <code>optional string image_url = 17;</code>
     * @return string
     */
    public function getImageUrl()
    {
        return isset($this->image_url) ? $this->image_url : '';
    }

    public function hasImageUrl()
    {
        return isset($this->image_url);
    }

    public function clearImageUrl()
    {
        unset($this->image_url);
    }

    /**
     * URL of the full size image.
     *
     * Generated from protobuf field <code>optional string image_url = 17;</code>
     * @param string $var
     * @return $this
     */
    public function setImageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_url = $var;

        return $this;
    }

    /**
     * Width in pixels of the preview size image.
     *
     * Generated from protobuf field <code>optional int64 preview_pixel_width = 18;</code>
     * @return int|string
     */
    public function getPreviewPixelWidth()
    {
        return isset($this->preview_pixel_width) ? $this->preview_pixel_width : 0;
    }

    public function hasPreviewPixelWidth()
    {
        return isset($this->preview_pixel_width);
    }

    public function clearPreviewPixelWidth()
    {
        unset($this->preview_pixel_width);
    }

    /**
     * Width in pixels of the preview size image.
     *
     * Generated from protobuf field <code>optional int64 preview_pixel_width = 18;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPreviewPixelWidth($var)
    {
        GPBUtil::checkInt64($var);
        $this->preview_pixel_width = $var;

        return $this;
    }

    /**
     * Height in pixels of the preview size image.
     *
     * Generated from protobuf field <code>optional int64 preview_pixel_height = 19;</code>
     * @return int|string
     */
    public function getPreviewPixelHeight()
    {
        return isset($this->preview_pixel_height) ? $this->preview_pixel_height : 0;
    }

    public function hasPreviewPixelHeight()
    {
        return isset($this->preview_pixel_height);
    }

    public function clearPreviewPixelHeight()
    {
        unset($this->preview_pixel_height);
    }

    /**
     * Height in pixels of the preview size image.
     *
     * Generated from protobuf field <code>optional int64 preview_pixel_height = 19;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPreviewPixelHeight($var)
    {
        GPBUtil::checkInt64($var);
        $this->preview_pixel_height = $var;

        return $this;
    }

    /**
     * URL of the preview size image.
     *
     * Generated from protobuf field <code>optional string preview_image_url = 20;</code>
     * @return string
     */
    public function getPreviewImageUrl()
    {
        return isset($this->preview_image_url) ? $this->preview_image_url : '';
    }

    public function hasPreviewImageUrl()
    {
        return isset($this->preview_image_url);
    }

    public function clearPreviewImageUrl()
    {
        unset($this->preview_image_url);
    }

    /**
     * URL of the preview size image.
     *
     * Generated from protobuf field <code>optional string preview_image_url = 20;</code>
     * @param string $var
     * @return $this
     */
    public function setPreviewImageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->preview_image_url = $var;

        return $this;
    }

    /**
     * The mime type of the image.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.MimeTypeEnum.MimeType mime_type = 10;</code>
     * @return int
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * The mime type of the image.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.MimeTypeEnum.MimeType mime_type = 10;</code>
     * @param int $var
     * @return $this
     */
    public function setMimeType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\MimeTypeEnum\MimeType::class);
        $this->mime_type = $var;

        return $this;
    }

    /**
     * The name of the image. If the image was created from a MediaFile, this is
     * the MediaFile's name. If the image was created from bytes, this is empty.
     *
     * Generated from protobuf field <code>optional string name = 21;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * The name of the image. If the image was created from a MediaFile, this is
     * the MediaFile's name. If the image was created from bytes, this is empty.
     *
     * Generated from protobuf field <code>optional string name = 21;</code>
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
     * The MediaFile resource to use for the image.
     *
     * Generated from protobuf field <code>string media_file = 12;</code>
     * @return string
     */
    public function getMediaFile()
    {
        return $this->readOneof(12);
    }

    public function hasMediaFile()
    {
        return $this->hasOneof(12);
    }

    /**
     * The MediaFile resource to use for the image.
     *
     * Generated from protobuf field <code>string media_file = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setMediaFile($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(12, $var);

        return $this;
    }

    /**
     * Raw image data as bytes.
     *
     * Generated from protobuf field <code>bytes data = 13;</code>
     * @return string
     */
    public function getData()
    {
        return $this->readOneof(13);
    }

    public function hasData()
    {
        return $this->hasOneof(13);
    }

    /**
     * Raw image data as bytes.
     *
     * Generated from protobuf field <code>bytes data = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setData($var)
    {
        GPBUtil::checkString($var, False);
        $this->writeOneof(13, $var);

        return $this;
    }

    /**
     * An ad ID to copy the image from.
     *
     * Generated from protobuf field <code>int64 ad_id_to_copy_image_from = 14;</code>
     * @return int|string
     */
    public function getAdIdToCopyImageFrom()
    {
        return $this->readOneof(14);
    }

    public function hasAdIdToCopyImageFrom()
    {
        return $this->hasOneof(14);
    }

    /**
     * An ad ID to copy the image from.
     *
     * Generated from protobuf field <code>int64 ad_id_to_copy_image_from = 14;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAdIdToCopyImageFrom($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(14, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->whichOneof("image");
    }

}

