<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Services;

use RuntimeException;

class CurlController
{
    private static ?string $apiUrl = null;
    private static ?string $apiToken = null;

    private static function loadEnv(): void
    {
        if (self::$apiUrl !== null) {
            return;
        }

        self::$apiUrl = $_ENV['CURL_API_URL'] ?? '';
        self::$apiToken = $_ENV['CURL_API_TOKEN'] ?? '';
    }

    public static function request(string $url, string $method, array $fields = [], ?string $token = null): mixed
    {
        self::loadEnv();

        $token = $token ?? self::$apiToken;

        $curl = curl_init();

        $postFields = http_build_query($fields);

        curl_setopt_array($curl, [
            CURLOPT_URL => rtrim(self::$apiUrl, '/') . '/' . ltrim($url, '/'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => strtoupper($method),
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $token,
                'Content-Type: application/x-www-form-urlencoded',
            ],
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new RuntimeException('cURL error: ' . $error);
        }

        $decoded = json_decode($response, true);
        return $decoded ?? $response;
    }

    public static function chatGPT(string $content, ?string $token = null, ?string $org = null): string
    {
        $token = $token ?? $_ENV['OPENAI_API_TOKEN'] ?? '';
        $org = $org ?? $_ENV['OPENAI_ORG_ID'] ?? '';

        $curl = curl_init();

        $payload = json_encode([
            'model' => 'gpt-4-0613',
            'messages' => [['role' => 'user', 'content' => $content]],
        ]);

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $token,
                'OpenAI-Organization: ' . $org,
                'Content-Type: application/json',
            ],
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new RuntimeException('cURL error: ' . $error);
        }

        $decoded = json_decode($response, true);

        if (!isset($decoded['choices'][0]['message']['content'])) {
            $errorMsg = $decoded['error']['message'] ?? 'Unknown OpenAI error';
            throw new RuntimeException('OpenAI API error: ' . $errorMsg);
        }

        return $decoded['choices'][0]['message']['content'];
    }
}

