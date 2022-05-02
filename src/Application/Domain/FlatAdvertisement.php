<?php
declare(strict_types=1);

namespace App\Application\Domain;

use DateTimeImmutable;
use DateTimeZone;

class FlatAdvertisement
{
    private $id;

    private $land;

    private $city;

    private $address;

    private $owner_number;

    private $status = 'ok';

    private $created_at;

    private $additional_info;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->created_at = new DateTimeImmutable('now', new DateTimeZone('Europe/Berlin'));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return FlatAdvertisement
     */
    public function setId($id): FlatAdvertisement
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLand()
    {
        return $this->land;
    }

    /**
     * @param mixed $land
     * @return FlatAdvertisement
     */
    public function setLand($land): FlatAdvertisement
    {
        $this->land = $land;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return FlatAdvertisement
     */
    public function setCity($city): FlatAdvertisement
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return FlatAdvertisement
     */
    public function setAddress($address): FlatAdvertisement
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerNumber()
    {
        return $this->owner_number;
    }

    /**
     * @param mixed $owner_number
     * @return FlatAdvertisement
     */
    public function setOwnerNumber($owner_number): FlatAdvertisement
    {
        $this->owner_number = $owner_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return FlatAdvertisement
     */
    public function setStatus($status): FlatAdvertisement
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->created_at;
    }

    /**
     * @param DateTimeImmutable $created_at
     * @return FlatAdvertisement
     */
    public function setCreatedAt(DateTimeImmutable $created_at): FlatAdvertisement
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdditionalInfo()
    {
        return $this->additional_info;
    }

    /**
     * @param mixed $additional_info
     * @return FlatAdvertisement
     */
    public function setAdditionalInfo($additional_info): FlatAdvertisement
    {
        $this->additional_info = $additional_info;
        return $this;
    }
}
