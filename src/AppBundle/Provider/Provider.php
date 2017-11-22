<?php


namespace AppBundle\Provider;


use Doctrine\ORM\EntityManager;

class Provider
{
    protected $_doctrine;

    public function __construct(EntityManager $doctrine)
    {
        $this->_doctrine = $doctrine;
    }
}