<?php

use App\Http\Controllers\Api\Admin\AdminApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Users\UserDataController;
use App\Http\Controllers\Api\Admin\AdminDataController;
use App\Http\Controllers\Api\Tickets\TicketDataController;
use App\Http\Controllers\Api\Types\TypeDataController;
use App\Http\Controllers\Api\Tickets\AssignedTicketDataController;
use App\Http\Controllers\Api\Comments\CommentDataController;
use App\Http\Controllers\Api\Events\EventHistoryDataController;
use App\Http\Controllers\Api\Tickets\TicketApiController;
use App\Http\Controllers\Api\Types\TypeApiController;
use App\Http\Controllers\Api\Users\UserApiController;
use App\Http\Controllers\Api\Auth\ApiLoginController;
use App\Http\Controllers\Api\Notifications\UserNotificationController;
use App\Http\Controllers\Api\Notifications\AdminApiNotificationController;

Route::prefix('admin')->group(function () {
    // Rutas públicas
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [ApiLoginController::class, 'login']);


    Route::middleware('auth:api')->get('/test', function (Request $request) {
        return response()->json([
            'auth_user' => $request->user(),
        ]);
    });


    // Rutas protegidas con Passport
    Route::middleware('auth:api')->group(function () {
        Route::get('/users', [UserDataController::class, 'indexUsers']);
        Route::post('/users/store', [UserApiController::class, 'storeUser']);
        Route::put('/users/{user}', [UserApiController::class, 'updateUser']);
        Route::delete('/users/{user}', [UserApiController::class, 'destroyUser']);


        Route::get('/admins', [AdminDataController::class, 'indexAdmins']);
        Route ::post('/admins/store', [AdminApiController::class, 'storeAdmin']);
        Route::put('/admins/{admin}', [AdminApiController::class, 'updateAdmin']);
        Route::delete('/admins/{admin}', [AdminApiController::class, 'destroyAdmin']);



        Route::get('/types', [TypeDataController::class, 'indexTypes']);
        Route::post('/types/store', [TypeApiController::class, 'storeType']);
        Route::put('/types/{type}', [TypeApiController::class, 'updateType']);
        Route::delete('/types/{type}', [TypeApiController::class, 'destroyType']);


        Route::get('/tickets', [TicketDataController::class, 'indexTicketsAdmin']);
        Route::get('/assigned-tickets', [AssignedTicketDataController::class, 'indexAssignedTickets']);
        Route::patch('/tickets/{ticket}/close', [TicketApiController::class, 'close']);
        Route::patch('/tickets/{ticket}/reopen', [TicketApiController::class, 'reopen']);
        Route::patch('/tickets/update/{ticket}', [TicketApiController::class, 'updateTicket']);
        Route::delete('/tickets/delete/{ticket}', [TicketApiController::class, 'destroy']);


        Route::get('/tickets/{ticket}/comments', [CommentDataController::class, 'viewComments']);

        Route::delete('/comments/delete/{comment}', [CommentDataController::class, 'deleteComment']);



        Route::get('/notifications', [AdminApiNotificationController::class, 'getNotifications']);
        Route::patch('/notifications/{id}/read', [AdminApiNotificationController::class, 'markAsRead']);
        Route::patch('/notifications/{id}/unread', [AdminApiNotificationController::class, 'markAsUnread']);
        Route::get('/notifications/{id}', [AdminApiNotificationController::class, 'showNotification']);


        Route::get('/historyEvents', [EventHistoryDataController::class, 'indexEventHistory']);

    });

});



Route::prefix('user')->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [ApiLoginController::class, 'login']);

    Route::middleware('auth:api_user')->group(function () {
        Route::get('/test', function (Request $request) {
            return response()->json([
                'auth_user' => $request->user(),
            ]);
        });
    });

    Route::middleware('auth:api_user')->group(function () {
        Route::get('/tickets', [TicketDataController::class, 'indexTicketsUsers']);
        Route::post('/tickets/store', [TicketApiController::class, 'storeTicket']);
        Route::patch('/tickets/update/{ticket}', [TicketApiController::class, 'updateTicket']);
        Route::delete('/tickets/{ticket}', [TicketApiController::class, 'destroyTicket']);


        Route::get('/notifications', [UserNotificationController::class, 'getNotifications']);
        Route::patch('/notifications/{id}/read', [UserNotificationController::class, 'markAsRead']);
        Route::patch('/notifications/{id}/unread', [UserNotificationController::class, 'markAsUnread']);
        Route::get('/notifications/{id}', [UserNotificationController::class, 'showNotification']);
    

    });
});



