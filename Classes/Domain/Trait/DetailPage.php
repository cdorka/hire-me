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
trait DetailPage
{
    protected ?string $detailPage = null;

    public function getDetailPage(): ?string
    {
        return $this->detailPage;
    }

    public function setDetailPage(?string $detailPage): self
    {
        $this->detailPage = $detailPage;
        return $this;
    }

}
