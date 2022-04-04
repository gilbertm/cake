<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/errors/customer_user_access_error.proto

namespace Google\Ads\GoogleAds\V9\Errors\CustomerUserAccessErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible customer user access errors.
 *
 * Protobuf type <code>google.ads.googleads.v9.errors.CustomerUserAccessErrorEnum.CustomerUserAccessError</code>
 */
class CustomerUserAccessError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * There is no user associated with the user id specified.
     *
     * Generated from protobuf enum <code>INVALID_USER_ID = 2;</code>
     */
    const INVALID_USER_ID = 2;
    /**
     * Unable to remove the access between the user and customer.
     *
     * Generated from protobuf enum <code>REMOVAL_DISALLOWED = 3;</code>
     */
    const REMOVAL_DISALLOWED = 3;
    /**
     * Unable to add or update the access role as specified.
     *
     * Generated from protobuf enum <code>DISALLOWED_ACCESS_ROLE = 4;</code>
     */
    const DISALLOWED_ACCESS_ROLE = 4;
    /**
     * The user can't remove itself from an active serving customer if it's the
     * last admin user and the customer doesn't have any owner manager
     *
     * Generated from protobuf enum <code>LAST_ADMIN_USER_OF_SERVING_CUSTOMER = 5;</code>
     */
    const LAST_ADMIN_USER_OF_SERVING_CUSTOMER = 5;
    /**
     * Last admin user cannot be removed from a manager.
     *
     * Generated from protobuf enum <code>LAST_ADMIN_USER_OF_MANAGER = 6;</code>
     */
    const LAST_ADMIN_USER_OF_MANAGER = 6;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::INVALID_USER_ID => 'INVALID_USER_ID',
        self::REMOVAL_DISALLOWED => 'REMOVAL_DISALLOWED',
        self::DISALLOWED_ACCESS_ROLE => 'DISALLOWED_ACCESS_ROLE',
        self::LAST_ADMIN_USER_OF_SERVING_CUSTOMER => 'LAST_ADMIN_USER_OF_SERVING_CUSTOMER',
        self::LAST_ADMIN_USER_OF_MANAGER => 'LAST_ADMIN_USER_OF_MANAGER',
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
class_alias(CustomerUserAccessError::class, \Google\Ads\GoogleAds\V9\Errors\CustomerUserAccessErrorEnum_CustomerUserAccessError::class);

