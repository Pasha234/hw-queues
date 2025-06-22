<?php

namespace App\Application\Port;

use App\Application\DTO\PaymentReportQueueRequest;

interface PaymentReportQueue
{
    public function sendToQueue(PaymentReportQueueRequest $request): void;
}
