<?php

namespace EdrisaTuray\FilamentNaturalLanguageFilter\Services;

use EdrisaTuray\FilamentNaturalLanguageFilter\Contracts\NaturalLanguageProcessorInterface;
use EdrisaTuray\FilamentNaturalLanguageFilter\Services\NaturalLanguageProcessor;
use EdrisaTuray\FilamentNaturalLanguageFilter\Services\AzureOpenAIProcessor;
use Illuminate\Support\Facades\Log;

class ProcessorFactory
{
    public static function create(): NaturalLanguageProcessorInterface
    {
        $provider = config('filament-natural-language-filter.provider', 'openai');

        switch ($provider) {
            case 'azure':
                return new AzureOpenAIProcessor();
            
            case 'openai':
            default:
                return new NaturalLanguageProcessor();
        }
    }

    public static function createWithProvider(string $provider): NaturalLanguageProcessorInterface
    {
        switch ($provider) {
            case 'azure':
                return new AzureOpenAIProcessor();
            
            case 'openai':
            default:
                return new NaturalLanguageProcessor();
        }
    }

    public static function getAvailableProviders(): array
    {
        return ['openai', 'azure'];
    }

    public static function isProviderSupported(string $provider): bool
    {
        return in_array($provider, self::getAvailableProviders());
    }
}
