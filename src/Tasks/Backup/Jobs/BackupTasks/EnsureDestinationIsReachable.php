<?php

namespace Spatie\BackupServer\Tasks\Backup\Jobs\BackupTasks;

use Spatie\BackupServer\Exceptions\BackupFailed;
use Spatie\BackupServer\Models\Backup;
use Spatie\BackupServer\Support\Helpers\Enums\Task;

class EnsureDestinationIsReachable implements BackupTask
{
    public function execute(Backup $backup)
    {
        $backup->logInfo(Task::BACKUP, 'Ensuring destination is reachable...');

        if (! $backup->destination->reachable()) {
            throw BackupFailed::destinationNotReachable($backup);
        }
    }
}
