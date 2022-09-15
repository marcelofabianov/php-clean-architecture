<?php

namespace App\Core\Interfaces\Repository;

use App\Core\Interfaces\Database\IDatabaseAdapter;
use App\Core\Interfaces\Observer\IObserver;

interface IRepository
{
    public function __construct(IDatabaseAdapter $database, IObserver $observer, string $observerTargetSubject);

    public function count(): int;
}