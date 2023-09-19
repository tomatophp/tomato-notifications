<?php

namespace TomatoPHP\TomatoNotifications\Services\Notifications\Interfaces;

interface INotification
{
    public function send($event):void;
}
