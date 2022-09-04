<?php

namespace App\Service;

class NotificationService
{
    public static function setNotification($message)
    {
        session_start();

        $_SESSION['notification'] = $message;
    }
}