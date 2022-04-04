<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/protobuf/descriptor.proto

namespace GPBMetadata\Google\Protobuf\Internal;

class Descriptor
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->addMessage('google.protobuf.internal.FileDescriptorSet', \Google\Protobuf\Internal\FileDescriptorSet::class)
            ->repeated('file', \Google\Protobuf\Internal\GPBType::MESSAGE, 1, 'google.protobuf.internal.FileDescriptorProto')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.FileDescriptorProto', \Google\Protobuf\Internal\FileDescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->optional('package', \Google\Protobuf\Internal\GPBType::STRING, 2)
            ->repeated('dependency', \Google\Protobuf\Internal\GPBType::STRING, 3)
            ->repeated('public_dependency', \Google\Protobuf\Internal\GPBType::INT32, 10)
            ->repeated('weak_dependency', \Google\Protobuf\Internal\GPBType::INT32, 11)
            ->repeated('message_type', \Google\Protobuf\Internal\GPBType::MESSAGE, 4, 'google.protobuf.internal.DescriptorProto')
            ->repeated('enum_type', \Google\Protobuf\Internal\GPBType::MESSAGE, 5, 'google.protobuf.internal.EnumDescriptorProto')
            ->repeated('service', \Google\Protobuf\Internal\GPBType::MESSAGE, 6, 'google.protobuf.internal.ServiceDescriptorProto')
            ->repeated('extension', \Google\Protobuf\Internal\GPBType::MESSAGE, 7, 'google.protobuf.internal.FieldDescriptorProto')
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 8, 'google.protobuf.internal.FileOptions')
            ->optional('source_code_info', \Google\Protobuf\Internal\GPBType::MESSAGE, 9, 'google.protobuf.internal.SourceCodeInfo')
            ->optional('syntax', \Google\Protobuf\Internal\GPBType::STRING, 12)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.DescriptorProto', \Google\Protobuf\Internal\DescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->repeated('field', \Google\Protobuf\Internal\GPBType::MESSAGE, 2, 'google.protobuf.internal.FieldDescriptorProto')
            ->repeated('extension', \Google\Protobuf\Internal\GPBType::MESSAGE, 6, 'google.protobuf.internal.FieldDescriptorProto')
            ->repeated('nested_type', \Google\Protobuf\Internal\GPBType::MESSAGE, 3, 'google.protobuf.internal.DescriptorProto')
            ->repeated('enum_type', \Google\Protobuf\Internal\GPBType::MESSAGE, 4, 'google.protobuf.internal.EnumDescriptorProto')
            ->repeated('extension_range', \Google\Protobuf\Internal\GPBType::MESSAGE, 5, 'google.protobuf.internal.DescriptorProto.ExtensionRange')
            ->repeated('oneof_decl', \Google\Protobuf\Internal\GPBType::MESSAGE, 8, 'google.protobuf.internal.OneofDescriptorProto')
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 7, 'google.protobuf.internal.MessageOptions')
            ->repeated('reserved_range', \Google\Protobuf\Internal\GPBType::MESSAGE, 9, 'google.protobuf.internal.DescriptorProto.ReservedRange')
            ->repeated('reserved_name', \Google\Protobuf\Internal\GPBType::STRING, 10)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.DescriptorProto.ExtensionRange', \Google\Protobuf\Internal\DescriptorProto\ExtensionRange::class)
            ->optional('start', \Google\Protobuf\Internal\GPBType::INT32, 1)
            ->optional('end', \Google\Protobuf\Internal\GPBType::INT32, 2)
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 3, 'google.protobuf.internal.ExtensionRangeOptions')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.DescriptorProto.ReservedRange', \Google\Protobuf\Internal\DescriptorProto\ReservedRange::class)
            ->optional('start', \Google\Protobuf\Internal\GPBType::INT32, 1)
            ->optional('end', \Google\Protobuf\Internal\GPBType::INT32, 2)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.ExtensionRangeOptions', \Google\Protobuf\Internal\ExtensionRangeOptions::class)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.FieldDescriptorProto', \Google\Protobuf\Internal\FieldDescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->optional('number', \Google\Protobuf\Internal\GPBType::INT32, 3)
            ->optional('label', \Google\Protobuf\Internal\GPBType::ENUM, 4, 'google.protobuf.internal.FieldDescriptorProto.Label')
            ->optional('type', \Google\Protobuf\Internal\GPBType::ENUM, 5, 'google.protobuf.internal.FieldDescriptorProto.Type')
            ->optional('type_name', \Google\Protobuf\Internal\GPBType::STRING, 6)
            ->optional('extendee', \Google\Protobuf\Internal\GPBType::STRING, 2)
            ->optional('default_value', \Google\Protobuf\Internal\GPBType::STRING, 7)
            ->optional('oneof_index', \Google\Protobuf\Internal\GPBType::INT32, 9)
            ->optional('json_name', \Google\Protobuf\Internal\GPBType::STRING, 10)
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 8, 'google.protobuf.internal.FieldOptions')
            ->optional('proto3_optional', \Google\Protobuf\Internal\GPBType::BOOL, 17)
            ->finalizeToPool();

        $pool->addEnum('google.protobuf.internal.FieldDescriptorProto.Type', \Google\Protobuf\Internal\Type::class)
            ->value("TYPE_DOUBLE", 1)
            ->value("TYPE_FLOAT", 2)
            ->value("TYPE_INT64", 3)
            ->value("TYPE_UINT64", 4)
            ->value("TYPE_INT32", 5)
            ->value("TYPE_FIXED64", 6)
            ->value("TYPE_FIXED32", 7)
            ->value("TYPE_BOOL", 8)
            ->value("TYPE_STRING", 9)
            ->value("TYPE_GROUP", 10)
            ->value("TYPE_MESSAGE", 11)
            ->value("TYPE_BYTES", 12)
            ->value("TYPE_UINT32", 13)
            ->value("TYPE_ENUM", 14)
            ->value("TYPE_SFIXED32", 15)
            ->value("TYPE_SFIXED64", 16)
            ->value("TYPE_SINT32", 17)
            ->value("TYPE_SINT64", 18)
            ->finalizeToPool();

        $pool->addEnum('google.protobuf.internal.FieldDescriptorProto.Label', \Google\Protobuf\Internal\Label::class)
            ->value("LABEL_OPTIONAL", 1)
            ->value("LABEL_REQUIRED", 2)
            ->value("LABEL_REPEATED", 3)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.OneofDescriptorProto', \Google\Protobuf\Internal\OneofDescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 2, 'google.protobuf.internal.OneofOptions')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.EnumDescriptorProto', \Google\Protobuf\Internal\EnumDescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->repeated('value', \Google\Protobuf\Internal\GPBType::MESSAGE, 2, 'google.protobuf.internal.EnumValueDescriptorProto')
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 3, 'google.protobuf.internal.EnumOptions')
            ->repeated('reserved_range', \Google\Protobuf\Internal\GPBType::MESSAGE, 4, 'google.protobuf.internal.EnumDescriptorProto.EnumReservedRange')
            ->repeated('reserved_name', \Google\Protobuf\Internal\GPBType::STRING, 5)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.EnumDescriptorProto.EnumReservedRange', \Google\Protobuf\Internal\EnumDescriptorProto\EnumReservedRange::class)
            ->optional('start', \Google\Protobuf\Internal\GPBType::INT32, 1)
            ->optional('end', \Google\Protobuf\Internal\GPBType::INT32, 2)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.EnumValueDescriptorProto', \Google\Protobuf\Internal\EnumValueDescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->optional('number', \Google\Protobuf\Internal\GPBType::INT32, 2)
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 3, 'google.protobuf.internal.EnumValueOptions')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.ServiceDescriptorProto', \Google\Protobuf\Internal\ServiceDescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->repeated('method', \Google\Protobuf\Internal\GPBType::MESSAGE, 2, 'google.protobuf.internal.MethodDescriptorProto')
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 3, 'google.protobuf.internal.ServiceOptions')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.MethodDescriptorProto', \Google\Protobuf\Internal\MethodDescriptorProto::class)
            ->optional('name', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->optional('input_type', \Google\Protobuf\Internal\GPBType::STRING, 2)
            ->optional('output_type', \Google\Protobuf\Internal\GPBType::STRING, 3)
            ->optional('options', \Google\Protobuf\Internal\GPBType::MESSAGE, 4, 'google.protobuf.internal.MethodOptions')
            ->optional('client_streaming', \Google\Protobuf\Internal\GPBType::BOOL, 5)
            ->optional('server_streaming', \Google\Protobuf\Internal\GPBType::BOOL, 6)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.FileOptions', \Google\Protobuf\Internal\FileOptions::class)
            ->optional('java_package', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->optional('java_outer_classname', \Google\Protobuf\Internal\GPBType::STRING, 8)
            ->optional('java_multiple_files', \Google\Protobuf\Internal\GPBType::BOOL, 10)
            ->optional('java_generate_equals_and_hash', \Google\Protobuf\Internal\GPBType::BOOL, 20)
            ->optional('java_string_check_utf8', \Google\Protobuf\Internal\GPBType::BOOL, 27)
            ->optional('optimize_for', \Google\Protobuf\Internal\GPBType::ENUM, 9, 'google.protobuf.internal.FileOptions.OptimizeMode')
            ->optional('go_package', \Google\Protobuf\Internal\GPBType::STRING, 11)
            ->optional('cc_generic_services', \Google\Protobuf\Internal\GPBType::BOOL, 16)
            ->optional('java_generic_services', \Google\Protobuf\Internal\GPBType::BOOL, 17)
            ->optional('py_generic_services', \Google\Protobuf\Internal\GPBType::BOOL, 18)
            ->optional('php_generic_services', \Google\Protobuf\Internal\GPBType::BOOL, 42)
            ->optional('deprecated', \Google\Protobuf\Internal\GPBType::BOOL, 23)
            ->optional('cc_enable_arenas', \Google\Protobuf\Internal\GPBType::BOOL, 31)
            ->optional('objc_class_prefix', \Google\Protobuf\Internal\GPBType::STRING, 36)
            ->optional('csharp_namespace', \Google\Protobuf\Internal\GPBType::STRING, 37)
            ->optional('swift_prefix', \Google\Protobuf\Internal\GPBType::STRING, 39)
            ->optional('php_class_prefix', \Google\Protobuf\Internal\GPBType::STRING, 40)
            ->optional('php_namespace', \Google\Protobuf\Internal\GPBType::STRING, 41)
            ->optional('php_metadata_namespace', \Google\Protobuf\Internal\GPBType::STRING, 44)
            ->optional('ruby_package', \Google\Protobuf\Internal\GPBType::STRING, 45)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addEnum('google.protobuf.internal.FileOptions.OptimizeMode', \Google\Protobuf\Internal\OptimizeMode::class)
            ->value("SPEED", 1)
            ->value("CODE_SIZE", 2)
            ->value("LITE_RUNTIME", 3)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.MessageOptions', \Google\Protobuf\Internal\MessageOptions::class)
            ->optional('message_set_wire_format', \Google\Protobuf\Internal\GPBType::BOOL, 1)
            ->optional('no_standard_descriptor_accessor', \Google\Protobuf\Internal\GPBType::BOOL, 2)
            ->optional('deprecated', \Google\Protobuf\Internal\GPBType::BOOL, 3)
            ->optional('map_entry', \Google\Protobuf\Internal\GPBType::BOOL, 7)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.FieldOptions', \Google\Protobuf\Internal\FieldOptions::class)
            ->optional('ctype', \Google\Protobuf\Internal\GPBType::ENUM, 1, 'google.protobuf.internal.FieldOptions.CType')
            ->optional('packed', \Google\Protobuf\Internal\GPBType::BOOL, 2)
            ->optional('jstype', \Google\Protobuf\Internal\GPBType::ENUM, 6, 'google.protobuf.internal.FieldOptions.JSType')
            ->optional('lazy', \Google\Protobuf\Internal\GPBType::BOOL, 5)
            ->optional('deprecated', \Google\Protobuf\Internal\GPBType::BOOL, 3)
            ->optional('weak', \Google\Protobuf\Internal\GPBType::BOOL, 10)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addEnum('google.protobuf.internal.FieldOptions.CType', \Google\Protobuf\Internal\CType::class)
            ->value("STRING", 0)
            ->value("CORD", 1)
            ->value("STRING_PIECE", 2)
            ->finalizeToPool();

        $pool->addEnum('google.protobuf.internal.FieldOptions.JSType', \Google\Protobuf\Internal\JSType::class)
            ->value("JS_NORMAL", 0)
            ->value("JS_STRING", 1)
            ->value("JS_NUMBER", 2)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.OneofOptions', \Google\Protobuf\Internal\OneofOptions::class)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.EnumOptions', \Google\Protobuf\Internal\EnumOptions::class)
            ->optional('allow_alias', \Google\Protobuf\Internal\GPBType::BOOL, 2)
            ->optional('deprecated', \Google\Protobuf\Internal\GPBType::BOOL, 3)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.EnumValueOptions', \Google\Protobuf\Internal\EnumValueOptions::class)
            ->optional('deprecated', \Google\Protobuf\Internal\GPBType::BOOL, 1)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.ServiceOptions', \Google\Protobuf\Internal\ServiceOptions::class)
            ->optional('deprecated', \Google\Protobuf\Internal\GPBType::BOOL, 33)
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.MethodOptions', \Google\Protobuf\Internal\MethodOptions::class)
            ->optional('deprecated', \Google\Protobuf\Internal\GPBType::BOOL, 33)
            ->optional('idempotency_level', \Google\Protobuf\Internal\GPBType::ENUM, 34, 'google.protobuf.internal.MethodOptions.IdempotencyLevel')
            ->repeated('uninterpreted_option', \Google\Protobuf\Internal\GPBType::MESSAGE, 999, 'google.protobuf.internal.UninterpretedOption')
            ->finalizeToPool();

        $pool->addEnum('google.protobuf.internal.MethodOptions.IdempotencyLevel', \Google\Protobuf\Internal\IdempotencyLevel::class)
            ->value("IDEMPOTENCY_UNKNOWN", 0)
            ->value("NO_SIDE_EFFECTS", 1)
            ->value("IDEMPOTENT", 2)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.UninterpretedOption', \Google\Protobuf\Internal\UninterpretedOption::class)
            ->repeated('name', \Google\Protobuf\Internal\GPBType::MESSAGE, 2, 'google.protobuf.internal.UninterpretedOption.NamePart')
            ->optional('identifier_value', \Google\Protobuf\Internal\GPBType::STRING, 3)
            ->optional('positive_int_value', \Google\Protobuf\Internal\GPBType::UINT64, 4)
            ->optional('negative_int_value', \Google\Protobuf\Internal\GPBType::INT64, 5)
            ->optional('double_value', \Google\Protobuf\Internal\GPBType::DOUBLE, 6)
            ->optional('string_value', \Google\Protobuf\Internal\GPBType::BYTES, 7)
            ->optional('aggregate_value', \Google\Protobuf\Internal\GPBType::STRING, 8)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.UninterpretedOption.NamePart', \Google\Protobuf\Internal\UninterpretedOption\NamePart::class)
            ->required('name_part', \Google\Protobuf\Internal\GPBType::STRING, 1)
            ->required('is_extension', \Google\Protobuf\Internal\GPBType::BOOL, 2)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.SourceCodeInfo', \Google\Protobuf\Internal\SourceCodeInfo::class)
            ->repeated('location', \Google\Protobuf\Internal\GPBType::MESSAGE, 1, 'google.protobuf.internal.SourceCodeInfo.Location')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.SourceCodeInfo.Location', \Google\Protobuf\Internal\SourceCodeInfo\Location::class)
            ->repeated('path', \Google\Protobuf\Internal\GPBType::INT32, 1)
            ->repeated('span', \Google\Protobuf\Internal\GPBType::INT32, 2)
            ->optional('leading_comments', \Google\Protobuf\Internal\GPBType::STRING, 3)
            ->optional('trailing_comments', \Google\Protobuf\Internal\GPBType::STRING, 4)
            ->repeated('leading_detached_comments', \Google\Protobuf\Internal\GPBType::STRING, 6)
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.GeneratedCodeInfo', \Google\Protobuf\Internal\GeneratedCodeInfo::class)
            ->repeated('annotation', \Google\Protobuf\Internal\GPBType::MESSAGE, 1, 'google.protobuf.internal.GeneratedCodeInfo.Annotation')
            ->finalizeToPool();

        $pool->addMessage('google.protobuf.internal.GeneratedCodeInfo.Annotation', \Google\Protobuf\Internal\GeneratedCodeInfo\Annotation::class)
            ->repeated('path', \Google\Protobuf\Internal\GPBType::INT32, 1)
            ->optional('source_file', \Google\Protobuf\Internal\GPBType::STRING, 2)
            ->optional('begin', \Google\Protobuf\Internal\GPBType::INT32, 3)
            ->optional('end', \Google\Protobuf\Internal\GPBType::INT32, 4)
            ->finalizeToPool();

        $pool->finish();
        static::$is_initialized = true;
    }
}

