<?php
declare(strict_types=1);

namespace App\Application\UseCase\GetAdvertisementsList;

use App\Application\Domain\FlatAdvertisement;

class AdvertisementsListResult
{
    private array $ads;

    public function __construct($ads = [])
    {
        $this->ads = $ads;
    }

    public function addAdvertisement(FlatAdvertisement $ad): self
    {
        $this->ads[] = $ad;

        return $this;
    }

    public function getAdvertisements(): array
    {
        return $this->ads;
    }
}
