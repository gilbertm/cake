<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/enums/location_group_radius_units.proto

namespace Google\Ads\GoogleAds\V9\Enums\LocationGroupRadiusUnitsEnum;

use UnexpectedValueException;

/**
 * The unit of radius distance in location group (e.g. MILES)
 *
 * Protobuf type <code>google.ads.googleads.v9.enums.LocationGroupRadiusUnitsEnum.LocationGroupRadiusUnits</code>
 */
class LocationGroupRadiusUnits
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
     * Meters
     *
     * Generated from protobuf enum <code>METERS = 2;</code>
     */
    const METERS = 2;
    /**
     * Miles
     *
     * Generated from protobuf enum <code>MILES = 3;</code>
     */
    const MILES = 3;
    /**
     * Milli Miles
     *
     * Generated from protobuf enum <code>MILLI_MILES = 4;</code>
     */
    const MILLI_MILES = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::METERS => 'METERS',
        self::MILES => 'MILES',
        self::MILLI_MILES => 'MILLI_MILES',
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
class_alias(LocationGroupRadiusUnits::class, \Google\Ads\GoogleAds\V9\Enums\LocationGroupRadiusUnitsEnum_LocationGroupRadiusUnits::class);

