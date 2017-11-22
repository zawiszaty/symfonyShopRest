<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brands
 *
 * @ORM\Table(name="brands")
 * @ORM\Entity
 */
class Brands
{
    /**
     * @var string
     *
     * @ORM\Column(name="brand_name", type="string", length=255, nullable=false)
     */
    private $brandName;

    /**
     * @var integer
     *
     * @ORM\Column(name="idbrand", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbrand;



}

