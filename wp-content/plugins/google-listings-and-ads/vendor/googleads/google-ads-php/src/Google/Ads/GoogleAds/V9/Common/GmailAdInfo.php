<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V9\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Gmail ad.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.common.GmailAdInfo</code>
 */
class GmailAdInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The Gmail teaser.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.GmailTeaser teaser = 1;</code>
     */
    protected $teaser = null;
    /**
     * The MediaFile resource name of the header image. Valid image types are GIF,
     * JPEG and PNG. The minimum size is 300x100 pixels and the aspect ratio must
     * be between 3:1 and 5:1 (+-1%).
     *
     * Generated from protobuf field <code>optional string header_image = 10;</code>
     */
    protected $header_image = null;
    /**
     * The MediaFile resource name of the marketing image. Valid image types are
     * GIF, JPEG and PNG. The image must either be landscape with a minimum size
     * of 600x314 pixels and aspect ratio of 600:314 (+-1%) or square with a
     * minimum size of 300x300 pixels and aspect ratio of 1:1 (+-1%)
     *
     * Generated from protobuf field <code>optional string marketing_image = 11;</code>
     */
    protected $marketing_image = null;
    /**
     * Headline of the marketing image.
     *
     * Generated from protobuf field <code>optional string marketing_image_headline = 12;</code>
     */
    protected $marketing_image_headline = null;
    /**
     * Description of the marketing image.
     *
     * Generated from protobuf field <code>optional string marketing_image_description = 13;</code>
     */
    protected $marketing_image_description = null;
    /**
     * Display-call-to-action of the marketing image.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.DisplayCallToAction marketing_image_display_call_to_action = 6;</code>
     */
    protected $marketing_image_display_call_to_action = null;
    /**
     * Product images. Up to 15 images are supported.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.ProductImage product_images = 7;</code>
     */
    private $product_images;
    /**
     * Product videos. Up to 7 videos are supported. At least one product video
     * or a marketing image must be specified.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.ProductVideo product_videos = 8;</code>
     */
    private $product_videos;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Common\GmailTeaser $teaser
     *           The Gmail teaser.
     *     @type string $header_image
     *           The MediaFile resource name of the header image. Valid image types are GIF,
     *           JPEG and PNG. The minimum size is 300x100 pixels and the aspect ratio must
     *           be between 3:1 and 5:1 (+-1%).
     *     @type string $marketing_image
     *           The MediaFile resource name of the marketing image. Valid image types are
     *           GIF, JPEG and PNG. The image must either be landscape with a minimum size
     *           of 600x314 pixels and aspect ratio of 600:314 (+-1%) or square with a
     *           minimum size of 300x300 pixels and aspect ratio of 1:1 (+-1%)
     *     @type string $marketing_image_headline
     *           Headline of the marketing image.
     *     @type string $marketing_image_description
     *           Description of the marketing image.
     *     @type \Google\Ads\GoogleAds\V9\Common\DisplayCallToAction $marketing_image_display_call_to_action
     *           Display-call-to-action of the marketing image.
     *     @type \Google\Ads\GoogleAds\V9\Common\ProductImage[]|\Google\Protobuf\Internal\RepeatedField $product_images
     *           Product images. Up to 15 images are supported.
     *     @type \Google\Ads\GoogleAds\V9\Common\ProductVideo[]|\Google\Protobuf\Internal\RepeatedField $product_videos
     *           Product videos. Up to 7 videos are supported. At least one product video
     *           or a marketing image must be specified.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * The Gmail teaser.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.GmailTeaser teaser = 1;</code>
     * @return \Google\Ads\GoogleAds\V9\Common\GmailTeaser|null
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    public function hasTeaser()
    {
        return isset($this->teaser);
    }

    public function clearTeaser()
    {
        unset($this->teaser);
    }

    /**
     * The Gmail teaser.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.GmailTeaser teaser = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Common\GmailTeaser $var
     * @return $this
     */
    public function setTeaser($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Common\GmailTeaser::class);
        $this->teaser = $var;

        return $this;
    }

    /**
     * The MediaFile resource name of the header image. Valid image types are GIF,
     * JPEG and PNG. The minimum size is 300x100 pixels and the aspect ratio must
     * be between 3:1 and 5:1 (+-1%).
     *
     * Generated from protobuf field <code>optional string header_image = 10;</code>
     * @return string
     */
    public function getHeaderImage()
    {
        return isset($this->header_image) ? $this->header_image : '';
    }

    public function hasHeaderImage()
    {
        return isset($this->header_image);
    }

    public function clearHeaderImage()
    {
        unset($this->header_image);
    }

    /**
     * The MediaFile resource name of the header image. Valid image types are GIF,
     * JPEG and PNG. The minimum size is 300x100 pixels and the aspect ratio must
     * be between 3:1 and 5:1 (+-1%).
     *
     * Generated from protobuf field <code>optional string header_image = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setHeaderImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->header_image = $var;

        return $this;
    }

    /**
     * The MediaFile resource name of the marketing image. Valid image types are
     * GIF, JPEG and PNG. The image must either be landscape with a minimum size
     * of 600x314 pixels and aspect ratio of 600:314 (+-1%) or square with a
     * minimum size of 300x300 pixels and aspect ratio of 1:1 (+-1%)
     *
     * Generated from protobuf field <code>optional string marketing_image = 11;</code>
     * @return string
     */
    public function getMarketingImage()
    {
        return isset($this->marketing_image) ? $this->marketing_image : '';
    }

    public function hasMarketingImage()
    {
        return isset($this->marketing_image);
    }

    public function clearMarketingImage()
    {
        unset($this->marketing_image);
    }

    /**
     * The MediaFile resource name of the marketing image. Valid image types are
     * GIF, JPEG and PNG. The image must either be landscape with a minimum size
     * of 600x314 pixels and aspect ratio of 600:314 (+-1%) or square with a
     * minimum size of 300x300 pixels and aspect ratio of 1:1 (+-1%)
     *
     * Generated from protobuf field <code>optional string marketing_image = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setMarketingImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->marketing_image = $var;

        return $this;
    }

    /**
     * Headline of the marketing image.
     *
     * Generated from protobuf field <code>optional string marketing_image_headline = 12;</code>
     * @return string
     */
    public function getMarketingImageHeadline()
    {
        return isset($this->marketing_image_headline) ? $this->marketing_image_headline : '';
    }

    public function hasMarketingImageHeadline()
    {
        return isset($this->marketing_image_headline);
    }

    public function clearMarketingImageHeadline()
    {
        unset($this->marketing_image_headline);
    }

    /**
     * Headline of the marketing image.
     *
     * Generated from protobuf field <code>optional string marketing_image_headline = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setMarketingImageHeadline($var)
    {
        GPBUtil::checkString($var, True);
        $this->marketing_image_headline = $var;

        return $this;
    }

    /**
     * Description of the marketing image.
     *
     * Generated from protobuf field <code>optional string marketing_image_description = 13;</code>
     * @return string
     */
    public function getMarketingImageDescription()
    {
        return isset($this->marketing_image_description) ? $this->marketing_image_description : '';
    }

    public function hasMarketingImageDescription()
    {
        return isset($this->marketing_image_description);
    }

    public function clearMarketingImageDescription()
    {
        unset($this->marketing_image_description);
    }

    /**
     * Description of the marketing image.
     *
     * Generated from protobuf field <code>optional string marketing_image_description = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setMarketingImageDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->marketing_image_description = $var;

        return $this;
    }

    /**
     * Display-call-to-action of the marketing image.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.DisplayCallToAction marketing_image_display_call_to_action = 6;</code>
     * @return \Google\Ads\GoogleAds\V9\Common\DisplayCallToAction|null
     */
    public function getMarketingImageDisplayCallToAction()
    {
        return $this->marketing_image_display_call_to_action;
    }

    public function hasMarketingImageDisplayCallToAction()
    {
        return isset($this->marketing_image_display_call_to_action);
    }

    public function clearMarketingImageDisplayCallToAction()
    {
        unset($this->marketing_image_display_call_to_action);
    }

    /**
     * Display-call-to-action of the marketing image.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.common.DisplayCallToAction marketing_image_display_call_to_action = 6;</code>
     * @param \Google\Ads\GoogleAds\V9\Common\DisplayCallToAction $var
     * @return $this
     */
    public function setMarketingImageDisplayCallToAction($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Common\DisplayCallToAction::class);
        $this->marketing_image_display_call_to_action = $var;

        return $this;
    }

    /**
     * Product images. Up to 15 images are supported.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.ProductImage product_images = 7;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getProductImages()
    {
        return $this->product_images;
    }

    /**
     * Product images. Up to 15 images are supported.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.ProductImage product_images = 7;</code>
     * @param \Google\Ads\GoogleAds\V9\Common\ProductImage[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setProductImages($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V9\Common\ProductImage::class);
        $this->product_images = $arr;

        return $this;
    }

    /**
     * Product videos. Up to 7 videos are supported. At least one product video
     * or a marketing image must be specified.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.ProductVideo product_videos = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getProductVideos()
    {
        return $this->product_videos;
    }

    /**
     * Product videos. Up to 7 videos are supported. At least one product video
     * or a marketing image must be specified.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.common.ProductVideo product_videos = 8;</code>
     * @param \Google\Ads\GoogleAds\V9\Common\ProductVideo[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setProductVideos($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V9\Common\ProductVideo::class);
        $this->product_videos = $arr;

        return $this;
    }

}

