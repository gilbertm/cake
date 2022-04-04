<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/enums/hotel_price_bucket.proto

namespace Google\Ads\GoogleAds\V9\Enums\HotelPriceBucketEnum;

use UnexpectedValueException;

/**
 * Enum describing possible hotel price buckets.
 *
 * Protobuf type <code>google.ads.googleads.v9.enums.HotelPriceBucketEnum.HotelPriceBucket</code>
 */
class HotelPriceBucket
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The value is unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Uniquely lowest price. Partner has the lowest price, and no other
     * partners are within a small variance of that price.
     *
     * Generated from protobuf enum <code>LOWEST_UNIQUE = 2;</code>
     */
    const LOWEST_UNIQUE = 2;
    /**
     * Tied for lowest price. Partner is within a small variance of the lowest
     * price.
     *
     * Generated from protobuf enum <code>LOWEST_TIED = 3;</code>
     */
    const LOWEST_TIED = 3;
    /**
     * Not lowest price. Partner is not within a small variance of the lowest
     * price.
     *
     * Generated from protobuf enum <code>NOT_LOWEST = 4;</code>
     */
    const NOT_LOWEST = 4;
    /**
     * Partner was the only one shown.
     *
     * Generated from protobuf enum <code>ONLY_PARTNER_SHOWN = 5;</code>
     */
    const ONLY_PARTNER_SHOWN = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::LOWEST_UNIQUE => 'LOWEST_UNIQUE',
        self::LOWEST_TIED => 'LOWEST_TIED',
        self::NOT_LOWEST => 'NOT_LOWEST',
        self::ONLY_PARTNER_SHOWN => 'ONLY_PARTNER_SHOWN',
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
class_alias(HotelPriceBucket::class, \Google\Ads\GoogleAds\V9\Enums\HotelPriceBucketEnum_HotelPriceBucket::class);

