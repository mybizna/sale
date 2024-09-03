<?php

namespace Modules\Sale\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class SalePlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Sale';
    }

    public function getId(): string
    {
        return 'sale';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
