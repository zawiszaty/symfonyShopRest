<?php


namespace AppBundle\Provider;


use AppBundle\Entity\Categories;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoriesProvider extends Provider implements ProviderStrategy
{

    public function getAll(): array
    {
        $categories = $this->_doctrine->getRepository(Categories::class)->findAll();
        return $categories;
    }

    public function getSingle(int $id): Categories
    {
        $category = $this->_doctrine->getRepository(Categories::class)->find($id);
        if (!$category)
            throw new NotFoundHttpException();
        return $category;
    }

}