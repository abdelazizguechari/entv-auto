<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ExpiryNotification extends Notification
{
    use Queueable;

    public $expiryType;
    public $expiryDate;
    public $entityName;

    public function __construct($expiryType, $expiryDate, $entityName)
    {
        $this->expiryType = $expiryType;
        $this->expiryDate = $expiryDate;
        $this->entityName = $entityName;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "{$this->entityName} a une expiration de {$this->expiryType} le {$this->expiryDate}.",
            'expiry_type' => $this->expiryType,
            'expiry_date' => $this->expiryDate,
            'entity_name' => $this->entityName,
        ];
    }
}
