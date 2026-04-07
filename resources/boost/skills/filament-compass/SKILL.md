---
name: filament-compass
description: Build and work with Filament v5 admin panels, resources, forms, tables, actions, widgets, and Livewire-based CRUD interfaces.
---

# Filament Compass Skill

> On-demand skill for detailed Filament v5 implementation patterns.
> 
> **Prerequisites**: Basic Filament guidelines should already be loaded from GUIDELINES.md.

## Activation Triggers

Activate this skill when:
- Creating or modifying Filament resources, forms, tables, actions
- Planning a Filament application architecture
- Implementing relationships, state transitions, authorization
- Writing tests for Filament components
- User asks "how do I create X in Filament?"
- User mentions: Filament, Laravel admin, CRUD, Resource, Form, Table, Action, Widget, Panel

## Skill Content Location

> **Important**: All paths below are relative to the **project root** (where `vendor/aldesrahim/filament-compass/resources/docs/` is installed as a submodule or directory). Do NOT resolve them relative to this skill file's location.

This skill reads from:
```
<project-root>/vendor/aldesrahim/filament-compass/resources/docs/
├── COMPASS.md           # Main entry - read first
├── packages/              # Component catalogs
├── patterns/              # Implementation patterns
├── testing/               # Testing guides
├── recipes/               # Step-by-step guides
└── reference/             # Quick lookup tables
```

## How to Use This Skill

### Step 1: Read the Compass Entry

Start by reading `vendor/aldesrahim/filament-compass/resources/docs/COMPASS.md` for:
- Quick namespace reference
- Common mistakes
- Structure overview
- Links to detailed documentation

### Step 2: Consult Package Documentation

Based on the task, read from `vendor/aldesrahim/filament-compass/resources/docs/packages/`:

| Task | Read |
|------|------|
| Create Resource | `vendor/aldesrahim/filament-compass/resources/docs/packages/panels/resources.md` |
| Build Form | `vendor/aldesrahim/filament-compass/resources/docs/packages/forms/components.md` |
| Configure Table | `vendor/aldesrahim/filament-compass/resources/docs/packages/tables/columns.md`, `vendor/aldesrahim/filament-compass/resources/docs/packages/tables/filters.md` |
| Add Actions | `vendor/aldesrahim/filament-compass/resources/docs/packages/actions/overview.md`, `vendor/aldesrahim/filament-compass/resources/docs/packages/actions/catalog.md` |
| Layout Components | `vendor/aldesrahim/filament-compass/resources/docs/packages/schemas/layout.md` |
| Read-only Display | `vendor/aldesrahim/filament-compass/resources/docs/packages/infolists/entries.md` |
| Notifications | `vendor/aldesrahim/filament-compass/resources/docs/packages/notifications/overview.md` |

### Step 3: Apply Patterns

Read from `vendor/aldesrahim/filament-compass/resources/docs/patterns/` for implementation patterns:

| Pattern | File |
|---------|------|
| Separated concerns | `vendor/aldesrahim/filament-compass/resources/docs/patterns/separated-concerns.md` |
| Conditional fields | `vendor/aldesrahim/filament-compass/resources/docs/patterns/conditional-fields.md` |
| State transitions | `vendor/aldesrahim/filament-compass/resources/docs/patterns/state-transitions.md` |
| Relationships | `vendor/aldesrahim/filament-compass/resources/docs/patterns/relationships.md` |
| Import/Export | `vendor/aldesrahim/filament-compass/resources/docs/patterns/imports-exports.md` |
| Authorization | `vendor/aldesrahim/filament-compass/resources/docs/patterns/authorization.md` |

### Step 4: Follow Recipes

For step-by-step implementation, read from `vendor/aldesrahim/filament-compass/resources/docs/recipes/`:

- `vendor/aldesrahim/filament-compass/resources/docs/recipes/quick-start.md` - Minimal setup
- `vendor/aldesrahim/filament-compass/resources/docs/recipes/crud-resource.md` - Complete CRUD
- `vendor/aldesrahim/filament-compass/resources/docs/recipes/master-detail.md` - With RelationManagers
- `vendor/aldesrahim/filament-compass/resources/docs/recipes/wizard-form.md` - Multi-step forms
- `vendor/aldesrahim/filament-compass/resources/docs/recipes/dashboard.md` - Custom dashboard
- `vendor/aldesrahim/filament-compass/resources/docs/recipes/custom-page.md` - Custom pages

### Step 5: Reference Tables

Use `vendor/aldesrahim/filament-compass/resources/docs/reference/` for quick lookup:

- `vendor/aldesrahim/filament-compass/resources/docs/reference/namespaces.md` - Import statements
- `vendor/aldesrahim/filament-compass/resources/docs/reference/artisan-commands.md` - CLI commands
- `vendor/aldesrahim/filament-compass/resources/docs/reference/common-mistakes.md` - Pitfalls to avoid
- `vendor/aldesrahim/filament-compass/resources/docs/reference/breaking-changes.md` - v5 migration

## Planning Mode

When asked to plan a Filament application:

1. **Identify entities** → Map to Resources
2. **Identify relationships** → Map to RelationManagers
3. **Identify state flows** → Map to Actions
4. **Identify permissions** → Map to Policies

Then produce:
- Resource definitions
- Form schemas
- Table configurations
- Action definitions
- Authorization rules

Read `vendor/aldesrahim/filament-compass/resources/docs/COMPASS.md` section "Planning a Filament Application" for the complete process.

## Quick Code Patterns

### Resource

```php
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedBolt;
    
    public static function form(Schema $schema): Schema { ... }
    public static function table(Table $table): Table { ... }
    public static function getPages(): array { ... }
}
```

### Form Field

```php
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;

TextInput::make('name')
    ->required()
    ->live(onBlur: true)
    ->afterStateUpdated(fn (Set $set, $state) => $set('slug', Str::slug($state)))
```

### Table Column

```php
use Filament\Tables\Columns\TextColumn;

TextColumn::make('name')
    ->searchable()
    ->sortable()
    ->weight(FontWeight::Medium)
```

### Action

```php
use Filament\Actions\Action;

Action::make('approve')
    ->icon(Heroicon::Check)
    ->color('success')
    ->action(fn (Order $record) => $record->update(['status' => 'approved']))
```

### Conditional Visibility

```php
use Filament\Schemas\Components\Utilities\Get;

TextInput::make('company_name')
    ->visible(fn (Get $get): bool => $get('type') === 'business')
```

## Testing Patterns

Read `vendor/aldesrahim/filament-compass/resources/docs/testing/overview.md`, `vendor/aldesrahim/filament-compass/resources/docs/testing/resources.md`, `vendor/aldesrahim/filament-compass/resources/docs/testing/actions.md`, `vendor/aldesrahim/filament-compass/resources/docs/testing/tables.md` for:

```php
// List page test
livewire(ListProducts::class)
    ->assertCanSeeTableRecords($products)
    ->searchTable('name');

// Create test
livewire(CreateProduct::class)
    ->fillForm(['name' => 'Test'])
    ->call('create')
    ->assertNotified();

// Action test
livewire(ListProducts::class)
    ->callTableAction(DeleteAction::class, $product);
```

## Version Info

- Filament: v5
- Laravel: v12
- Livewire: v4

## Do NOT

- Do NOT provide Filament help without reading the compass first
- Do NOT use incorrect namespaces (check `reference/namespaces.md`)
- Do NOT use string icons - use `Heroicon` enum
- Do NOT forget `visibility('public')` for file uploads
- Do NOT forget `->columnSpan()` for Grid/Section components