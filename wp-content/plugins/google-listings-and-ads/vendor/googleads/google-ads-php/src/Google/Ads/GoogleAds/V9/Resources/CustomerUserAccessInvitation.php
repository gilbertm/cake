<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/customer_user_access_invitation.proto

namespace Google\Ads\GoogleAds\V9\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represent an invitation to a new user on this customer account.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.CustomerUserAccessInvitation</code>
 */
class CustomerUserAccessInvitation extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Name of the resource.
     * Resource names have the form:
     * `customers/{customer_id}/customerUserAccessInvitations/{invitation_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the invitation.
     * This field is read-only.
     *
     * Generated from protobuf field <code>int64 invitation_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $invitation_id = 0;
    /**
     * Immutable. Access role of the user.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccessRoleEnum.AccessRole access_role = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $access_role = 0;
    /**
     * Immutable. Email address the invitation was sent to.
     * This can differ from the email address of the account
     * that accepts the invite.
     *
     * Generated from protobuf field <code>string email_address = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    protected $email_address = '';
    /**
     * Output only. Time invitation was created.
     * This field is read-only.
     * The format is "YYYY-MM-DD HH:MM:SS".
     * Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *
     * Generated from protobuf field <code>string creation_date_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $creation_date_time = '';
    /**
     * Output only. Invitation status of the user.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccessInvitationStatusEnum.AccessInvitationStatus invitation_status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $invitation_status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. Name of the resource.
     *           Resource names have the form:
     *           `customers/{customer_id}/customerUserAccessInvitations/{invitation_id}`
     *     @type int|string $invitation_id
     *           Output only. The ID of the invitation.
     *           This field is read-only.
     *     @type int $access_role
     *           Immutable. Access role of the user.
     *     @type string $email_address
     *           Immutable. Email address the invitation was sent to.
     *           This can differ from the email address of the account
     *           that accepts the invite.
     *     @type string $creation_date_time
     *           Output only. Time invitation was created.
     *           This field is read-only.
     *           The format is "YYYY-MM-DD HH:MM:SS".
     *           Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *     @type int $invitation_status
     *           Output only. Invitation status of the user.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\CustomerUserAccessInvitation::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Name of the resource.
     * Resource names have the form:
     * `customers/{customer_id}/customerUserAccessInvitations/{invitation_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. Name of the resource.
     * Resource names have the form:
     * `customers/{customer_id}/customerUserAccessInvitations/{invitation_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * Output only. The ID of the invitation.
     * This field is read-only.
     *
     * Generated from protobuf field <code>int64 invitation_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getInvitationId()
    {
        return $this->invitation_id;
    }

    /**
     * Output only. The ID of the invitation.
     * This field is read-only.
     *
     * Generated from protobuf field <code>int64 invitation_id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setInvitationId($var)
    {
        GPBUtil::checkInt64($var);
        $this->invitation_id = $var;

        return $this;
    }

    /**
     * Immutable. Access role of the user.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccessRoleEnum.AccessRole access_role = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getAccessRole()
    {
        return $this->access_role;
    }

    /**
     * Immutable. Access role of the user.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccessRoleEnum.AccessRole access_role = 3 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setAccessRole($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\AccessRoleEnum\AccessRole::class);
        $this->access_role = $var;

        return $this;
    }

    /**
     * Immutable. Email address the invitation was sent to.
     * This can differ from the email address of the account
     * that accepts the invite.
     *
     * Generated from protobuf field <code>string email_address = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Immutable. Email address the invitation was sent to.
     * This can differ from the email address of the account
     * that accepts the invite.
     *
     * Generated from protobuf field <code>string email_address = 4 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setEmailAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->email_address = $var;

        return $this;
    }

    /**
     * Output only. Time invitation was created.
     * This field is read-only.
     * The format is "YYYY-MM-DD HH:MM:SS".
     * Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *
     * Generated from protobuf field <code>string creation_date_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCreationDateTime()
    {
        return $this->creation_date_time;
    }

    /**
     * Output only. Time invitation was created.
     * This field is read-only.
     * The format is "YYYY-MM-DD HH:MM:SS".
     * Examples: "2018-03-05 09:15:00" or "2018-02-01 14:34:30"
     *
     * Generated from protobuf field <code>string creation_date_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCreationDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->creation_date_time = $var;

        return $this;
    }

    /**
     * Output only. Invitation status of the user.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccessInvitationStatusEnum.AccessInvitationStatus invitation_status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getInvitationStatus()
    {
        return $this->invitation_status;
    }

    /**
     * Output only. Invitation status of the user.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccessInvitationStatusEnum.AccessInvitationStatus invitation_status = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setInvitationStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\AccessInvitationStatusEnum\AccessInvitationStatus::class);
        $this->invitation_status = $var;

        return $this;
    }

}

