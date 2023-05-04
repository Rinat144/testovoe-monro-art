<?php

namespace App\Services\Notification;

interface Notification
{
    public function sendMessage(): void;
}
