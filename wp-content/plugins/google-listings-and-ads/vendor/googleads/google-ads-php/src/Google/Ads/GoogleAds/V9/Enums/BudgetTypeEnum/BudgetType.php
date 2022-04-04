<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/enums/budget_type.proto

namespace Google\Ads\GoogleAds\V9\Enums\BudgetTypeEnum;

use UnexpectedValueException;

/**
 * Possible Budget types.
 *
 * Protobuf type <code>google.ads.googleads.v9.enums.BudgetTypeEnum.BudgetType</code>
 */
class BudgetType
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Budget type for standard Google Ads usage.
     * Caps daily spend at two times the specified budget amount.
     * Full details: https://support.google.com/google-ads/answer/6385083
     *
     * Generated from protobuf enum <code>STANDARD = 2;</code>
     */
    const STANDARD = 2;
    /**
     * Budget type with a fixed cost-per-acquisition (conversion).
     * Full details: https://support.google.com/google-ads/answer/7528254
     * This type is only supported by campaigns with
     * AdvertisingChannelType.DISPLAY (excluding
     * AdvertisingChannelSubType.DISPLAY_GMAIL),
     * BiddingStrategyType.TARGET_CPA and PaymentMode.CONVERSIONS.
     *
     * Generated from protobuf enum <code>FIXED_CPA = 4;</code>
     */
    const FIXED_CPA = 4;
    /**
     * Budget type for Smart Campaign.
     * Full details: https://support.google.com/google-ads/answer/7653509
     * This type is only supported by campaigns with
     * AdvertisingChannelType.SMART and
     * AdvertisingChannelSubType.SMART_CAMPAIGN.
     *
     * Generated from protobuf enum <code>SMART_CAMPAIGN = 5;</code>
     */
    const SMART_CAMPAIGN = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::STANDARD => 'STANDARD',
        self::FIXED_CPA => 'FIXED_CPA',
        self::SMART_CAMPAIGN => 'SMART_CAMPAIGN',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BudgetType::class, \Google\Ads\GoogleAds\V9\Enums\BudgetTypeEnum_BudgetType::class);

