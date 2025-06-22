<?php

namespace App\Infrastructure\Controller;

use Exception;
use App\DTO\PaymentReportRequest;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Application\DTO\GeneratePaymentReportRequest;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use App\Application\UseCase\SendPaymentReportGenerationToQueue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class BankController extends AbstractController
{
    #[Route('/paymentReport/generate', name: 'app_bank', methods: ['POST'])]
    public function index(
        #[MapRequestPayload] PaymentReportRequest $paymentRequest,
        SendPaymentReportGenerationToQueue $sendPaymentReportGenerationToQueue
    ): JsonResponse
    {
        try {
            $sendPaymentReportGenerationToQueue->execute(
                new GeneratePaymentReportRequest(
                    $paymentRequest->start_at,
                    $paymentRequest->end_at,
                    $paymentRequest->telegram_chat_id
                )
            );

            return $this->json([
                'message' => 'Your request has been sent to the queue! Please wait for the response.',
            ]);
        } catch (Exception $e) {
            return $this->json([
                'message' => 'Something went wrong!',
            ], 500);
        }
    }
}
