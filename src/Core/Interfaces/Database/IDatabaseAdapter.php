<?php

namespace App\Core\Interfaces\Database;

use App\Core\Interfaces\Observer\IObserver;
use App\Core\Shared\ValueObject\Id;
use stdClass;

interface IDatabaseAdapter
{
    public function __construct($connectionName = 'default');

    public function setObserver(IObserver $observer, string $subject): void;

    public function primaryKey(string $primaryKey): void;

    public function table(string $table): void;

    public function save(IDataStruct $data): stdClass;

    public function findById(Id $id, IDataStruct $data): stdClass;

    public function update(Id $id, IDataStruct $data): stdClass;

    public function destroy(stdClass $record): bool;

    public function toggleActive(Id $id, bool $currentActive): bool;

    public function getAllPaginator(): IPaginator;

    public function getAll(): array;

    public function count(): int;
}