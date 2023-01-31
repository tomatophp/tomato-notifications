<?php

namespace TomatoPHP\TomatoNotifications\Menus;

use TomatoPHP\TomatoPHP\Services\Menu\Menu;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenu;

class NotificationsMenu extends TomatoMenu
{
    /**
     * @var ?string
     * @example ACL
     */
    public ?string $group = "Notifications";

    /**
     * @var ?string
     * @example dashboard
     */
    public ?string $menu = "dashboard";

    public function __construct()
    {
        $this->group = trans('tomato-notifications::global.group');
    }

    /**
     * @return array
     */
    public static function handler(): array
    {
        return [
            Menu::make()
                ->label(trans('tomato-notifications::global.templates.title'))
                ->icon("bx bxs-notification")
                ->route("admin.notifications-templates.index"),
            Menu::make()
                ->label(trans('tomato-notifications::global.notifications.title'))
                ->icon("bx bxs-bell")
                ->route("admin.user-notifications.index"),
        ];
    }
}
