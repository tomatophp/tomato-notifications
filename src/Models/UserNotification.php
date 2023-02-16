<?php

namespace TomatoPHP\TomatoNotifications\Models;

use Eloquent as Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class UserNotification extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $table = 'user_notifications';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $datas = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'data'=>'array'
    ];
    public $fillable = [
        'id',
        'created_by',
        'model_type',
        'model_id',
        'title',
        'url',
        'icon',
        'description',
        'type',
        'privacy',
        'template_id',
        'data'
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function template()
    {
        return $this->hasOne(NotificationsTemplate::class, 'id', 'id');
    }
}
