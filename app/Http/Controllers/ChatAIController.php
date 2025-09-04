<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class ChatAIController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $response = Http::withHeaders([
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . env('GROQ_API_KEY')
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                "model" => $request->post('model', 'llama-3.1-8b-instant'), // default model
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $request->post('content')
                    ]
                ],
                "temperature" => 0,
                "max_tokens" => 2048
            ])->json();

            return $response['choices'][0]['message']['content'] ?? "No response generated";
        } catch (Throwable $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
