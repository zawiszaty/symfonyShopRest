<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
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

    /**
     * @return string
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    /**
     * @param string $brandName
     */
    public function setBrandName(string $brandName)
    {
        $this->brandName = $brandName;
    }

    /**
     * @return int
     */
    public function getIdbrand(): ?int
    {
        return $this->idbrand;
    }

    /**
     * @param int $idbrand
     */
    public function setIdbrand(int $idbrand)
    {
        $this->idbrand = $idbrand;
    }



}

