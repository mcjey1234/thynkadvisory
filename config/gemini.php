<?php

return [
    
    'api_key' => env('GEMINI_API_KEY'),

    'model' => env('GEMINI_MODEL', 'gemini-1.5-flash'),

 
    'timeout' => 30,

    
    'max_tokens' => 500,

   
    'temperature' => 0.7,

   
    'top_p' => 0.95,

   
    'top_k' => 40,
];