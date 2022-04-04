<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/resources/account_budget.proto

namespace Google\Ads\GoogleAds\V9\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An account-level budget. It contains information about the budget itself,
 * as well as the most recently approved changes to the budget and proposed
 * changes that are pending approval. The proposed changes that are pending
 * approval, if any, are found in 'pending_proposal'.  Effective details about
 * the budget are found in fields prefixed 'approved_', 'adjusted_' and those
 * without a prefix.  Since some effective details may differ from what the user
 * had originally requested (e.g. spending limit), these differences are
 * juxtaposed via 'proposed_', 'approved_', and possibly 'adjusted_' fields.
 * This resource is mutated using AccountBudgetProposal and cannot be mutated
 * directly. A budget may have at most one pending proposal at any given time.
 * It is read through pending_proposal.
 * Once approved, a budget may be subject to adjustments, such as credit
 * adjustments.  Adjustments create differences between the 'approved' and
 * 'adjusted' fields, which would otherwise be identical.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.resources.AccountBudget</code>
 */
class AccountBudget extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the account-level budget.
     * AccountBudget resource names have the form:
     * `customers/{customer_id}/accountBudgets/{account_budget_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the account-level budget.
     *
     * Generated from protobuf field <code>optional int64 id = 23 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $id = null;
    /**
     * Output only. The resource name of the billing setup associated with this account-level
     * budget.  BillingSetup resource names have the form:
     * `customers/{customer_id}/billingSetups/{billing_setup_id}`
     *
     * Generated from protobuf field <code>optional string billing_setup = 24 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $billing_setup = null;
    /**
     * Output only. The status of this account-level budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccountBudgetStatusEnum.AccountBudgetStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;
    /**
     * Output only. The name of the account-level budget.
     *
     * Generated from protobuf field <code>optional string name = 25 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $name = null;
    /**
     * Output only. The proposed start time of the account-level budget in
     * yyyy-MM-dd HH:mm:ss format.  If a start time type of NOW was proposed,
     * this is the time of request.
     *
     * Generated from protobuf field <code>optional string proposed_start_date_time = 26 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $proposed_start_date_time = null;
    /**
     * Output only. The approved start time of the account-level budget in yyyy-MM-dd HH:mm:ss
     * format.
     * For example, if a new budget is approved after the proposed start time,
     * the approved start time is the time of approval.
     *
     * Generated from protobuf field <code>optional string approved_start_date_time = 27 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $approved_start_date_time = null;
    /**
     * Output only. The total adjustments amount.
     * An example of an adjustment is courtesy credits.
     *
     * Generated from protobuf field <code>int64 total_adjustments_micros = 33 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $total_adjustments_micros = 0;
    /**
     * Output only. The value of Ads that have been served, in micros.
     * This includes overdelivery costs, in which case a credit might be
     * automatically applied to the budget (see total_adjustments_micros).
     *
     * Generated from protobuf field <code>int64 amount_served_micros = 34 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $amount_served_micros = 0;
    /**
     * Output only. A purchase order number is a value that helps users reference this budget
     * in their monthly invoices.
     *
     * Generated from protobuf field <code>optional string purchase_order_number = 35 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $purchase_order_number = null;
    /**
     * Output only. Notes associated with the budget.
     *
     * Generated from protobuf field <code>optional string notes = 36 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $notes = null;
    /**
     * Output only. The pending proposal to modify this budget, if applicable.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.AccountBudget.PendingAccountBudgetProposal pending_proposal = 22 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $pending_proposal = null;
    protected $proposed_end_time;
    protected $approved_end_time;
    protected $proposed_spending_limit;
    protected $approved_spending_limit;
    protected $adjusted_spending_limit;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Output only. The resource name of the account-level budget.
     *           AccountBudget resource names have the form:
     *           `customers/{customer_id}/accountBudgets/{account_budget_id}`
     *     @type int|string $id
     *           Output only. The ID of the account-level budget.
     *     @type string $billing_setup
     *           Output only. The resource name of the billing setup associated with this account-level
     *           budget.  BillingSetup resource names have the form:
     *           `customers/{customer_id}/billingSetups/{billing_setup_id}`
     *     @type int $status
     *           Output only. The status of this account-level budget.
     *     @type string $name
     *           Output only. The name of the account-level budget.
     *     @type string $proposed_start_date_time
     *           Output only. The proposed start time of the account-level budget in
     *           yyyy-MM-dd HH:mm:ss format.  If a start time type of NOW was proposed,
     *           this is the time of request.
     *     @type string $approved_start_date_time
     *           Output only. The approved start time of the account-level budget in yyyy-MM-dd HH:mm:ss
     *           format.
     *           For example, if a new budget is approved after the proposed start time,
     *           the approved start time is the time of approval.
     *     @type int|string $total_adjustments_micros
     *           Output only. The total adjustments amount.
     *           An example of an adjustment is courtesy credits.
     *     @type int|string $amount_served_micros
     *           Output only. The value of Ads that have been served, in micros.
     *           This includes overdelivery costs, in which case a credit might be
     *           automatically applied to the budget (see total_adjustments_micros).
     *     @type string $purchase_order_number
     *           Output only. A purchase order number is a value that helps users reference this budget
     *           in their monthly invoices.
     *     @type string $notes
     *           Output only. Notes associated with the budget.
     *     @type \Google\Ads\GoogleAds\V9\Resources\AccountBudget\PendingAccountBudgetProposal $pending_proposal
     *           Output only. The pending proposal to modify this budget, if applicable.
     *     @type string $proposed_end_date_time
     *           Output only. The proposed end time in yyyy-MM-dd HH:mm:ss format.
     *     @type int $proposed_end_time_type
     *           Output only. The proposed end time as a well-defined type, e.g. FOREVER.
     *     @type string $approved_end_date_time
     *           Output only. The approved end time in yyyy-MM-dd HH:mm:ss format.
     *     @type int $approved_end_time_type
     *           Output only. The approved end time as a well-defined type, e.g. FOREVER.
     *     @type int|string $proposed_spending_limit_micros
     *           Output only. The proposed spending limit in micros.  One million is equivalent to
     *           one unit.
     *     @type int $proposed_spending_limit_type
     *           Output only. The proposed spending limit as a well-defined type, e.g. INFINITE.
     *     @type int|string $approved_spending_limit_micros
     *           Output only. The approved spending limit in micros.  One million is equivalent to
     *           one unit.  This will only be populated if the proposed spending limit
     *           is finite, and will always be greater than or equal to the
     *           proposed spending limit.
     *     @type int $approved_spending_limit_type
     *           Output only. The approved spending limit as a well-defined type, e.g. INFINITE.  This
     *           will only be populated if the approved spending limit is INFINITE.
     *     @type int|string $adjusted_spending_limit_micros
     *           Output only. The adjusted spending limit in micros.  One million is equivalent to
     *           one unit.
     *           If the approved spending limit is finite, the adjusted
     *           spending limit may vary depending on the types of adjustments applied
     *           to this budget, if applicable.
     *           The different kinds of adjustments are described here:
     *           https://support.google.com/google-ads/answer/1704323
     *           For example, a debit adjustment reduces how much the account is
     *           allowed to spend.
     *     @type int $adjusted_spending_limit_type
     *           Output only. The adjusted spending limit as a well-defined type, e.g. INFINITE.
     *           This will only be populated if the adjusted spending limit is INFINITE,
     *           which is guaranteed to be true if the approved spending limit is
     *           INFINITE.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Resources\AccountBudget::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the account-level budget.
     * AccountBudget resource names have the form:
     * `customers/{customer_id}/accountBudgets/{account_budget_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Output only. The resource name of the account-level budget.
     * AccountBudget resource names have the form:
     * `customers/{customer_id}/accountBudgets/{account_budget_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
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
     * Output only. The ID of the account-level budget.
     *
     * Generated from protobuf field <code>optional int64 id = 23 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * Output only. The ID of the account-level budget.
     *
     * Generated from protobuf field <code>optional int64 id = 23 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. The resource name of the billing setup associated with this account-level
     * budget.  BillingSetup resource names have the form:
     * `customers/{customer_id}/billingSetups/{billing_setup_id}`
     *
     * Generated from protobuf field <code>optional string billing_setup = 24 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getBillingSetup()
    {
        return isset($this->billing_setup) ? $this->billing_setup : '';
    }

    public function hasBillingSetup()
    {
        return isset($this->billing_setup);
    }

    public function clearBillingSetup()
    {
        unset($this->billing_setup);
    }

    /**
     * Output only. The resource name of the billing setup associated with this account-level
     * budget.  BillingSetup resource names have the form:
     * `customers/{customer_id}/billingSetups/{billing_setup_id}`
     *
     * Generated from protobuf field <code>optional string billing_setup = 24 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setBillingSetup($var)
    {
        GPBUtil::checkString($var, True);
        $this->billing_setup = $var;

        return $this;
    }

    /**
     * Output only. The status of this account-level budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccountBudgetStatusEnum.AccountBudgetStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The status of this account-level budget.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.AccountBudgetStatusEnum.AccountBudgetStatus status = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\AccountBudgetStatusEnum\AccountBudgetStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. The name of the account-level budget.
     *
     * Generated from protobuf field <code>optional string name = 25 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The name of the account-level budget.
     *
     * Generated from protobuf field <code>optional string name = 25 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The proposed start time of the account-level budget in
     * yyyy-MM-dd HH:mm:ss format.  If a start time type of NOW was proposed,
     * this is the time of request.
     *
     * Generated from protobuf field <code>optional string proposed_start_date_time = 26 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getProposedStartDateTime()
    {
        return isset($this->proposed_start_date_time) ? $this->proposed_start_date_time : '';
    }

    public function hasProposedStartDateTime()
    {
        return isset($this->proposed_start_date_time);
    }

    public function clearProposedStartDateTime()
    {
        unset($this->proposed_start_date_time);
    }

    /**
     * Output only. The proposed start time of the account-level budget in
     * yyyy-MM-dd HH:mm:ss format.  If a start time type of NOW was proposed,
     * this is the time of request.
     *
     * Generated from protobuf field <code>optional string proposed_start_date_time = 26 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setProposedStartDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->proposed_start_date_time = $var;

        return $this;
    }

    /**
     * Output only. The approved start time of the account-level budget in yyyy-MM-dd HH:mm:ss
     * format.
     * For example, if a new budget is approved after the proposed start time,
     * the approved start time is the time of approval.
     *
     * Generated from protobuf field <code>optional string approved_start_date_time = 27 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getApprovedStartDateTime()
    {
        return isset($this->approved_start_date_time) ? $this->approved_start_date_time : '';
    }

    public function hasApprovedStartDateTime()
    {
        return isset($this->approved_start_date_time);
    }

    public function clearApprovedStartDateTime()
    {
        unset($this->approved_start_date_time);
    }

    /**
     * Output only. The approved start time of the account-level budget in yyyy-MM-dd HH:mm:ss
     * format.
     * For example, if a new budget is approved after the proposed start time,
     * the approved start time is the time of approval.
     *
     * Generated from protobuf field <code>optional string approved_start_date_time = 27 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setApprovedStartDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->approved_start_date_time = $var;

        return $this;
    }

    /**
     * Output only. The total adjustments amount.
     * An example of an adjustment is courtesy credits.
     *
     * Generated from protobuf field <code>int64 total_adjustments_micros = 33 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getTotalAdjustmentsMicros()
    {
        return $this->total_adjustments_micros;
    }

    /**
     * Output only. The total adjustments amount.
     * An example of an adjustment is courtesy credits.
     *
     * Generated from protobuf field <code>int64 total_adjustments_micros = 33 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setTotalAdjustmentsMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->total_adjustments_micros = $var;

        return $this;
    }

    /**
     * Output only. The value of Ads that have been served, in micros.
     * This includes overdelivery costs, in which case a credit might be
     * automatically applied to the budget (see total_adjustments_micros).
     *
     * Generated from protobuf field <code>int64 amount_served_micros = 34 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getAmountServedMicros()
    {
        return $this->amount_served_micros;
    }

    /**
     * Output only. The value of Ads that have been served, in micros.
     * This includes overdelivery costs, in which case a credit might be
     * automatically applied to the budget (see total_adjustments_micros).
     *
     * Generated from protobuf field <code>int64 amount_served_micros = 34 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setAmountServedMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->amount_served_micros = $var;

        return $this;
    }

    /**
     * Output only. A purchase order number is a value that helps users reference this budget
     * in their monthly invoices.
     *
     * Generated from protobuf field <code>optional string purchase_order_number = 35 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return isset($this->purchase_order_number) ? $this->purchase_order_number : '';
    }

    public function hasPurchaseOrderNumber()
    {
        return isset($this->purchase_order_number);
    }

    public function clearPurchaseOrderNumber()
    {
        unset($this->purchase_order_number);
    }

    /**
     * Output only. A purchase order number is a value that helps users reference this budget
     * in their monthly invoices.
     *
     * Generated from protobuf field <code>optional string purchase_order_number = 35 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setPurchaseOrderNumber($var)
    {
        GPBUtil::checkString($var, True);
        $this->purchase_order_number = $var;

        return $this;
    }

    /**
     * Output only. Notes associated with the budget.
     *
     * Generated from protobuf field <code>optional string notes = 36 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getNotes()
    {
        return isset($this->notes) ? $this->notes : '';
    }

    public function hasNotes()
    {
        return isset($this->notes);
    }

    public function clearNotes()
    {
        unset($this->notes);
    }

    /**
     * Output only. Notes associated with the budget.
     *
     * Generated from protobuf field <code>optional string notes = 36 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setNotes($var)
    {
        GPBUtil::checkString($var, True);
        $this->notes = $var;

        return $this;
    }

    /**
     * Output only. The pending proposal to modify this budget, if applicable.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.AccountBudget.PendingAccountBudgetProposal pending_proposal = 22 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V9\Resources\AccountBudget\PendingAccountBudgetProposal|null
     */
    public function getPendingProposal()
    {
        return $this->pending_proposal;
    }

    public function hasPendingProposal()
    {
        return isset($this->pending_proposal);
    }

    public function clearPendingProposal()
    {
        unset($this->pending_proposal);
    }

    /**
     * Output only. The pending proposal to modify this budget, if applicable.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.resources.AccountBudget.PendingAccountBudgetProposal pending_proposal = 22 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V9\Resources\AccountBudget\PendingAccountBudgetProposal $var
     * @return $this
     */
    public function setPendingProposal($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V9\Resources\AccountBudget\PendingAccountBudgetProposal::class);
        $this->pending_proposal = $var;

        return $this;
    }

    /**
     * Output only. The proposed end time in yyyy-MM-dd HH:mm:ss format.
     *
     * Generated from protobuf field <code>string proposed_end_date_time = 28 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getProposedEndDateTime()
    {
        return $this->readOneof(28);
    }

    public function hasProposedEndDateTime()
    {
        return $this->hasOneof(28);
    }

    /**
     * Output only. The proposed end time in yyyy-MM-dd HH:mm:ss format.
     *
     * Generated from protobuf field <code>string proposed_end_date_time = 28 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setProposedEndDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(28, $var);

        return $this;
    }

    /**
     * Output only. The proposed end time as a well-defined type, e.g. FOREVER.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.TimeTypeEnum.TimeType proposed_end_time_type = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getProposedEndTimeType()
    {
        return $this->readOneof(9);
    }

    public function hasProposedEndTimeType()
    {
        return $this->hasOneof(9);
    }

    /**
     * Output only. The proposed end time as a well-defined type, e.g. FOREVER.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.TimeTypeEnum.TimeType proposed_end_time_type = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setProposedEndTimeType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\TimeTypeEnum\TimeType::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Output only. The approved end time in yyyy-MM-dd HH:mm:ss format.
     *
     * Generated from protobuf field <code>string approved_end_date_time = 29 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getApprovedEndDateTime()
    {
        return $this->readOneof(29);
    }

    public function hasApprovedEndDateTime()
    {
        return $this->hasOneof(29);
    }

    /**
     * Output only. The approved end time in yyyy-MM-dd HH:mm:ss format.
     *
     * Generated from protobuf field <code>string approved_end_date_time = 29 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setApprovedEndDateTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(29, $var);

        return $this;
    }

    /**
     * Output only. The approved end time as a well-defined type, e.g. FOREVER.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.TimeTypeEnum.TimeType approved_end_time_type = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getApprovedEndTimeType()
    {
        return $this->readOneof(11);
    }

    public function hasApprovedEndTimeType()
    {
        return $this->hasOneof(11);
    }

    /**
     * Output only. The approved end time as a well-defined type, e.g. FOREVER.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.TimeTypeEnum.TimeType approved_end_time_type = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setApprovedEndTimeType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\TimeTypeEnum\TimeType::class);
        $this->writeOneof(11, $var);

        return $this;
    }

    /**
     * Output only. The proposed spending limit in micros.  One million is equivalent to
     * one unit.
     *
     * Generated from protobuf field <code>int64 proposed_spending_limit_micros = 30 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getProposedSpendingLimitMicros()
    {
        return $this->readOneof(30);
    }

    public function hasProposedSpendingLimitMicros()
    {
        return $this->hasOneof(30);
    }

    /**
     * Output only. The proposed spending limit in micros.  One million is equivalent to
     * one unit.
     *
     * Generated from protobuf field <code>int64 proposed_spending_limit_micros = 30 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setProposedSpendingLimitMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(30, $var);

        return $this;
    }

    /**
     * Output only. The proposed spending limit as a well-defined type, e.g. INFINITE.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.SpendingLimitTypeEnum.SpendingLimitType proposed_spending_limit_type = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getProposedSpendingLimitType()
    {
        return $this->readOneof(13);
    }

    public function hasProposedSpendingLimitType()
    {
        return $this->hasOneof(13);
    }

    /**
     * Output only. The proposed spending limit as a well-defined type, e.g. INFINITE.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.SpendingLimitTypeEnum.SpendingLimitType proposed_spending_limit_type = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setProposedSpendingLimitType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\SpendingLimitTypeEnum\SpendingLimitType::class);
        $this->writeOneof(13, $var);

        return $this;
    }

    /**
     * Output only. The approved spending limit in micros.  One million is equivalent to
     * one unit.  This will only be populated if the proposed spending limit
     * is finite, and will always be greater than or equal to the
     * proposed spending limit.
     *
     * Generated from protobuf field <code>int64 approved_spending_limit_micros = 31 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getApprovedSpendingLimitMicros()
    {
        return $this->readOneof(31);
    }

    public function hasApprovedSpendingLimitMicros()
    {
        return $this->hasOneof(31);
    }

    /**
     * Output only. The approved spending limit in micros.  One million is equivalent to
     * one unit.  This will only be populated if the proposed spending limit
     * is finite, and will always be greater than or equal to the
     * proposed spending limit.
     *
     * Generated from protobuf field <code>int64 approved_spending_limit_micros = 31 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setApprovedSpendingLimitMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(31, $var);

        return $this;
    }

    /**
     * Output only. The approved spending limit as a well-defined type, e.g. INFINITE.  This
     * will only be populated if the approved spending limit is INFINITE.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.SpendingLimitTypeEnum.SpendingLimitType approved_spending_limit_type = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getApprovedSpendingLimitType()
    {
        return $this->readOneof(15);
    }

    public function hasApprovedSpendingLimitType()
    {
        return $this->hasOneof(15);
    }

    /**
     * Output only. The approved spending limit as a well-defined type, e.g. INFINITE.  This
     * will only be populated if the approved spending limit is INFINITE.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.SpendingLimitTypeEnum.SpendingLimitType approved_spending_limit_type = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setApprovedSpendingLimitType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\SpendingLimitTypeEnum\SpendingLimitType::class);
        $this->writeOneof(15, $var);

        return $this;
    }

    /**
     * Output only. The adjusted spending limit in micros.  One million is equivalent to
     * one unit.
     * If the approved spending limit is finite, the adjusted
     * spending limit may vary depending on the types of adjustments applied
     * to this budget, if applicable.
     * The different kinds of adjustments are described here:
     * https://support.google.com/google-ads/answer/1704323
     * For example, a debit adjustment reduces how much the account is
     * allowed to spend.
     *
     * Generated from protobuf field <code>int64 adjusted_spending_limit_micros = 32 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getAdjustedSpendingLimitMicros()
    {
        return $this->readOneof(32);
    }

    public function hasAdjustedSpendingLimitMicros()
    {
        return $this->hasOneof(32);
    }

    /**
     * Output only. The adjusted spending limit in micros.  One million is equivalent to
     * one unit.
     * If the approved spending limit is finite, the adjusted
     * spending limit may vary depending on the types of adjustments applied
     * to this budget, if applicable.
     * The different kinds of adjustments are described here:
     * https://support.google.com/google-ads/answer/1704323
     * For example, a debit adjustment reduces how much the account is
     * allowed to spend.
     *
     * Generated from protobuf field <code>int64 adjusted_spending_limit_micros = 32 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setAdjustedSpendingLimitMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->writeOneof(32, $var);

        return $this;
    }

    /**
     * Output only. The adjusted spending limit as a well-defined type, e.g. INFINITE.
     * This will only be populated if the adjusted spending limit is INFINITE,
     * which is guaranteed to be true if the approved spending limit is
     * INFINITE.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.SpendingLimitTypeEnum.SpendingLimitType adjusted_spending_limit_type = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getAdjustedSpendingLimitType()
    {
        return $this->readOneof(17);
    }

    public function hasAdjustedSpendingLimitType()
    {
        return $this->hasOneof(17);
    }

    /**
     * Output only. The adjusted spending limit as a well-defined type, e.g. INFINITE.
     * This will only be populated if the adjusted spending limit is INFINITE,
     * which is guaranteed to be true if the approved spending limit is
     * INFINITE.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v9.enums.SpendingLimitTypeEnum.SpendingLimitType adjusted_spending_limit_type = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setAdjustedSpendingLimitType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V9\Enums\SpendingLimitTypeEnum\SpendingLimitType::class);
        $this->writeOneof(17, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getProposedEndTime()
    {
        return $this->whichOneof("proposed_end_time");
    }

    /**
     * @return string
     */
    public function getApprovedEndTime()
    {
        return $this->whichOneof("approved_end_time");
    }

    /**
     * @return string
     */
    public function getProposedSpendingLimit()
    {
        return $this->whichOneof("proposed_spending_limit");
    }

    /**
     * @return string
     */
    public function getApprovedSpendingLimit()
    {
        return $this->whichOneof("approved_spending_limit");
    }

    /**
     * @return string
     */
    public function getAdjustedSpendingLimit()
    {
        return $this->whichOneof("adjusted_spending_limit");
    }

}

