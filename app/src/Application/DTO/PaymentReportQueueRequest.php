<?php

namespace App\Application\DTO;

class PaymentReportQueueRequest
{
    public function __construct(
        public string $start_date,
        public string $end_date,
        public int $telegram_chat_id
    )
    {}
}
