<?php

namespace App\Application\DTO;

class PaymentReportGeneratorRequest
{
    public function __construct(
        public string $start_date,
        public string $end_date,
        public int $telegram_chat_id
    )
    {}
}
