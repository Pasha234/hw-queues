<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class PaymentReportRequest
{
    #[Assert\NotBlank(message: "Дата начала не должна быть пустым.")]
    #[Assert\Date(
        message: 'Неверная дата начала периода.'
    )]
    public string $start_at = '';

    #[Assert\NotBlank(message: "Дата окончания не должна быть пустым.")]
    #[Assert\Date(
        message: 'Неверная дата окончания периода.'
    )]
    public string $end_at = '';

    #[Assert\NotBlank(message: "Telegram chat id должен быть указан.")]
    public int $telegram_chat_id = 0;
}
