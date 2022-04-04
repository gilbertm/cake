<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/enums/user_identifier_source.proto

namespace Google\Ads\GoogleAds\V9\Enums\UserIdentifierSourceEnum;

use UnexpectedValueException;

/**
 * The type of user identifier source for offline Store Sales, click
 * conversion, and conversion adjustment uploads.
 *
 * Protobuf type <code>google.ads.googleads.v9.enums.UserIdentifierSourceEnum.UserIdentifierSource</code>
 */
class UserIdentifierSource
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Indicates that the user identifier was provided by the first party
     * (advertiser).
     *
     * Generated from protobuf enum <code>FIRST_PARTY = 2;</code>
     */
    const FIRST_PARTY = 2;
    /**
     * Indicates that the user identifier was provided by the third party
     * (partner).
     *
     * Generated from protobuf enum <code>THIRD_PARTY = 3;</code>
     */
    const THIRD_PARTY = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::FIRST_PARTY => 'FIRST_PARTY',
        self::THIRD_PARTY => 'THIRD_PARTY',
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
class_alias(UserIdentifierSource::class, \Google\Ads\GoogleAds\V9\Enums\UserIdentifierSourceEnum_UserIdentifierSource::class);

