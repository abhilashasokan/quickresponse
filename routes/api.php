<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/questions', 'QuestionController'); 
Route::apiResource('/category','CategoryController');
Route::apiResource('/questions/{question}/reply','ReplyController');

Route::post('/like/{reply}', 'LikeController@Liked');
Route::delete('/like/{reply}', 'LikeController@Unliked');