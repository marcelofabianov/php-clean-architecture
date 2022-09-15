<?php

namespace App\Core\Shared\ValueObject;

use App\Core\Exception\DateInvalidFormatException;
use Carbon\Carbon;
use ErrorException;

class DeletedAt
{
    /**
     * @var Carbon
     */
    public readonly Carbon $value;

    /**
     * @param string|null $value
     */
    private function __construct(string $value = null)
    {
        $this->value = is_null($value)
            ? null
            : Carbon::createFromFormat(getenv('DEFAULT_DATE_FORMAT'), $value);
    }

    /**
     * @param string|null $value
     * @return DeletedAt
     * @throws DateInvalidFormatException
     */
    public static function create(string|null $value = null): DeletedAt
    {
        if (!is_null($value)) {
            self::isValid($value);
        }

        return new DeletedAt($value);
    }

    /**
     * @param string $value
     * @return bool
     * @throws DateInvalidFormatException
     */
    public static function isValid(string $value): bool
    {
        try {
            Carbon::createFromFormat(getenv('DEFAULT_DATE_FORMAT'), $value);
        } catch (\ErrorException $e) {
            throw new DateInvalidFormatException('CreatedAt');
        }

        return true;
    }

    /**
     * @param string|null $format
     * @return string
     * @throws DateInvalidFormatException
     */
    public function format(string|null $format = null): string
    {
        try {
            $date = $this->value->format(is_null($format) ? env('DEFAULT_DATE_FORMAT'): $format);
        } catch (ErrorException $e) {
            throw new DateInvalidFormatException('CreatedAt');
        }

        return $date;
    }
}