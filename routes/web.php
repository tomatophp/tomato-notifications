<?php


use TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsController;

Route::middleware(['web', 'splade', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/settings/notifications', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsSettingsController::class, 'index'])->name('settings.notifications.index');
    Route::post('/settings/notifications', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsSettingsController::class, 'store'])->name('settings.notifications.store');
});

Route::middleware([
    'web',
    'splade',
    'verified'
])->name('admin.')->group(function () {
    Route::get('admin/notifications', [NotificationsController::class, 'index'])->name('admin.notifications.index');
    Route::delete('admin/notifications/clear', [NotificationsController::class, 'clearUser'])->name('notifications.clear');
});

Route::post('token', [NotificationsController::class, 'token'])->name('admin.notifications.token');


Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/user-notifications', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'index'])->name('user-notifications.index');
    Route::get('admin/user-notifications/api', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'api'])->name('user-notifications.api');
    Route::get('admin/user-notifications/get/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'get'])->name('user-notifications.get');
    Route::get('admin/user-notifications/create', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'create'])->name('user-notifications.create');
    Route::post('admin/user-notifications', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'store'])->name('user-notifications.store');
    Route::get('admin/user-notifications/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'show'])->name('user-notifications.show');
    Route::get('admin/user-notifications/{model}/resend', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'resend'])->name('user-notifications.resend');
    Route::delete('admin/user-notifications/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\UserNotificationController::class, 'destroy'])->name('user-notifications.destroy');
});

Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/notifications-templates', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'index'])->name('notifications-templates.index');
    Route::get('admin/notifications-templates/api', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'api'])->name('notifications-templates.api');
    Route::get('admin/notifications-templates/create', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'create'])->name('notifications-templates.create');
    Route::post('admin/notifications-templates', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'store'])->name('notifications-templates.store');
    Route::get('admin/notifications-templates/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'show'])->name('notifications-templates.show');
    Route::get('admin/notifications-templates/{template}/send', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'send'])->name('notifications-templates.send');
    Route::get('admin/notifications-templates/{model}/edit', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'edit'])->name('notifications-templates.edit');
    Route::post('admin/notifications-templates/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'update'])->name('notifications-templates.update');
    Route::delete('admin/notifications-templates/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsTemplateController::class, 'destroy'])->name('notifications-templates.destroy');
});

Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/notifications-logs', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'index'])->name('notifications-logs.index');
    Route::get('admin/notifications-logs/api', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'api'])->name('notifications-logs.api');
    Route::get('admin/notifications-logs/create', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'create'])->name('notifications-logs.create');
    Route::post('admin/notifications-logs', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'store'])->name('notifications-logs.store');
    Route::get('admin/notifications-logs/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'show'])->name('notifications-logs.show');
    Route::get('admin/notifications-logs/{model}/edit', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'edit'])->name('notifications-logs.edit');
    Route::post('admin/notifications-logs/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'update'])->name('notifications-logs.update');
    Route::delete('admin/notifications-logs/{model}', [\TomatoPHP\TomatoNotifications\Http\Controllers\NotificationsLogController::class, 'destroy'])->name('notifications-logs.destroy');
});
