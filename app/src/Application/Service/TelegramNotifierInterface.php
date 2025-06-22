<?php

namespace App\Application\Service;

interface TelegramNotifierInterface
{
    public function sendMessage(int $chatId, string $text): void;
}
