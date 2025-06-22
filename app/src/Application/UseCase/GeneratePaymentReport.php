<?php

namespace App\Application\UseCase;

use App\Application\DTO\GeneratePaymentReportRequest;
use App\Application\DTO\PaymentReportGeneratorRequest;
use App\Application\Report\PaymentReportGeneratorInterface;

class GeneratePaymentReport
{
    public function __construct(
        private PaymentReportGeneratorInterface $paymentReportGenerator
    )
    {}

    public function execute(GeneratePaymentReportRequest $request)
    {
        return $this->paymentReportGenerator->generate(new PaymentReportGeneratorRequest(
            $request->start_date,
            $request->end_date,
            $request->telegram_chat_id
        ));
    }
}
