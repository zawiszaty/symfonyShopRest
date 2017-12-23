<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Orders", mappedBy="user", cascade={"remove"})
     */
    protected $products;



    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CustomerData", mappedBy="user", cascade={"remove"})
     */
    protected $customerdata;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getCustomerdata()
    {
        return $this->customerdata;
    }

    /**
     * @param mixed $customerdata
     */
    public function setCustomerdata($customerdata)
    {
        $this->customerdata = $customerdata;
    }
    
}