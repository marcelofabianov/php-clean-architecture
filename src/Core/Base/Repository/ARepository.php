<?php

namespace App\Core\Base\Repository;

use App\Core\Interfaces\Database\IDatabaseAdapter;
use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Interfaces\Observer\IObserver;
use App\Core\Shared\ValueObject\Id;
use stdClass;

abstract class ARepository
{
    protected IDatabaseAdapter $database;

    /**
     * @param stdClass $record
     * @return IDataStruct
     */
    abstract public function data(stdClass $record): IDataStruct;

    /**
     * @param IDatabaseAdapter $database
     * @param IObserver $observer
     * @param string $observerTargetSubject
     */
    public function __construct(IDatabaseAdapter $database, IObserver $observer, string $observerTargetSubject)
    {
        $this->database = $database;
        $this->database->setObserver($observer, $observerTargetSubject);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        //
    }
}