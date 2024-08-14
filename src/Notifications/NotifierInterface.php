<?php

namespace App\Notifications;

use App\Model\User;

interface NotifierInterface
{
    public function notify(User $user, string $message): void;
}
