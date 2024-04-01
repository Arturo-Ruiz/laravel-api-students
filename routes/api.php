<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/students', function(){
    return 'Students List';
});

Route::get('/student/{id}', function(){
    return 'Get a student';
});

Route::post('/create-student', function(){
    return 'Create Student';
});

Route::put('/update-student/{id}', function(){
    return 'Updating Student';
});

Route::delete('/delete-student/{id}', function(){
    return 'Deleting Student';
});