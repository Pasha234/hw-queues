<?php

namespace App\Infrastructure\Queue;

use App\Application\Port\PaymentReportQueue;
use App\Application\DTO\PaymentReportQueueRequest;
use App\Infrastructure\Message\PaymentReportMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class RabbitPaymentReportQueue implements PaymentReportQueue
{
    public function __construct(
        private MessageBusInterface $bus
    ) {}

    public function sendToQueue(PaymentReportQueueRequest $request): void
    {
        $this->bus->dispatch(new PaymentReportMessage(
            $request->start_date,
            $request->end_date,
            $request->telegram_chat_id
        ));
    }
}
