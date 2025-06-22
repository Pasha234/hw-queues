<?php

namespace App\Application\UseCase;

use App\Application\DTO\PaymentReportQueueRequest;
use App\Application\Port\PaymentReportQueue;
use App\Application\DTO\GeneratePaymentReportRequest;

class SendPaymentReportGenerationToQueue
{
    public function __construct(
        private PaymentReportQueue $paymentReportQueue
    )
    {}

    public function execute(GeneratePaymentReportRequest $request)
    {
        $this->paymentReportQueue->sendToQueue(new PaymentReportQueueRequest(
            $request->start_date,
            $request->end_date,
            $request->telegram_chat_id
        ));
    }
}
