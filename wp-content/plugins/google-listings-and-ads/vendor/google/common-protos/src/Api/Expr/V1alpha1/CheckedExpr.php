<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/expr/v1alpha1/checked.proto

namespace Google\Api\Expr\V1alpha1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A CEL expression which has been successfully type checked.
 *
 * Generated from protobuf message <code>google.api.expr.v1alpha1.CheckedExpr</code>
 */
class CheckedExpr extends \Google\Protobuf\Internal\Message
{
    /**
     * A map from expression ids to resolved references.
     * The following entries are in this table:
     * - An Ident or Select expression is represented here if it resolves to a
     *   declaration. For instance, if `a.b.c` is represented by
     *   `select(select(id(a), b), c)`, and `a.b` resolves to a declaration,
     *   while `c` is a field selection, then the reference is attached to the
     *   nested select expression (but not to the id or or the outer select).
     *   In turn, if `a` resolves to a declaration and `b.c` are field selections,
     *   the reference is attached to the ident expression.
     * - Every Call expression has an entry here, identifying the function being
     *   called.
     * - Every CreateStruct expression for a message has an entry, identifying
     *   the message.
     *
     * Generated from protobuf field <code>map<int64, .google.api.expr.v1alpha1.Reference> reference_map = 2;</code>
     */
    private $reference_map;
    /**
     * A map from expression ids to types.
     * Every expression node which has a type different than DYN has a mapping
     * here. If an expression has type DYN, it is omitted from this map to save
     * space.
     *
     * Generated from protobuf field <code>map<int64, .google.api.expr.v1alpha1.Type> type_map = 3;</code>
     */
    private $type_map;
    /**
     * The source info derived from input that generated the parsed `expr` and
     * any optimizations made during the type-checking pass.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.SourceInfo source_info = 5;</code>
     */
    private $source_info = null;
    /**
     * The checked expression. Semantically equivalent to the parsed `expr`, but
     * may have structural differences.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Expr expr = 4;</code>
     */
    private $expr = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array|\Google\Protobuf\Internal\MapField $reference_map
     *           A map from expression ids to resolved references.
     *           The following entries are in this table:
     *           - An Ident or Select expression is represented here if it resolves to a
     *             declaration. For instance, if `a.b.c` is represented by
     *             `select(select(id(a), b), c)`, and `a.b` resolves to a declaration,
     *             while `c` is a field selection, then the reference is attached to the
     *             nested select expression (but not to the id or or the outer select).
     *             In turn, if `a` resolves to a declaration and `b.c` are field selections,
     *             the reference is attached to the ident expression.
     *           - Every Call expression has an entry here, identifying the function being
     *             called.
     *           - Every CreateStruct expression for a message has an entry, identifying
     *             the message.
     *     @type array|\Google\Protobuf\Internal\MapField $type_map
     *           A map from expression ids to types.
     *           Every expression node which has a type different than DYN has a mapping
     *           here. If an expression has type DYN, it is omitted from this map to save
     *           space.
     *     @type \Google\Api\Expr\V1alpha1\SourceInfo $source_info
     *           The source info derived from input that generated the parsed `expr` and
     *           any optimizations made during the type-checking pass.
     *     @type \Google\Api\Expr\V1alpha1\Expr $expr
     *           The checked expression. Semantically equivalent to the parsed `expr`, but
     *           may have structural differences.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Api\Expr\V1Alpha1\Checked::initOnce();
        parent::__construct($data);
    }

    /**
     * A map from expression ids to resolved references.
     * The following entries are in this table:
     * - An Ident or Select expression is represented here if it resolves to a
     *   declaration. For instance, if `a.b.c` is represented by
     *   `select(select(id(a), b), c)`, and `a.b` resolves to a declaration,
     *   while `c` is a field selection, then the reference is attached to the
     *   nested select expression (but not to the id or or the outer select).
     *   In turn, if `a` resolves to a declaration and `b.c` are field selections,
     *   the reference is attached to the ident expression.
     * - Every Call expression has an entry here, identifying the function being
     *   called.
     * - Every CreateStruct expression for a message has an entry, identifying
     *   the message.
     *
     * Generated from protobuf field <code>map<int64, .google.api.expr.v1alpha1.Reference> reference_map = 2;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getReferenceMap()
    {
        return $this->reference_map;
    }

    /**
     * A map from expression ids to resolved references.
     * The following entries are in this table:
     * - An Ident or Select expression is represented here if it resolves to a
     *   declaration. For instance, if `a.b.c` is represented by
     *   `select(select(id(a), b), c)`, and `a.b` resolves to a declaration,
     *   while `c` is a field selection, then the reference is attached to the
     *   nested select expression (but not to the id or or the outer select).
     *   In turn, if `a` resolves to a declaration and `b.c` are field selections,
     *   the reference is attached to the ident expression.
     * - Every Call expression has an entry here, identifying the function being
     *   called.
     * - Every CreateStruct expression for a message has an entry, identifying
     *   the message.
     *
     * Generated from protobuf field <code>map<int64, .google.api.expr.v1alpha1.Reference> reference_map = 2;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setReferenceMap($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::INT64, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Api\Expr\V1alpha1\Reference::class);
        $this->reference_map = $arr;

        return $this;
    }

    /**
     * A map from expression ids to types.
     * Every expression node which has a type different than DYN has a mapping
     * here. If an expression has type DYN, it is omitted from this map to save
     * space.
     *
     * Generated from protobuf field <code>map<int64, .google.api.expr.v1alpha1.Type> type_map = 3;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getTypeMap()
    {
        return $this->type_map;
    }

    /**
     * A map from expression ids to types.
     * Every expression node which has a type different than DYN has a mapping
     * here. If an expression has type DYN, it is omitted from this map to save
     * space.
     *
     * Generated from protobuf field <code>map<int64, .google.api.expr.v1alpha1.Type> type_map = 3;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setTypeMap($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::INT64, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Api\Expr\V1alpha1\Type::class);
        $this->type_map = $arr;

        return $this;
    }

    /**
     * The source info derived from input that generated the parsed `expr` and
     * any optimizations made during the type-checking pass.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.SourceInfo source_info = 5;</code>
     * @return \Google\Api\Expr\V1alpha1\SourceInfo
     */
    public function getSourceInfo()
    {
        return $this->source_info;
    }

    /**
     * The source info derived from input that generated the parsed `expr` and
     * any optimizations made during the type-checking pass.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.SourceInfo source_info = 5;</code>
     * @param \Google\Api\Expr\V1alpha1\SourceInfo $var
     * @return $this
     */
    public function setSourceInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Api\Expr\V1alpha1\SourceInfo::class);
        $this->source_info = $var;

        return $this;
    }

    /**
     * The checked expression. Semantically equivalent to the parsed `expr`, but
     * may have structural differences.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Expr expr = 4;</code>
     * @return \Google\Api\Expr\V1alpha1\Expr
     */
    public function getExpr()
    {
        return $this->expr;
    }

    /**
     * The checked expression. Semantically equivalent to the parsed `expr`, but
     * may have structural differences.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Expr expr = 4;</code>
     * @param \Google\Api\Expr\V1alpha1\Expr $var
     * @return $this
     */
    public function setExpr($var)
    {
        GPBUtil::checkMessage($var, \Google\Api\Expr\V1alpha1\Expr::class);
        $this->expr = $var;

        return $this;
    }

}

