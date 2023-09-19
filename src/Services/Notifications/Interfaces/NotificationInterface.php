<?php

namespace TomatoPHP\TomatoNotifications\Services\Notifications\Interfaces;

interface NotificationInterface
{
    public function send(array $notified, array $replacements = []);
}
