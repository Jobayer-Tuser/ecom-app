<?php

namespace Modules\JiraBoard\Http\Controllers\Misc;

use Modules\JiraBoard\Http\Controllers\Controller;

class JwtController extends Controller
{
    public function generatingToken(): string
    {
        $header = json_encode(['type' => 'JWT', 'alg' => 'HS256']);
        $payload = json_encode([
            'sub' => '123456',
            'name' => 'Jobayer',
            'iat' => 152162345,
            'iss' => '',
        ]);

        $base64UrlHeader = base64_encode($header);
        $base64UrlPayload = base64_encode($payload);
        $signature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, '256-bit-secret-key', true);
        $base64UrlSignature = base64_encode($signature);

        $jwt = $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
        return $jwt. PHP_EOL;
    }
}
