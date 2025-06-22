<?php

namespace App\Infrastructure\Message;

class PaymentReportMessage
{
    public function __construct(
        private string $start_at,
        private string $end_at,
        private int $telegram_chat_id,
    ) {}

    public function getStartAt(): string
    {
        return $this->start_at;
    }

    public function getEndAt(): string
    {
        return $this->end_at;
    }

    public function getTelegramChatId(): int
    {
        return $this->telegram_chat_id;
    }
}
