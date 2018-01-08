<?php


namespace AppBundle\Provider;


/**
 * Interface ProviderStrategy
 * @package AppBundle\Provider
 */
interface ProviderStrategy
{
    /**
     * this method return all object form database
     *
     * @return array
     */
    public function getAll():array;

    /**
     * this method return one object from database
     *
     * @param int $id object id
     * @return mixed
     */
    public function getSingle(int $id);
}