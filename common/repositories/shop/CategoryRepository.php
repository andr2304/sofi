<?php

namespace common\repositories\Shop;



use common\models\shop\ShopCategories;
use common\repositories\NotFoundException;

class CategoryRepository
{
    /*private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }*/

    public function get($id): ShopCategories
    {
        if (!$category = ShopCategories::findOne($id)) {
            throw new NotFoundException('Category is not found.');
        }
        return $category;
    }

    public function save(ShopCategories $category): void
    {
        if (!$category->save()) {
            throw new \RuntimeException('Saving error.');
        }
        //$this->dispatcher->dispatch(new EntityPersisted($category));
    }

    public function remove(ShopCategories $category): void
    {
        if (!$category->delete()) {
            throw new \RuntimeException('Removing error.');
        }
       // $this->dispatcher->dispatch(new EntityRemoved($category));
    }
}