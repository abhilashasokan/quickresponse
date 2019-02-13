<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/questions', 'QuestionController'); 
Route::apiResource('/category','CategoryController');
Route::apiResource('/questions/{question}/reply','ReplyController');

Route::post('/like/{reply}', 'LikeController@Liked');
Route::delete('/like/{reply}', 'LikeController@Unliked');

Route::post('notifications','NotificationController@index');
Route::post('markAsRead','NotificationController@markAsRead');

// Route::post('notifications', function() {
//     return [
//         'read' => auth()->user()->readNotifications(),
//         'unread' => auth()->user()->unReadNotifications(), 
//     ];
// });

Route::group([
    // 'middleware' => 'api',
    'prefix' => 'auth'
], function () { //$router
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    Route::post('signup', 'AuthController@signup');
});