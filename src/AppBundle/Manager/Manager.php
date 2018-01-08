<?php


namespace AppBundle\Manager;


use Doctrine\ORM\EntityManager;

/**
 * Class Manager
 * @package AppBundle\Manager
 */
abstract class Manager
{
    /**
     * @var EntityManager
     */
    protected $doctrine;

    /**
     * Manager constructor.
     *
     * @param EntityManager $doctrine
     */
    public function __construct(EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

}