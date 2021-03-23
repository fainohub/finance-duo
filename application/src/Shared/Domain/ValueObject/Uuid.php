<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

/**
 * Class Uuid
 * @package Shared\Domain\ValueObject
 */
class Uuid
{
    /**
     * @var string
     */
    private string $value;

    /**
     * Uuid constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);
        $this->value = $value;
    }

    /**
     * @return static
     */
    public static function create(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @param $id
     */
    private function ensureIsValidUuid($id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, is_scalar($id) ? $id : gettype($id))
            );
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }
}
