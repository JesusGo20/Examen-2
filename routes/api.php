<?php

use App\Models\User; // Import the User class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash; // Import the Hash class
use Illuminate\Validation\ValidationException; // Import the ValidationException class


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::get('/list-specie', [App\Http\Controllers\Api\ApiController::class, 'listSpecie'])->middleware('auth:sanctum');
Route::post('/store-comment', [App\Http\Controllers\Api\ApiController::class, 'storeComment'])->middleware('auth:sanctum');
Route::get('/get-specie/{attraction}', [App\Http\Controllers\Api\ApiController::class, 'getSpeciebyAttraction'])->middleware('auth:sanctum');
Route::put('/update-attraction/{id}', [App\Http\Controllers\Api\ApiController::class, 'updateAttraction'])->middleware('auth:sanctum');
