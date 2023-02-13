<?php

namespace TomatoPHP\TomatoNotifications\Services;

use TomatoPHP\TomatoNotifications\Models\NotificationsTemplate;
use TomatoPHP\TomatoNotifications\Models\UserNotification;
use TomatoPHP\TomatoNotifications\Jobs\NotificationJop;
use TomatoPHP\TomatoNotifications\Services\Actions\FireEvent;
use TomatoPHP\TomatoNotifications\Services\Actions\LoadTemplate;
use TomatoPHP\TomatoNotifications\Services\Actions\SendToDatabase;
use TomatoPHP\TomatoNotifications\Services\Actions\SendToJob;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasCreatedBy;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasData;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasFindBody;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasFindTitle;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasIcon;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasId;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasImage;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasLang;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasMessage;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasModel;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasPrivacy;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasProviders;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasReplaceBody;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasReplaceTitle;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasTemplate;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasTemplateModel;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasTitle;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasType;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasUrl;
use TomatoPHP\TomatoNotifications\Services\Concerns\HasUser;
use TomatoPHP\TomatoNotifications\Services\Concerns\IsDatabase;

class SendNotification
{
    use HasTitle;
    use HasMessage;
    use HasType;
    use HasProviders;
    use HasPrivacy;
    use HasUrl;
    use HasImage;
    use HasIcon;
    use HasModel;
    use HasTemplate;
    use HasFindTitle;
    use HasFindBody;
    use HasReplaceTitle;
    use HasReplaceBody;
    use HasId;
    use HasCreatedBy;
    use HasUser;
    use HasLang;
    use HasTemplateModel;
    use IsDatabase;

    /*
     * Actions
     */
    use FireEvent;
    use LoadTemplate;
    use SendToDatabase;
    use SendToJob;
    use HasData;
    /**
     * @param ?array $providers
     * @return static
     */
    public static function make(?array $providers): static
    {
        return (new static)->providers($providers);
    }
}
