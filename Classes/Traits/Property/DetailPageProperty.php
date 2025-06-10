<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


trait DetailPageProperty
{
    protected ?string $detailPage = null;

    public function getDetailPage(): ?string
    {
        return $this->detailPage;
    }

    public function setDetailPage(?string $detailPage): void
    {
        $this->detailPage = $detailPage;
    }

}
