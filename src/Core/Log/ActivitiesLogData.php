<?php

namespace App\Core\Log;

use App\Core\Base\Database\DataStruct;
use App\Core\Exception\IdInvalidException;
use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Shared\ValueObject\CreatedAt;
use App\Core\Shared\ValueObject\Id;
use App\Core\Shared\ValueObject\UpdatedAt;
use stdClass;
use App\Core\Exception\DateInvalidFormatException;

class ActivitiesLogData extends DataStruct implements IDataStruct
{
    public readonly string $subject;
    public readonly string|null $after;
    public readonly string $id;
    public readonly string|null $before;
    public readonly string|null $author;
    public readonly string $createdAt;
    public readonly string $updatedAt;

    /**
     * @param string $subject
     * @param IDataStruct|stdClass|null $after
     * @param IDataStruct|stdClass|null $before
     * @param string|null $author
     * @throws DateInvalidFormatException|IdInvalidException
     */
    public function __construct(
        string $subject,
        IDataStruct|stdClass $after = null,
        IDataStruct|stdClass $before = null,
        string $author = null
    ) {
        $this->subject = $subject;
        $this->after = is_null($after) ? null : $after->toJson();
        $this->before = is_null($before) ? null : $before->toJson();
        $this->author = $author;
        $this->id = Id::create()->value;
        $this->createdAt = (CreatedAt::create())->format();
        $this->updatedAt = (UpdatedAt::create())->format();
    }
}