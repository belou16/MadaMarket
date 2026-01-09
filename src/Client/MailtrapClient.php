<?php

namespace App\Client;

use Symfony\Component\Mime\Email;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Component\HttpClient\HttpClient;

final class MailtrapClient
{
    private string $apiKey;
    private HttpClientInterface $http;

    private function __construct(string $apiKey, ?HttpClientInterface $http = null)
    {
        $this->apiKey = $apiKey;
        $this->http = $http ?? HttpClient::create();
    }

    public static function initSendingEmails(string $apiKey, ?HttpClientInterface $http = null): self
    {
        return new self($apiKey, $http);
    }

    public function send(Email $email): ResponseInterface
    {
        $from = $email->getFrom()[0] ?? null;
        $to = $email->getTo() ?? [];

        $payload = [
            'from' => ['email' => (string) $from],
            'to' => array_map(fn($addr) => ['email' => (string) $addr], $to),
            'subject' => $email->getSubject(),
            'text' => $email->getTextBody(),
            'html' => $email->getHtmlBody(),
        ];

        return $this->http->request('POST', 'https://send.api.mailtrap.io/api/send', [
            'headers' => [
                'Api-Token' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => $payload,
        ]);
    }
}