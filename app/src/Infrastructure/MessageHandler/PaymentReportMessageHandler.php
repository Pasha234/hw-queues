<?php

namespace App\Infrastructure\MessageHandler;

use App\Application\Service\TelegramNotifierInterface;
use App\Application\DTO\GeneratePaymentReportRequest;
use App\Application\UseCase\GeneratePaymentReport;
use App\Infrastructure\Message\PaymentReportMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class PaymentReportMessageHandler
{
    public function __construct(
        private GeneratePaymentReport $generatePaymentReport,
        private TelegramNotifierInterface $telegramNotifier
    ) {}

    public function __invoke(PaymentReportMessage $message)
    {
        $report = $this->generatePaymentReport->execute(new GeneratePaymentReportRequest(
            $message->getStartAt(),
            $message->getEndAt(),
            $message->getTelegramChatId()
        ));

        $this->telegramNotifier->sendMessage(
            $message->getTelegramChatId(),
            $report
        );
    }
}
