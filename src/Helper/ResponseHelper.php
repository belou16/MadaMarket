<?php
namespace App\Helper;

final class ResponseHelper
{
    public static function toArray(mixed $response): array
    {
        if (is_array($response)) {
            return $response;
        }

        if (is_string($response)) {
            $decoded = json_decode($response, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded ?? [];
            }
            return ['data' => $response];
        }

        if (is_object($response)) {
            if (method_exists($response, 'toArray')) {
                return (array) $response->toArray();
            }

            if (method_exists($response, 'getBody')) {
                try {
                    $body = $response->getBody();
                    $string = (string) $body;
                    $decoded = json_decode($string, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        return $decoded ?? [];
                    }
                    return ['body' => $string];
                } catch (\Throwable $e) {
                    // fall through
                }
            }

            if (method_exists($response, 'getContent')) {
                try {
                    $content = $response->getContent(false);
                    $decoded = json_decode($content, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        return $decoded ?? [];
                    }
                    return ['content' => $content];
                } catch (\Throwable $e) {
                    // fall through
                }
            }

            $encoded = json_encode($response);
            if ($encoded !== false) {
                $decoded = json_decode($encoded, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $decoded ?? [];
                }
            }
        }

        return ['value' => $response];
    }
}