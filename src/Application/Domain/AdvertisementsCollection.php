<?php
declare(strict_types=1);

namespace App\Application\Domain;

use App\Application\Type\Collection;

class AdvertisementsCollection extends Collection
{

    public function __construct(?FlatAdvertisement ...$ads)
    {
        foreach ($ads as $ad) {
            $this->append($ad);
        }

        parent::__construct([]);
    }

    public function addAdvertisement(FlatAdvertisement $ad): self
    {
        $this->append($ad);

        return $this;
    }

    public function getAdvertisements(): iterable
    {
        return $this->getIterator();
    }
}
