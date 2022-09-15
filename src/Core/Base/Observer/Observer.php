<?php

namespace App\Core\Base\Observer;

use App\Core\Interfaces\Database\IDatabaseAdapter;

class Observer
{
    protected readonly IDatabaseAdapter $database;
    protected readonly string $targetSubject;

    public function __construct(IDatabaseAdapter $database)
    {
        $this->database = $database;
        $this->database->table('activities_log');
    }

    public function setTargetSubject(string $targetSubject): void
    {
        $this->targetSubject = $targetSubject;
    }
}