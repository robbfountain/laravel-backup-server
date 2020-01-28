<?php

namespace Spatie\BackupServer\Notifications\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Spatie\BackupServer\Notifications\Notifications\Concerns\HandlesNotifications;
use Spatie\BackupServer\Tasks\Monitor\Events\UnhealthyDestinationFoundEvent;

class UnhealthyDestinationFoundNotification extends Notification
{
    use HandlesNotifications;

    public UnhealthyDestinationFoundEvent $event;

    public function __construct(UnhealthyDestinationFoundEvent $event)
    {
        $this->event = $event;
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage)
            ->from($this->fromEmail(), $this->fromName())
            ->subject(trans('backup::notifications.unhealthy_destination_found_subject', ['destination_name' => $this->destinationName()]))
            ->line(trans('backup::notifications.unhealthy_destination_found_body', ['destination_name' => $this->destinationName()]));
    }

    public function destinationName(): string
    {
        return $this->event->destination->name;
    }
}
