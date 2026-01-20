# Project Conventions - Beer & Holding Planner POC

## Livewire Usage

**IMPORTANT: This project uses Livewire 4 with anonymous classes, NOT Volt.**

### What NOT to use:
- ❌ Volt syntax with `use function Livewire\Volt\{layout, title};`
- ❌ Traditional named Livewire classes in separate PHP files

### What to use:
- ✅ Livewire 4 anonymous classes inline in blade files
- ✅ Single file components with PHP class at top and HTML at bottom
- ✅ Use `new #[Layout] #[Title] class extends Component { }`

### Example Structure:

**Correct approach (Livewire 4 anonymous class):**
```php
<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

new
#[Layout('layouts.design-system')]
#[Title('Cards')]
class extends Component {
    public bool $isActive = false;

    public function toggle(): void
    {
        $this->isActive = !$this->isActive;
    }
};
?>

<div>
    <!-- blade content here -->
</div>
```

**Incorrect approach (Volt - DO NOT USE):**
```php
<?php

use function Livewire\Volt\{layout, title};

layout('layouts.design-system');
title('Cards');
?>
<div>
    <!-- content -->
</div>
```

## File Structure

### Livewire Components:
- Component classes: `app/Livewire/Pages/DesignSystem/Cards.php`
- Component views: `resources/views/livewire/pages/design-system/cards.blade.php`

### Blade Components (non-Livewire):
- Component files: `resources/views/components/card.blade.php`
- Subcomponents: `resources/views/components/card/header.blade.php`

## Routing
Use the `Route::livewire()` method with the fully qualified component name:
```php
Route::livewire('/cards', 'pages::design-system.cards')->name('cards');
```

This convention was established by the user and must be followed throughout the project.
