<?php

namespace App\Core\Interfaces\Observer;

use App\Core\Interfaces\Database\IDatabaseAdapter;
use App\Core\Interfaces\Database\IDataStruct;
use stdClass;

interface IObserver
{
    public function __construct(IDatabaseAdapter $database);

    public function setTargetSubject(string $targetSubject): void;

    public function creating(): void;

    public function updating(): void;

    public function deleting(): void;

    public function created(IDataStruct $after): void;

    public function updated(IDataStruct $before, stdClass $after): void;

    public function deleted(stdClass $before): void;
}