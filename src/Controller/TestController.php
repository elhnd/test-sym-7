<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\NotificationService;

class TestController extends AbstractController
{

     public function __construct(
        private NotificationService $notificationService,
    ) {
    }

    #[Route('/test-notification', name: 'app_test_notification')]
    public function index(Request $request): Response
    {
        $this->notificationService->sendDesktopNotification(
                'Task Completed',
                'Old data has been purged successfully.');
        
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
