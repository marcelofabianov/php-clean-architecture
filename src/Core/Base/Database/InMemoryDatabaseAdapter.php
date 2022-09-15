<?php

namespace App\Core\Base\Database;

use App\Core\Interfaces\Database\IDatabaseAdapter;
use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Interfaces\Database\IPaginator;
use App\Core\Interfaces\Observer\IObserver;
use App\Core\Shared\ValueObject\Id;
use stdClass;

class InMemoryDatabaseAdapter extends DatabaseAdapter implements IDatabaseAdapter
{
    /**
     * @param IObserver $observer
     * @param string $subject
     * @return void
     */
    public function setObserver(IObserver $observer, string $subject): void
    {
        //
    }

    /**
     * @param string $primaryKey
     * @return void
     */
    public function primaryKey(string $primaryKey): void
    {
        //
    }

    /**
     * @param string $table
     * @return void
     */
    public function table(string $table): void
    {
        //
    }

    /**
     * @param IDataStruct $data
     * @return stdClass
     */
    public function save(IDataStruct $data): stdClass
    {
        //
    }

    /**
     * @param Id $id
     * @param IDataStruct $data
     * @return stdClass
     */
    public function findById(Id $id, IDataStruct $data): stdClass
    {
        //
    }

    /**
     * @param Id $id
     * @param IDataStruct $data
     * @return stdClass
     */
    public function update(Id $id, IDataStruct $data): stdClass
    {
        //
    }

    /**
     * @param stdClass $record
     * @return bool
     */
    public function destroy(stdClass $record): bool
    {
        //
    }

    /**
     * @param Id $id
     * @param bool $currentActive
     * @return bool
     */
    public function toggleActive(Id $id, bool $currentActive): bool
    {
        //
    }

    /**
     * @return IPaginator
     */
    public function getAllPaginator(): IPaginator
    {
        //
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        //
    }

    /**
     * @return int
     */
    public function count(): int
    {
        //
    }
}