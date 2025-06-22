<?php

namespace App\Application\Report;

use App\Application\DTO\PaymentReportGeneratorRequest;

interface PaymentReportGeneratorInterface
{
    public function generate(PaymentReportGeneratorRequest $request): string;
}
