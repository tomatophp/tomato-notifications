<?php

namespace TomatoPHP\TomatoNotifications;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;
use TomatoPHP\TomatoNotifications\Console\TomatoNotificationsInstall;
use TomatoPHP\TomatoNotifications\Menus\NotificationsMenu;
use TomatoPHP\TomatoRoles\Services\Permission;
use TomatoPHP\TomatoRoles\Services\TomatoRoles;


class TomatoNotificationsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        //Register Config file
        $this->mergeConfigFrom(__DIR__ . '/../config/tomato-notifications.php', 'tomato-notifications');

        //Register views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tomato-notifications');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'tomato-notifications');

        //Register Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        //Publish Views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tomato-notifications'),
        ], 'tomato-notifications-views');

        //Publish Config
        $this->publishes([
            __DIR__ . '/../config/tomato-notifications.php' => config_path('tomato-notifications.php'),
        ], 'tomato-notifications-config');

        //Publish Lang
        $this->publishes([
            __DIR__ . '/../resources/lang' => base_path('lang/vendor/tomato-notifications'),
        ], 'tomato-notifications-lang');

        //Publish Migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'tomato-notifications-migrations');

        //Register install command
        $this->commands([
            TomatoNotificationsInstall::class
        ]);

        $this->registerPermissions();
    }

    public function boot(): void
    {
        //Add Middleware Global to Routes web
        TomatoMenu::register([
            Menu::make()
                ->group(trans('tomato-notifications::global.group'))
                ->label(trans('tomato-notifications::global.notifications.title'))
                ->icon("bx bxs-bell")
                ->route("admin.user-notifications.index"),
            Menu::make()
                ->group(trans('tomato-notifications::global.group'))
                ->label(trans('tomato-notifications::global.templates.title'))
                ->icon("bx bxs-notification")
                ->route("admin.notifications-templates.index"),

        ]);

        $this->registerConfig();

    }

    /**
     * @return void
     */
    public function registerPermissions(): void
    {
        if(class_exists(TomatoRoles::class)){
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

    public function registerConfig(){
        try {
            Config::set('firebase.projects.app', [
                'credentials' => env('FIREBASE_CREDENTIALS', Str::of(setting('google_firebase_cr'))->replace('https://tomato.test/storage/settings/', base_path('/public/storage/settings/'))->toString()),
                'database' => [
                    'url' => env('FIREBASE_DATABASE_URL', setting('google_firebase_database_url')),
                ]
            ]);
        }
        catch (\Exception $e){
            \Log::error($e);
        }
    }
}
