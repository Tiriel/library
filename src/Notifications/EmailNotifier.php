<?php

namespace App\Notifications;

use App\Model\User;
use App\Notifications\NotifierInterface;

class EmailNotifier implements NotifierInterface
{
    public function notify(User $user, string $message): void {
        echo "Email envoyé à {$user->getEmail()}: $message\n";
    }
}
