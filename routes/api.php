<?php


use TomatoPHP\TomatoNotifications\Http\Controllers\API\NotificationsController;


Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('api/notifications')->name('api.notifications.')->group(function () {
        Route::get('/', [NotificationsController::class, 'index'])->name('index');
        Route::post('/clear', [NotificationsController::class, 'clear'])->name('clear');
        Route::delete('/{id}/delete', [NotificationsController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/read', [NotificationsController::class, 'markAsRead'])->name('markAsRead');
        Route::post('/toggle', [NotificationsController::class, 'setting'])->name('setting');
    });
});
