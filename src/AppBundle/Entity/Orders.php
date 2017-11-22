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


}

