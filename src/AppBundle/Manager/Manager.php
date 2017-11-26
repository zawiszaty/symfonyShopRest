<?php


namespace AppBundle\Manager;


use Doctrine\ORM\EntityManager;

abstract class Manager
{
    protected $doctrine;

    public function __construct(EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

}