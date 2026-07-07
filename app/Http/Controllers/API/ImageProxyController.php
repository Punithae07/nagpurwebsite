<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImageProxyController extends Controller
{
    public function fetch()
    {
        $url = request('url');

        if (!$url) {
            abort(400, 'Missing image URL');
        }

        try {
            $response = Http::withoutVerifying()   // FIX SSL
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (compatible; Laravel Birthday Service)',
                    'Referer' => config('school.image_proxy_api'),
                    'Accept' => '*/*',
                    'Connection' => 'keep-alive',
                ])
                ->timeout(10)
                ->get($url);

            if ($response->failed()) {
                Log::error('Image proxy failed', [
                    'url' => $url,
                    'status' => $response->status()
                ]);
                abort(404);
            }

            return response($response->body(), 200)
                ->header('Content-Type', $response->header('Content-Type', 'image/jpeg'));

        } catch (\Throwable $e) {
            Log::error('Image proxy error', [
                'url' => $url,
                'error' => $e->getMessage()
            ]);
            abort(500, 'Error fetching image');
        }
    }
}
