<?php

return [
    /*
    |--------------------------------------------------------------------------
    | AI Provider Configuration
    |--------------------------------------------------------------------------
    */
    'provider' => env('FILAMENT_NL_FILTER_PROVIDER', 'openai'), // 'openai' or 'azure'

    /*
    |--------------------------------------------------------------------------
    | Model Configuration
    |--------------------------------------------------------------------------
    */
    'model' => env('FILAMENT_NL_FILTER_MODEL', 'gpt-3.5-turbo'),

    /*
    |--------------------------------------------------------------------------
    | OpenAI API Configuration  
    |--------------------------------------------------------------------------
    */
    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'organization' => env('OPENAI_ORGANIZATION'),
        'max_tokens' => env('FILAMENT_NL_FILTER_MAX_TOKENS', 500),
        'temperature' => env('FILAMENT_NL_FILTER_TEMPERATURE', 0.1),
    ],

    /*
    |--------------------------------------------------------------------------
    | Azure OpenAI API Configuration  
    |--------------------------------------------------------------------------
    */
    'azure' => [
        'api_key' => env('AZURE_OPENAI_API_KEY'),
        'endpoint' => env('AZURE_OPENAI_ENDPOINT'),
        'api_version' => env('AZURE_OPENAI_API_VERSION', '2024-02-15-preview'),
        'deployment_name' => env('AZURE_OPENAI_DEPLOYMENT_NAME'),
        'max_tokens' => env('FILAMENT_NL_FILTER_MAX_TOKENS', 500),
        'temperature' => env('FILAMENT_NL_FILTER_TEMPERATURE', 0.1),
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    */
    'cache' => [
        'enabled' => env('FILAMENT_NL_FILTER_CACHE_ENABLED', true),
        'ttl' => env('FILAMENT_NL_FILTER_CACHE_TTL', 3600),
        'prefix' => 'filament_nl_filter',
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */
    'validation' => [
        'min_length' => 3,
        'max_length' => 500,
    ],

    /*
    |--------------------------------------------------------------------------
    | Language Support
    |--------------------------------------------------------------------------
    */
    'languages' => [
        'universal_support' => env('FILAMENT_NL_FILTER_UNIVERSAL_SUPPORT', true),
        'auto_detect_direction' => env('FILAMENT_NL_FILTER_AUTO_DETECT_DIRECTION', true),
        'preserve_original_values' => env('FILAMENT_NL_FILTER_PRESERVE_ORIGINAL_VALUES', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Supported Filter Types
    |--------------------------------------------------------------------------
    */
    'supported_filters' => [
        'equals',
        'not_equals',
        'contains',
        'starts_with',
        'ends_with',
        'greater_than',
        'less_than',
        'between',
        'in',
        'not_in',
        'is_null',
        'is_not_null',
        'date_equals',
        'date_before',
        'date_after',
        'date_between',
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    */
    'logging' => [
        'enabled' => env('FILAMENT_NL_FILTER_LOGGING', true),
        'channel' => env('FILAMENT_NL_FILTER_LOG_CHANNEL', 'default'),
        'level' => env('FILAMENT_NL_FILTER_LOG_LEVEL', 'info'),
    ],
];
