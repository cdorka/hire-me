<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Utility;

class InvalidIntegerException extends \InvalidArgumentException
{
    public function __construct(string $value, int $position)
    {
        parent::__construct(
            sprintf('Invalid integer value "%s" at position %d', $value, $position)
        );
    }
}
