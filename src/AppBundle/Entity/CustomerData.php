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



}

