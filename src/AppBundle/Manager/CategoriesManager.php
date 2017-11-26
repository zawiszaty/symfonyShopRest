<?php


namespace AppBundle\Manager;


use AppBundle\Entity\Categories;
use AppBundle\Entity\Products;

class CategoriesManager extends Manager
{
    public function add(array $params): bool
    {
        $category = new Categories();
        $category->setCategoryName($params['categoryName']);
        $this->doctrine->persist($category);
        $this->doctrine->flush();
        return true;
    }

    public function edit(Categories $old, array $params): bool
    {
        $old->setCategoryName($params['categoryName']);
        $this->doctrine->flush();
        return true;
    }

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