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

namespace ChristianDorka\HireMe\Traits\Properties;

use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Domain\Model\Country;
use DateTime;
use RuntimeException;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
trait CountryProperties
{
    protected ?string $twoLetterIsoCode = null;
    protected ?string $threeLetterIsoCode = null;

    public function getTwoLetterIsoCode(): ?string
    {
        return $this->twoLetterIsoCode;
    }

    public function setTwoLetterIsoCode(?string $twoLetterIsoCode): self
    {
        $this->twoLetterIsoCode = $twoLetterIsoCode;
        return $this;
    }

    public function getThreeLetterIsoCode(): ?string
    {
        return $this->threeLetterIsoCode;
    }

    public function setThreeLetterIsoCode(?string $threeLetterIsoCode): self
    {
        $this->threeLetterIsoCode = $threeLetterIsoCode;
        return $this;
    }
}
