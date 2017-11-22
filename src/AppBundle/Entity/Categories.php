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


}

