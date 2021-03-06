<?php


namespace AppBundle\Manager;


use AppBundle\Entity\Categories;
use AppBundle\Entity\Products;

/**
 * Class CategoriesManager
 * @package AppBundle\Manager
 */
class CategoriesManager extends Manager
{
    use ManagerTrait;

    /**
     * This method added new Category
     *
     * @param array $params
     * @return bool
     */
    public function add(array $params): bool
    {
        $category = new Categories();
        $category->setCategoryName($params['category_name']);

        $this->doctrine->persist($category);
        $this->doctrine->flush();

        return true;
    }

    /**
     * This method edit existing category
     *
     * @param Categories $old
     * @param array $params
     * @return bool
     */
    public function edit(Categories $old, array $params): bool
    {
        $old->setCategoryName($params['category_name']);
        $this->doctrine->flush();
        return true;
    }

    /**
     * This method del existing category
     *
     * @param $id
     * @return bool
     */
    public function del($id): bool
    {
        $products = $this->doctrine->getRepository(Products::class)->findBy(['brandsbrand'=> $id]);
        $defaultCategory = $this->doctrine->getRepository(Categories::class)->find(1);

        foreach ($products as $item)
        {
            $item->setCategoriescategory($defaultCategory);
        }

        $deleteCategory = $this->doctrine->getRepository(Categories::class)->find($id);

        $this->doctrine->remove($deleteCategory);
        $this->doctrine->flush();

        return true;
    }
}