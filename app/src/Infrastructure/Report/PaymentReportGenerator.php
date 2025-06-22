<?php

namespace App\Infrastructure\Report;

use App\Application\DTO\PaymentReportGeneratorRequest;
use App\Application\Report\PaymentReportGeneratorInterface;

class PaymentReportGenerator implements PaymentReportGeneratorInterface
{
    public function generate(PaymentReportGeneratorRequest $request): string
    {
        // Dummy implementation: generate a simple string report.
        // In a real application, you would query a database or another service
        // to get payment data between the start and end dates.

        return sprintf(
            "Payment Report\n" .
            "==============\n" .
            "Period: %s to %s\n\n" .
            "This is a dummy report. No actual data was fetched.\n" .
            "Report requested for Telegram Chat ID: %d",
            $request->start_date,
            $request->end_date,
            $request->telegram_chat_id
        );
    }
}
