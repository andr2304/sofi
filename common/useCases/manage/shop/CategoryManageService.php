<?php

namespace common\useCases\manage\shop;



use backend\forms\shop\CategoryForm;
use common\models\Meta;
use common\models\shop\ShopCategories;
use common\repositories\Shop\CategoryRepository;
use common\repositories\Shop\ProductRepository;

class CategoryManageService
{
    private $categories;
    private $products;

    public function __construct(CategoryRepository $categories, ProductRepository $products)
    {
        $this->categories = $categories;
        $this->products = $products;
    }

    public function create(CategoryForm $form): ShopCategories
    {
        $parent = $this->categories->get($form->parentId);
        $category = ShopCategories::create(
            $form->name,
            $form->slug,
            $form->title,
            $form->description,
            new Meta(
                $form->meta->title,
                $form->meta->description,
                $form->meta->keywords
            )
        );
        $category->appendTo($parent);
        $this->categories->save($category);
        return $category;
    }

    public function edit($id, CategoryForm $form): void
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        $category->edit(
            $form->name,
            $form->slug,
            $form->title,
            $form->description,
            new Meta(
                $form->meta->title,
                $form->meta->description,
                $form->meta->keywords
            )
        );
        if ($form->parentId !== $category->parent->id) {
            $parent = $this->categories->get($form->parentId);
            $category->appendTo($parent);
        }
        $this->categories->save($category);
    }

    public function moveUp($id): void
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        if ($prev = $category->prev) {
            $category->insertBefore($prev);
        }
        $this->categories->save($category);
    }

    public function moveDown($id): void
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        if ($next = $category->next) {
            $category->insertAfter($next);
        }
        $this->categories->save($category);
    }

    public function remove($id): void
    {
        $category = $this->categories->get($id);
        $this->assertIsNotRoot($category);
        if ($this->products->existsByMainCategory($category->id)) {
            throw new \DomainException('Unable to remove category with products.');
        }
        $this->categories->remove($category);
    }

    private function assertIsNotRoot(ShopCategories $category): void
    {
        if ($category->isRoot()) {
            throw new \DomainException('Unable to manage the root category.');
        }
    }
}