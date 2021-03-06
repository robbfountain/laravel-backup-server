<?php

namespace Spatie\BackupServer\Tasks\Search;

use Illuminate\Support\Str;
use Spatie\BackupServer\Models\Backup;

class FileSearchResult
{
    protected string $relativePath;

    protected Backup $backup;

    public function __construct(string $relativePath, Backup $backup)
    {
        $this->relativePath = $relativePath;

        $this->backup = $backup;
    }

    public function getAbsolutePath(): string
    {
        $root = $this->backup->destinationLocation()->getFullPath();

        return $root . Str::after($this->relativePath, './');
    }

    public function age(): string
    {
        return $this->backup->created_at->diffForHumans();
    }
}
