<?php

namespace App\Core\Shared\ValueObject;

use App\Core\Exception\DateInvalidFormatException;
use Carbon\Carbon;
use ErrorException;

class CreatedAt
{
    /**
     * @var Carbon
     */
    public readonly Carbon $value;

    /**
     * @param string|null $value
     */
    private function __construct(string|null $value = null)
    {
        $this->value = is_null($value)
            ? Carbon::now()
            : Carbon::createFromFormat(getenv('DEFAULT_DATE_FORMAT'), $value);
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
        } catch (ErrorException $e) {
            throw new DateInvalidFormatException('CreatedAt');
        }

        return true;
    }

    /**
     * @param string|null $value
     * @return CreatedAt
     * @throws DateInvalidFormatException
     */
    public static function create(string|null $value = null): CreatedAt
    {
        if (!is_null($value)) {
            self::isValid($value);
        }

        return new CreatedAt($value);
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