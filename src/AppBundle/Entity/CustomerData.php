<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerData
 *
 * @ORM\Entity
 */
class CustomerData
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="customerdata")
     * @ORM\JoinColumn(name="user_id", nullable=false)
     */
    protected $user;
    /**
     * @var int
     *
     * @ORM\Column(name="archived", type="integer", length=255, nullable=false)
     */
    private $archived = 0;
    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=false)
     */
    private $street;
    /**
     * @var string
     *
     * @ORM\Column(name="house_number", type="string", length=255, nullable=false)
     */
    private $houseNumber;
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;
    /**
     * @var integer
     *
     * @ORM\Column(name="idcustomer_data", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcustomerData;

    /**
     * @return int
     */
    public function getArchived(): int
    {
        return $this->archived;
    }

    /**
     * @param int $archived
     */
    public function setArchived(int $archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    /**
     * @param string $houseNumber
     */
    public function setHouseNumber(string $houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getIdcustomerData(): int
    {
        return $this->idcustomerData;
    }

    /**
     * @param int $idcustomerData
     */
    public function setIdcustomerData(int $idcustomerData)
    {
        $this->idcustomerData = $idcustomerData;
    }


}

