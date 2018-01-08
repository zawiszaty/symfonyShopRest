<?php


namespace AppBundle\Provider;


use Doctrine\ORM\EntityManager;

/**
 * Class Provider
 * @package AppBundle\Provider
 */
class Provider
{
    /**
     * @var EntityManager entity manager object
     */
    protected $_doctrine;

    /**
     * Provider constructor.
     *
     * @param EntityManager $doctrine doctrine object
     */
    public function __construct(EntityManager $doctrine)
    {
        $this->_doctrine = $doctrine;
    }
}