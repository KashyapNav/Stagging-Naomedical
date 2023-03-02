<?php

namespace DeliciousBrains\WP_Offload_Media\Aws3;

// This file was auto-generated from sdk-root/src/data/marketplacecommerceanalytics/2015-07-01/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2015-07-01', 'endpointPrefix' => 'marketplacecommerceanalytics', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'AWS Marketplace Commerce Analytics', 'serviceId' => 'Marketplace Commerce Analytics', 'signatureVersion' => 'v4', 'signingName' => 'marketplacecommerceanalytics', 'targetPrefix' => 'MarketplaceCommerceAnalytics20150701', 'uid' => 'marketplacecommerceanalytics-2015-07-01'], 'operations' => ['GenerateDataSet' => ['name' => 'GenerateDataSet', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'GenerateDataSetRequest'], 'output' => ['shape' => 'GenerateDataSetResult'], 'errors' => [['shape' => 'MarketplaceCommerceAnalyticsException']]], 'StartSupportDataExport' => ['name' => 'StartSupportDataExport', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'StartSupportDataExportRequest'], 'output' => ['shape' => 'StartSupportDataExportResult'], 'errors' => [['shape' => 'MarketplaceCommerceAnalyticsException']]]], 'shapes' => ['CustomerDefinedValues' => ['type' => 'map', 'key' => ['shape' => 'OptionalKey'], 'value' => ['shape' => 'OptionalValue'], 'max' => 5, 'min' => 1], 'DataSetPublicationDate' => ['type' => 'timestamp'], 'DataSetRequestId' => ['type' => 'string'], 'DataSetType' => ['type' => 'string', 'enum' => ['customer_subscriber_hourly_monthly_subscriptions', 'customer_subscriber_annual_subscriptions', 'daily_business_usage_by_instance_type', 'daily_business_fees', 'daily_business_free_trial_conversions', 'daily_business_new_instances', 'daily_business_new_product_subscribers', 'daily_business_canceled_product_subscribers', 'monthly_revenue_billing_and_revenue_data', 'monthly_revenue_annual_subscriptions', 'monthly_revenue_field_demonstration_usage', 'monthly_revenue_flexible_payment_schedule', 'disbursed_amount_by_product', 'disbursed_amount_by_product_with_uncollected_funds', 'disbursed_amount_by_instance_hours', 'disbursed_amount_by_customer_geo', 'disbursed_amount_by_age_of_uncollected_funds', 'disbursed_amount_by_age_of_disbursed_funds', 'disbursed_amount_by_age_of_past_due_funds', 'disbursed_amount_by_uncollected_funds_breakdown', 'customer_profile_by_industry', 'customer_profile_by_revenue', 'customer_profile_by_geography', 'sales_compensation_billed_revenue', 'us_sales_and_use_tax_records'], 'max' => 255, 'min' => 1], 'DestinationS3BucketName' => ['type' => 'string', 'min' => 1], 'DestinationS3Prefix' => ['type' => 'string'], 'ExceptionMessage' => ['type' => 'string'], 'FromDate' => ['type' => 'timestamp'], 'GenerateDataSetRequest' => ['type' => 'structure', 'required' => ['dataSetType', 'dataSetPublicationDate', 'roleNameArn', 'destinationS3BucketName', 'snsTopicArn'], 'members' => ['dataSetType' => ['shape' => 'DataSetType'], 'dataSetPublicationDate' => ['shape' => 'DataSetPublicationDate'], 'roleNameArn' => ['shape' => 'RoleNameArn'], 'destinationS3BucketName' => ['shape' => 'DestinationS3BucketName'], 'destinationS3Prefix' => ['shape' => 'DestinationS3Prefix'], 'snsTopicArn' => ['shape' => 'SnsTopicArn'], 'customerDefinedValues' => ['shape' => 'CustomerDefinedValues']]], 'GenerateDataSetResult' => ['type' => 'structure', 'members' => ['dataSetRequestId' => ['shape' => 'DataSetRequestId']]], 'MarketplaceCommerceAnalyticsException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ExceptionMessage']], 'exception' => \true, 'fault' => \true], 'OptionalKey' => ['type' => 'string', 'max' => 255, 'min' => 1], 'OptionalValue' => ['type' => 'string', 'max' => 255, 'min' => 1], 'RoleNameArn' => ['type' => 'string', 'min' => 1], 'SnsTopicArn' => ['type' => 'string', 'min' => 1], 'StartSupportDataExportRequest' => ['type' => 'structure', 'required' => ['dataSetType', 'fromDate', 'roleNameArn', 'destinationS3BucketName', 'snsTopicArn'], 'members' => ['dataSetType' => ['shape' => 'SupportDataSetType'], 'fromDate' => ['shape' => 'FromDate'], 'roleNameArn' => ['shape' => 'RoleNameArn'], 'destinationS3BucketName' => ['shape' => 'DestinationS3BucketName'], 'destinationS3Prefix' => ['shape' => 'DestinationS3Prefix'], 'snsTopicArn' => ['shape' => 'SnsTopicArn'], 'customerDefinedValues' => ['shape' => 'CustomerDefinedValues']]], 'StartSupportDataExportResult' => ['type' => 'structure', 'members' => ['dataSetRequestId' => ['shape' => 'DataSetRequestId']]], 'SupportDataSetType' => ['type' => 'string', 'enum' => ['customer_support_contacts_data', 'test_customer_support_contacts_data'], 'max' => 255, 'min' => 1]]];
