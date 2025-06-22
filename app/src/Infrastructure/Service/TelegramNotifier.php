<?php

namespace App\Infrastructure\Service;

use App\Application\Service\TelegramNotifierInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramNotifier implements TelegramNotifierInterface
{
    private const TELEGRAM_API_URL = 'https://api.telegram.org/bot';

    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly string $telegramBotToken
    ) {}

    public function sendMessage(int $chatId, string $text): void
    {
        $this->client->request('POST', self::TELEGRAM_API_URL . $this->telegramBotToken . '/sendMessage', [
            'json' => [
                'chat_id' => $chatId,
                'text' => $text,
            ],
        ]);
    }
}
