<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    private $baseUrl = 'http://127.0.0.1:8000/';

    public function encode(Request $request)
    {
return 'hello';
        $request->validate([
            'url' => 'required|url'
        ]);

        $originalUrl = $request->input('url');
        $shortCode = Str::random(6);

        // Store in memory using Laravel Cache
        Cache::put($shortCode, $originalUrl, now()->addDays(30));

        // return response()->json([
        //     'original_url' => $originalUrl,
        //     'short_url' => $this->baseUrl . 'decode/' . $shortCode
        // ]);
    }

    public function decode($shortCode)
    {
        $originalUrl = Cache::get($shortCode);

        if (!$originalUrl) {
            return response()->json(['error' => 'Short URL not found'], 404);
        }

        return response()->json(['original_url' => $originalUrl]);
    }
}
