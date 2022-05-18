<?php
declare(strict_types=1);

namespace App\Application\Domain;

use DateTimeImmutable;
use DateTimeZone;

class FlatAdvertisement
{
    private mixed $id;

    private string $land;

    private mixed $city;

    private mixed $address;

    private mixed $ownerNumber;

    private string $status = 'ok';

    private DateTimeImmutable $createdAt;

    private mixed $additionalInfo;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable('now', new DateTimeZone('Europe/Berlin'));
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return FlatAdvertisement
     */
    public function setId(mixed $id): FlatAdvertisement
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLand(): mixed
    {
        return $this->land;
    }

    /**
     * @param mixed $land
     * @return FlatAdvertisement
     */
    public function setLand(string $land): FlatAdvertisement
    {
        $this->land = $land;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity(): mixed
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return FlatAdvertisement
     */
    public function setCity(mixed $city): FlatAdvertisement
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress(): mixed
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return FlatAdvertisement
     */
    public function setAddress(mixed $address): FlatAdvertisement
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerNumber(): mixed
    {
        return $this->ownerNumber;
    }

    /**
     * @param mixed $ownerNumber
     * @return FlatAdvertisement
     */
    public function setOwnerNumber($ownerNumber): FlatAdvertisement
    {
        $this->ownerNumber = $ownerNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus(): mixed
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return FlatAdvertisement
     */
    public function setStatus(mixed $status): FlatAdvertisement
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     * @return FlatAdvertisement
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): FlatAdvertisement
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdditionalInfo(): mixed
    {
        return $this->additionalInfo;
    }

    /**
     * @param mixed $additionalInfo
     * @return FlatAdvertisement
     */
    public function setAdditionalInfo(mixed $additionalInfo): FlatAdvertisement
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }
}
