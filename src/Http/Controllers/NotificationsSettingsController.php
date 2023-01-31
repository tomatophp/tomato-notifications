<?php

namespace TomatoPHP\TomatoNotifications\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use TomatoPHP\TomatoNotifications\Http\Requests\Settings\NotificationsSettingsRequest;
use TomatoPHP\TomatoNotifications\Settings\NotificationsSettings;
use TomatoPHP\TomatoSettings\Services\Setting;

class NotificationsSettingsController extends Setting
{
    public string $setting = NotificationsSettings::class;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return $this->get(request: $request, view:'tomato-notifications::settings.notifications');
    }

    /**
     * @param NotificationsSettingsRequest $request
     * @return RedirectResponse
     */
    public function store(NotificationsSettingsRequest $request): RedirectResponse
    {
        return $this->save(request: $request, redirect: "admin.settings.notifications.index", media:[]);
    }
}
