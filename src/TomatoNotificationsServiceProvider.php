<?php

namespace TomatoPHP\TomatoNotifications;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoNotifications\Console\TomatoNotificationsInstall;
use TomatoPHP\TomatoNotifications\Menus\NotificationsMenu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;
use TomatoPHP\TomatoRoles\Services\Permission;
use TomatoPHP\TomatoRoles\Services\TomatoRoles;

class TomatoNotificationsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-notifications.php', 'tomato-notifications');

        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-notifications');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-notifications');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

          //Publish Views
          $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-notifications'),
        ], 'tomato-notifications-views');

        //Publish Config
        $this->publishes([
            __DIR__.'/../config/tomato-notifications.php' => config_path('tomato-notifications.php'),
        ], 'tomato-notifications-config');

        //Publish Lang
        $this->publishes([
            __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-notifications'),
        ], 'tomato-notifications-lang');

        //Publish Migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-notifications-migrations');

        //Register install command
        $this->commands([
            TomatoNotificationsInstall::class
        ]);

        TomatoMenuRegister::registerMenu(NotificationsMenu::class);

        $this->registerPermissions();
    }

    public function boot(): void
    {
        //Add Middleware Global to Routes web
    }

    /**
     * @return void
     */
    public function registerPermissions(): void
    {
        //Register Permission For Settings
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.notifications.index')
            ->guard('web')
            ->group('settings')
        );
        TomatoRoles::register(Permission::make()
            ->name('admin.settings.notifications.store')
            ->guard('web')
            ->group('settings')
        );
    }
}