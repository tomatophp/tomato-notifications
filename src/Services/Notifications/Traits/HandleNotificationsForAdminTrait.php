<?php
namespace TomatoPHP\TomatoNotifications\Services\Notifications\Traits;

use Illuminate\Support\Facades\App;
use Modules\Accounts\Entities\Account;
use TomatoPHP\TomatoNotifications\Models\NotificationsTemplate;
use TomatoPHP\TomatoNotifications\Services\SendNotification;

trait HandleNotificationsForAdminTrait
{
    public function sendNotification($ids, $template, $body = [], $bodyKeys = [], $title = [],$data)
    {
        $templateModel = NotificationsTemplate::where('key', $template)->first();


        foreach ($ids as $id) {
            $lang='ar';
            SendNotification::make($templateModel->providers)
                ->template($template)
                ->templateModel($templateModel)
                ->findBody($bodyKeys ?? '')
                ->replaceBody($translated ?? '')
                ->model(User::class)
                ->id($id)
                ->url("khaleds")
                ->data(json_encode($data))
                ->privacy('private')
                ->database(true)
                ->icon("bx bxs-circle")
                ->lang($lang)
                    ->fire();

        }
    }
}
