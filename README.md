# Filament Natural Language Filter

A simple Filament filter that converts natural language text into database queries using AI.

## Installation

```bash
composer require edrisaturay/filament-natural-language-filter
```

## Configuration

1. Publish the config file:
```bash
php artisan vendor:publish --tag="filament-natural-language-filter-config"
```

2. Add your OpenAI API key to your `.env` file:
```env
OPENAI_API_KEY=your-openai-api-key-here
```

## Usage

Add the filter to your Filament table:

```php
use EdrisaTuray\FilamentNaturalLanguageFilter\Filters\NaturalLanguageFilter;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // your columns
        ])
        ->filters([
            NaturalLanguageFilter::make()
                ->availableColumns([
                    'id',
                    'name', 
                    'email',
                    'status',
                    'created_at',
                    'updated_at'
                ])
        ]);
}
```

### Search Modes

You can configure how the filter triggers searches:

#### Submit Mode (Default) - Search on Enter key
```php
NaturalLanguageFilter::make()
    ->availableColumns(['name', 'email', 'status'])
    ->submitSearch() // Users press Enter to search
```

#### Live Mode - Search as you type
```php
NaturalLanguageFilter::make()
    ->availableColumns(['name', 'email', 'status'])
    ->liveSearch() // Search happens automatically as user types
```

#### Manual Mode Configuration
```php
NaturalLanguageFilter::make()
    ->availableColumns(['name', 'email', 'status'])
    ->searchMode('live') // or 'submit'
```

### When to Use Each Mode

**Submit Mode (Default)** - Best for:
- Large datasets where live search might be slow
- Complex queries that users want to perfect before searching
- Reducing API calls to OpenAI (only search when user is ready)

**Live Mode** - Best for:
- Instant feedback and better user experience  
- Smaller datasets where performance isn't a concern
- Users who prefer immediate results as they type

## How it works

1. **User enters natural language**: "show users named john created after 2023"
2. **AI processes the text**: Converts it to structured filters based on your available columns
3. **Database query is built**: `WHERE name LIKE '%john%' AND created_at > '2023-01-01'`
4. **Results are filtered**: Table shows matching records

## Examples

- "users named john" → `WHERE name LIKE '%john%'`
- "active users" → `WHERE status = 'active'`
- "created after 2023" → `WHERE created_at > '2023-01-01'`
- "email contains gmail" → `WHERE email LIKE '%gmail%'`

## Universal Language Support 🌍

The filter supports **ANY language** with automatic AI translation and understanding:

### Multi-Language Examples

**English:**
- "show users named john" → `WHERE name LIKE '%john%'`
- "created after 2023" → `WHERE created_at > '2023-01-01'`

**Arabic (العربية):**
- "الاسم يحتوي على أحمد" → `WHERE name LIKE '%أحمد%'`
- "أنشئ بعد 2023" → `WHERE created_at > '2023-01-01'`

**Spanish (Español):**
- "usuarios con nombre juan" → `WHERE name LIKE '%juan%'`
- "creado después de 2023" → `WHERE created_at > '2023-01-01'`

**French (Français):**
- "nom contient marie" → `WHERE name LIKE '%marie%'`
- "créé après 2023" → `WHERE created_at > '2023-01-01'`

**German (Deutsch):**
- "benutzer mit namen hans" → `WHERE name LIKE '%hans%'`
- "erstellt nach 2023" → `WHERE created_at > '2023-01-01'`

**Chinese (中文):**
- "姓名包含张三" → `WHERE name LIKE '%张三%'`
- "2023年后创建" → `WHERE created_at > '2023-01-01'`

**Japanese (日本語):**
- "田中という名前のユーザー" → `WHERE name LIKE '%田中%'`
- "2023年以降に作成" → `WHERE created_at > '2023-01-01'`

### How It Works

1. **AI Language Detection**: Automatically detects the input language
2. **Natural Understanding**: Maps language-specific keywords to operators
3. **Value Preservation**: Keeps original values in their native language/script
4. **Mixed Language**: Handles mixed-language queries seamlessly

### Mixed Language Queries

The AI can handle mixed-language queries naturally:
- "name يحتوي على john" ✅
- "usuario con email gmail.com" ✅  
- "姓名 contains 张三" ✅

## Configuration Options

```php
// config/filament-natural-language-filter.php
return [
    'model' => 'gpt-3.5-turbo', // OpenAI model
    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'max_tokens' => 500,
        'temperature' => 0.1,
    ],
    'cache' => [
        'enabled' => true,
        'ttl' => 3600, // 1 hour
    ],
    'languages' => [
        'universal_support' => true,
        'auto_detect_direction' => true,
        'preserve_original_values' => true,
    ],
];
```

### Environment Variables

```env
OPENAI_API_KEY=your-openai-api-key-here
FILAMENT_NL_FILTER_UNIVERSAL_SUPPORT=true
FILAMENT_NL_FILTER_AUTO_DETECT_DIRECTION=true
FILAMENT_NL_FILTER_PRESERVE_ORIGINAL_VALUES=true
```

## Requirements

- PHP 8.1+
- Laravel 10+
- Filament 3+
- OpenAI API key

## License

MIT 
