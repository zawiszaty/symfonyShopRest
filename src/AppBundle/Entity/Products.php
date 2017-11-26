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
     * @ORM\Column(name="miniature", type="string", length=255, nullable=true)
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

    /**
     * @return string
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return string
     */
    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    /**
     * @param string $productDescription
     */
    public function setProductDescription(string $productDescription)
    {
        $this->productDescription = $productDescription;
    }

    /**
     * @return string
     */
    public function getProductSize(): ?string
    {
        return $this->productSize;
    }

    /**
     * @param string $productSize
     */
    public function setProductSize(string $productSize)
    {
        $this->productSize = $productSize;
    }

    /**
     * @return int
     */
    public function getProductAmount(): ?int
    {
        return $this->productAmount;
    }

    /**
     * @param int $productAmount
     */
    public function setProductAmount(int $productAmount)
    {
        $this->productAmount = $productAmount;
    }

    /**
     * @return string
     */
    public function getMiniature(): ?string
    {
        return $this->miniature;
    }

    /**
     * @param string $miniature
     */
    public function setMiniature(string $miniature)
    {
        $this->miniature = $miniature;
    }

    /**
     * @return int
     */
    public function getIdproducts(): ?int
    {
        return $this->idproducts;
    }

    /**
     * @param int $idproducts
     */
    public function setIdproducts(int $idproducts)
    {
        $this->idproducts = $idproducts;
    }

    /**
     * @return Brands
     */
    public function getBrandsbrand(): ?Brands
    {
        return $this->brandsbrand;
    }

    /**
     * @param Brands $brandsbrand
     */
    public function setBrandsbrand(Brands $brandsbrand)
    {
        $this->brandsbrand = $brandsbrand;
    }

    /**
     * @return Categories
     */
    public function getCategoriescategory(): ?Categories
    {
        return $this->categoriescategory;
    }

    /**
     * @param Categories $categoriescategory
     */
    public function setCategoriescategory(Categories $categoriescategory)
    {
        $this->categoriescategory = $categoriescategory;
    }


}

