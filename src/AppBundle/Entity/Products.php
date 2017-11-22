<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="fk_products_categories1_idx", columns={"categories_idcategory"}), @ORM\Index(name="fk_products_brands1_idx", columns={"brands_idbrand"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255, nullable=false)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="product_description", type="string", length=255, nullable=false)
     */
    private $productDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="product_size", type="string", length=255, nullable=false)
     */
    private $productSize;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_amount", type="integer", nullable=false)
     */
    private $productAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="miniature", type="string", length=255, nullable=false)
     */
    private $miniature;

    /**
     * @var integer
     *
     * @ORM\Column(name="idproducts", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproducts;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brands_idbrand", referencedColumnName="idbrand")
     * })
     */
    private $brandsbrand;

    /**
     * @var \AppBundle\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_idcategory", referencedColumnName="idcategory")
     * })
     */
    private $categoriescategory;


}

