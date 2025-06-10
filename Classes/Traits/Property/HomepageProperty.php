<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use RuntimeException;


trait HomepageProperty
{
    protected ?string $homepage = null;

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(mixed $homepage): void
    {
        if ($homepage === null || is_string($homepage)) {
            $this->homepage = null;
        }

        if (is_numeric($homepage) || (is_object($homepage) && method_exists($homepage, '__toString'))) {
            $this->homepage = (string)$homepage;
        }

        throw new RuntimeException('', 5);
    }
}
