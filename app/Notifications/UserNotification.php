<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
  public function __construct($expiring_in)
  {
    $this->user = auth()->user();
    $this->expiring_in = $expiring_in;
  }

  public function via($notifiable)
  {
    return ['database'];
  }

  public function toArray($notifiable)
  {
    return [
      'id' => $this->user->id,
      'expires' => $this->expiring_in,
    ];
  }
}
