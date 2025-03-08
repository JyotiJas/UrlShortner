<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Cache;

class UrlShortenerTest extends TestCase
{
    public function test_url_encoding()
    {
        $response = $this->postJson('/api/encode', ['url' => 'https://www.example.com']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['original_url', 'short_url']);
    }

    public function test_url_decoding()
    {
        Cache::put('test123', 'https://www.example.com', now()->addMinutes(10));

        $response = $this->getJson('/api/decode/test123');
        $response->assertStatus(200);
        $response->assertJson(['original_url' => 'https://www.example.com']);
    }

    public function test_invalid_url_decoding()
    {
        $response = $this->getJson('/api/decode/nonexistent');
        $response->assertStatus(404);
        $response->assertJson(['error' => 'Short URL not found']);
    }
}
