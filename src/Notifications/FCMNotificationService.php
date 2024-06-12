<?php

namespace TomatoPHP\TomatoNotifications\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Support\Facades\File;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\WebpushFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;

class FCMNotificationService extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public string $message,
        public ?string $type='web',
        public ?string $title=null,
        public ?string $icon=null,
        public ?string $image=null,
        public ?string $url=null,
        public ?array $data=[],
    )
    {}

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via(mixed $notifiable): array
    {
        return [FcmChannel::class];
    }

    public function toFcm($notifiable): FcmMessage
    {
        return (
        new FcmMessage(
            notification: new FcmNotification(
                    title: $this->title,
                    body: $this->message,
                    image: $this->image ?? null
                ),
                data: [
                    'title' => $this->title,
                    'message' => $this->message,
                    'icon' => $this->icon,
                    'url' => $this->url,
                    'image' => $this->image,
                    'type' => $this->type,
                    'privacy' => $this->privacy,
                    'model' => (string)$this->model,
                    'model_id' => (string)$this->modelId,
                    'data' =>  $this->data??"" ,
                ],
                custom: [
                    'android' => [
                        'notification' => [
                            'color' => '#0A0A0A',
                        ],
                        'fcm_options' => [
                            'analytics_label' => 'analytics',
                        ],
                    ],
                    'apns' => [
                        'fcm_options' => [
                            'analytics_label' => 'analytics',
                        ],
                    ],
                ]
            )
        );
    }
}
