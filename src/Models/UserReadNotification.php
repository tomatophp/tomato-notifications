<?php

namespace TomatoPHP\TomatoNotifications\Models;

use Illuminate\Database\Eloquent\Model;

class UserReadNotification extends Model
{
    protected $table = 'user_read_notifications';

    protected $fillable = [
        'user_notification_id',
        'model_type',
        'model_id',
    ];

    public function userNotification()
    {
        return $this->belongsTo(UserNotification::class, 'user_notification_id');
    }

    public function model()
    {
        return $this->morphTo();
    }
}
