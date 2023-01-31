<?php

namespace TomatoPHP\TomatoNotifications\Services\Actions;

use TomatoPHP\TomatoNotifications\Jobs\NotificationJop;

trait SendToJob
{
    /**
     * @return void
     * Use To send the notification to the job
     */
    public function sendToJob():void
    {
        foreach ($this->providers as $provider) {
            if(is_array($provider)){
                $provider = $provider['id'];
            }
            $arrgs = [
                "title" => $this->title,
                "message" => $this->message,
                "icon" => $this->icon,
                "image" => $this->image,
                "url" => $this->url,
                "type" => $this->type,
                "privacy" => $this->privacy,
                "provider" => $provider,
                "model" => $this->model,
                "model_id" => $this->user->id
            ];

            if (!empty($this->template)) {
                $collectRoles = [];
                foreach ($this->templateModel->roles as $role) {
                    $collectRoles[] = $role->id;
                }
                if (count($collectRoles)) {
                    if ($this->user->hasRole($collectRoles)) {
                        NotificationJop::dispatch($arrgs);
                    }
                } else {
                    NotificationJop::dispatch($arrgs);
                }
            } else {
                NotificationJop::dispatch($arrgs);
            }
        }
    }
}
