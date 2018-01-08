<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="customer_data_id_idx", columns={"customer_data_id"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var string
     *
     * @ORM\Column(name="order_description", type="string", length=255, nullable=true)
     */
    private $order_description;
    /**
     * @var string
     *
     * @ORM\Column(name="order_status", type="string", length=255, nullable=true, options={"default" : "submitted"}))
     */
    private $status = 'submitted';
    /**
     * @var integer
     *
     * @ORM\Column(name="idorders", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idorders;
    /**
     * @var string
     *
     * @ORM\Column(name="products", type="string", length=255), nullable=false)
     */
    private $products;
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", nullable=false)
     */
    private $user;
    /**
     * @var DeliveryMethod
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DeliveryMethod")
     * @ORM\JoinColumn(name="delivery_method", referencedColumnName="id")
     */
    private $deliveryMethod;
    /**
     * @var string
     *
     * @ORM\Column(name="orders_prize", type="integer", length=255), nullable=false)
     */
    private $ordersPrize;
    /**
     * @var string
     *
     * @ORM\Column(name="order_size", type="string", length=255))
     */
    private $orderSize;

    /**
     * @return string
     */
    public function getOrderDescription(): ?string
    {
        return $this->order_description;
    }

    /**
     * @param string $order_description
     */
    public function setOrderDescription(string $order_description)
    {
        $this->order_description = $order_description;
    }

    /**
     * @return mixed
     */
    public function getDeliveryMethod()
    {
        return $this->deliveryMethod;
    }

    /**
     * @param mixed $deliveryMethod
     */
    public function setDeliveryMethod($deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;
    }

    /**
     * @return string
     */
    public function getOrderSize(): string
    {
        return $this->orderSize;
    }

    /**
     * @param string $orderSize
     */
    public function setOrderSize(string $orderSize)
    {
        $this->orderSize = $orderSize;
    }

    /**
     * @return string
     */
    public function getOrdersPrize(): string
    {
        return $this->ordersPrize;
    }

    /**
     * @param string $ordersPrize
     */
    public function setOrdersPrize(string $ordersPrize)
    {
        $this->ordersPrize = $ordersPrize;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
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
    public function getProducts(): ?string
    {
        return $this->products;
    }

    /**
     * @param string $products
     */
    public function setProducts(string $products)
    {
        $this->products = $products;
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

