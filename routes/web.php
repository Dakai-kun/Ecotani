<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('chatbot.chatbot');
});

Route::post('/chat', 'App\Http\Controllers\ChatAIController');
