<?php


namespace AppBundle\Provider;


use AppBundle\Entity\Categories;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CategoriesProvider
 * @package AppBundle\Provider
 */
class CategoriesProvider extends Provider implements ProviderInterface
{

    /**
     * This method return all categories
     *
     * @return array
     */
    public function getAll(): array
    {
        $categories = $this->_doctrine->getRepository(Categories::class)->findAll();

        return $categories;
    }

    /**
     * This method return one category
     *
     * @param int $id
     * @return Categories
     */
    public function getSingle(int $id): Categories
    {
        $category = $this->_doctrine->getRepository(Categories::class)->find($id);

        if (!$category)
            throw new NotFoundHttpException();

        return $category;
    }

}