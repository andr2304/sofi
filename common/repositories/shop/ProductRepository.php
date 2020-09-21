<?php

namespace common\repositories\Shop;


use common\models\shop\ShopProducts;
use common\repositories\NotFoundException;

class ProductRepository
{
   /* private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }*/

    public function get($id): ShopProducts
    {
        if (!$product = ShopProducts::findOne($id)) {
            throw new NotFoundException('Product is not found.');
        }
        return $product;
    }

    /*public function existsByBrand($id): bool
    {
        return ShopProducts::find()->andWhere(['brand_id' => $id])->exists();
    }*/

    public function existsByMainCategory($id): bool
    {
        return ShopProducts::find()->andWhere(['category_id' => $id])->exists();
    }

    public function save(ShopProducts $product): void
    {
        if (!$product->save()) {
            throw new \RuntimeException('Saving error.');
        }
        //$this->dispatcher->dispatchAll($product->releaseEvents());
        //$this->dispatcher->dispatch(new EntityPersisted($product));
    }

    public function remove(ShopProducts $product): void
    {
        if (!$product->delete()) {
            throw new \RuntimeException('Removing error.');
        }
        //$this->dispatcher->dispatchAll($product->releaseEvents());
        //$this->dispatcher->dispatch(new EntityRemoved($product));
    }
}