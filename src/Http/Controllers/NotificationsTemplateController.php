<?php

namespace TomatoPHP\TomatoNotifications\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoNotifications\Http\Requests\NotificationsTemplate\NotificationsTemplateStoreRequest;
use TomatoPHP\TomatoNotifications\Http\Requests\NotificationsTemplate\NotificationsTemplateUpdateRequest;
use TomatoPHP\TomatoNotifications\Models\NotificationsTemplate;
use TomatoPHP\TomatoNotifications\Services\SendNotification;
use TomatoPHP\TomatoNotifications\Tables\NotificationsTemplateTable;
use TomatoPHP\TomatoPHP\Services\Tomato;

class NotificationsTemplateController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            view: 'tomato-notifications::notifications-templates.index',
            table: NotificationsTemplateTable::class,
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: NotificationsTemplate::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-notifications::notifications-templates.create',
        );
    }

    /**
     * @param NotificationsTemplateStoreRequest $request
     * @return RedirectResponse
     */
    public function store(NotificationsTemplateStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: NotificationsTemplate::class,
            message: 'NotificationsTemplate created successfully',
            redirect: 'admin.notifications-templates.index',
            hasMedia: true,
            collection: 'image',
        );

        return $response['redirect'];
    }

    /**
     * @param NotificationsTemplate $model
     * @return View
     */
    public function show(NotificationsTemplate $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-notifications::notifications-templates.show',
            hasMedia: true,
            collection: 'image',
        );
    }

    /**
     * @param NotificationsTemplate $model
     * @return View
     */
    public function edit(NotificationsTemplate $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-notifications::notifications-templates.edit',
            hasMedia: true,
            collection: 'image',
        );
    }

    /**
     * @param NotificationsTemplateUpdateRequest $request
     * @param NotificationsTemplate $model
     * @return RedirectResponse
     */
    public function update(NotificationsTemplateUpdateRequest $request, NotificationsTemplate $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: 'NotificationsTemplate updated successfully',
            redirect: 'admin.notifications-templates.index',
            hasMedia: true,
            collection: 'image',
        );

        return $response['redirect'];
    }

    /**
     * @param NotificationsTemplate $model
     * @return RedirectResponse
     */
    public function destroy(NotificationsTemplate $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: 'NotificationsTemplate deleted successfully',
            redirect: 'admin.notifications-templates.index',
        );
    }

    /**
     * @param NotificationsTemplate $template
     * @return RedirectResponse
     */
    public function send(NotificationsTemplate $template): RedirectResponse
    {
        $matchesTitle = array();
        preg_match('/{.*?}/', $template->title, $matchesTitle);
        $titleFill = [];
        foreach ($matchesTitle as $titleItem) {
            $titleFill[] = "test-title";
        }
        $matchesBody = array();
        preg_match('/{.*?}/', $template->body, $matchesBody);
        $titleBody = [];
        foreach ($matchesBody as $bodyItem) {
            $titleBody[] = "test-body";
        }

        SendNotification::make($template->providers)
            ->template($template->key)
            ->findTitle($matchesTitle)
            ->replaceTitle($titleFill)
            ->findBody($matchesBody)
            ->replaceBody($titleBody)
            ->model(User::class)
            ->id(User::first()->id)
            ->privacy('private')
            ->fire();

        Toast::title(trans('tomato-notifications::global.templates.send_message'))->success()->autoDismiss(2);
        return back();
    }
}
