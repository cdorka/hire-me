<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;

use DateTime;


trait SystemProperties
{
    protected ?DateTime $crdate = null;
    protected ?DateTime $tstamp = null;
    protected ?int $sorting = null;
    protected ?int $uid = null;

    public function getCrdate(): ?DateTime
    {
        return $this->crdate;
    }

    public function setCrdate(?DateTime $crdate): void
    {
        $this->crdate = $crdate;
    }

    public function getTstamp(): ?DateTime
    {
        return $this->tstamp;
    }

    public function setTstamp(?DateTime $tstamp): void
    {
        $this->tstamp = $tstamp;
    }

    public function getSorting(): ?int
    {
        return $this->sorting;
    }

    public function setSorting(?int $sorting): void
    {
        $this->sorting = $sorting;
    }

    public function getUid(): ?int
    {
        return $this->uid;
    }

    public function setUid(?int $uid): void
    {
        $this->uid = $uid;
    }

}
