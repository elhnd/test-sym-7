<?php

namespace App\Service;

use Symfony\Component\Notifier\Message\DesktopMessage;
use Symfony\Component\Notifier\TexterInterface;

class NotificationService
{
    private TexterInterface $texter;

    public function __construct(TexterInterface $texter)
    {
        $this->texter = $texter;
    }

    public function sendDesktopNotification(string $title, string $message): void
    {
        $desktopMessage = new DesktopMessage(
            $title,
            $message
        );

        $this->texter->send($desktopMessage);
    }
}
