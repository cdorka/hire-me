<?php

/**
 * TODO
 * php version 8.2
 *
 * @category     TODO
 * @package      TODO
 * @license      TODO
 * @author       Christian Dorka <mail@christiandorka.de>
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Trait;

use ChristianDorka\HireMe\Domain\Model\Category;
use DateTime;
use RuntimeException;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
trait Homepage
{
    protected ?string $homepage = null;

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(mixed $homepage): self
    {
        if ($homepage === null || is_string($homepage)) {
            $this->homepage = null;
            return $this;
        }

        if (is_numeric($homepage) || (is_object($homepage) && method_exists($homepage, '__toString'))) {
            $this->homepage = (string)$homepage;
            return $this;
        }

        throw new RuntimeException('', 5);
    }
}
