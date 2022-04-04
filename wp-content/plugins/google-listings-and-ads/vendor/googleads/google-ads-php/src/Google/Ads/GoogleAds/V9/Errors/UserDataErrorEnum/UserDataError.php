<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/errors/user_data_error.proto

namespace Google\Ads\GoogleAds\V9\Errors\UserDataErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible request errors.
 *
 * Protobuf type <code>google.ads.googleads.v9.errors.UserDataErrorEnum.UserDataError</code>
 */
class UserDataError
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
     * Customer is not allowed to perform operations related to Customer Match.
     *
     * Generated from protobuf enum <code>OPERATIONS_FOR_CUSTOMER_MATCH_NOT_ALLOWED = 2;</code>
     */
    const OPERATIONS_FOR_CUSTOMER_MATCH_NOT_ALLOWED = 2;
    /**
     * Maximum number of user identifiers allowed for each mutate is 100.
     *
     * Generated from protobuf enum <code>TOO_MANY_USER_IDENTIFIERS = 3;</code>
     */
    const TOO_MANY_USER_IDENTIFIERS = 3;
    /**
     * Current user list is not applicable for the given customer.
     *
     * Generated from protobuf enum <code>USER_LIST_NOT_APPLICABLE = 4;</code>
     */
    const USER_LIST_NOT_APPLICABLE = 4;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::OPERATIONS_FOR_CUSTOMER_MATCH_NOT_ALLOWED => 'OPERATIONS_FOR_CUSTOMER_MATCH_NOT_ALLOWED',
        self::TOO_MANY_USER_IDENTIFIERS => 'TOO_MANY_USER_IDENTIFIERS',
        self::USER_LIST_NOT_APPLICABLE => 'USER_LIST_NOT_APPLICABLE',
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
class_alias(UserDataError::class, \Google\Ads\GoogleAds\V9\Errors\UserDataErrorEnum_UserDataError::class);

