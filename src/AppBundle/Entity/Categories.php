<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string", length=255, nullable=false)
     */
    private $categoryName;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcategory", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategory;

    /**
     * @return string
     */
    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function setCategoryName(string $categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * @return int
     */
    public function getIdcategory(): int
    {
        return $this->idcategory;
    }

    /**
     * @param int $idcategory
     */
    public function setIdcategory(int $idcategory)
    {
        $this->idcategory = $idcategory;
    }


}

