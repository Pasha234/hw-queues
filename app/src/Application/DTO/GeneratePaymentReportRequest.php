<?php

namespace App\Application\DTO;

class GeneratePaymentReportRequest
{
    public function __construct(
        public string $start_date,
        public string $end_date,
        public int $telegram_chat_id
    )
    {}
}
