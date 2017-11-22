<?php


namespace AppBundle\Provider;


interface ProviderStrategy
{
    public function getAll():array;

    public function getSingle(int $id);
}