<?php

namespace App\Core\Shared\ValueObject;

use App\Core\Exception\DateInvalidFormatException;
use Carbon\Carbon;
use ErrorException;

class UpdatedAt
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
            ? Carbon::now()
            : Carbon::createFromFormat(getenv('DEFAULT_DATE_FORMAT'), $value);
    }

    /**
     * @param string|null $value
     * @return UpdatedAt
     * @throws DateInvalidFormatException
     */
    public static function create(string|null $value = null): UpdatedAt
    {
        if (!is_null($value)) {
            self::isValid($value);
        }

        return new UpdatedAt($value);
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
            $date = $this->value->format(is_null($format) ? getenv('DEFAULT_DATE_FORMAT'): $format);
        } catch (ErrorException $e) {
            throw new DateInvalidFormatException('CreatedAt');
        }

        return $date;
    }
}