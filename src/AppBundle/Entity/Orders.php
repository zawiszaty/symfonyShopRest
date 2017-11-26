<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="fk_orders_products1_idx", columns={"products_idproducts"}), @ORM\Index(name="customer_data_id_idx", columns={"customer_data_id"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var string
     *
     * @ORM\Column(name="order_description", type="string", length=255, nullable=true)
     */
    private $orderDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="idorders", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idorders;

    /**
     * @var \AppBundle\Entity\Products
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_idproducts", referencedColumnName="idproducts")
     * })
     */
    private $productsproducts;

    /**
     * @var \AppBundle\Entity\CustomerData
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CustomerData")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_data_id", referencedColumnName="idcustomer_data")
     * })
     */
    private $customerData;

    /**
     * @var \AppBundle\Entity\userId
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id, referencedColumnName="user_id)
     * })
     */
    private $userId;

    /**
     * @return string
     */
    public function getOrderDescription(): ?string
    {
        return $this->orderDescription;
    }

    /**
     * @param string $orderDescription
     */
    public function setOrderDescription(string $orderDescription)
    {
        $this->orderDescription = $orderDescription;
    }

    /**
     * @return int
     */
    public function getIdorders(): int
    {
        return $this->idorders;
    }

    /**
     * @param int $idorders
     */
    public function setIdorders(int $idorders)
    {
        $this->idorders = $idorders;
    }

    /**
     * @return Products
     */
    public function getProductsproducts(): ?Products
    {
        return $this->productsproducts;
    }

    /**
     * @param Products $productsproducts
     */
    public function setProductsproducts(Products $productsproducts)
    {
        $this->productsproducts = $productsproducts;
    }

    /**
     * @return CustomerData
     */
    public function getCustomerData(): ?CustomerData
    {
        return $this->customerData;
    }

    /**
     * @param CustomerData $customerData
     */
    public function setCustomerData(?CustomerData $customerData)
    {
        $this->customerData = $customerData;
    }


}

