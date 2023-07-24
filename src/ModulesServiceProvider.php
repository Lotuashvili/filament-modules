<?php

namespace Coolsam\FilamentModules;

use Filament\Facades\Filament;
use Filament\FilamentManager;
use Filament\FilamentServiceProvider;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Providers\Filament\AdminPanelProvider;
use Coolsam\FilamentModules\Commands\ModuleMakePanelCommand;
use Coolsam\FilamentModules\Extensions\LaravelModulesServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ModulesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('modules')
            ->hasConfigFile('modules')
            ->hasViews()
            ->hasCommands([
                ModuleMakePanelCommand::class,
            ]);
    }
    public function register()
    {
        $this->app->register(LaravelModulesServiceProvider::class);
        return parent::register();
    }
}
