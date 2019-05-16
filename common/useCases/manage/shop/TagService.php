<?php
/**
 * Created by PhpStorm.
 * User: iadmin
 * Date: 16.05.2019
 * Time: 10:18
 */

namespace common\useCases\manage\shop;


use backend\forms\shop\manage\TagForm;
use common\models\shop\ShopTags;
use common\repositories\shop\manage\TagRepository;

class TagService
{
    public $repository;

    public function __construct(TagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(TagForm $form){
        $model = ShopTags::create(
            $form->name,
            $form->slug
        );
        $this->repository->save($model);
        return $model;
    }

    public function edit(ShopTags $model,TagForm $form){
        $model->edit(
            $form->name,
            $form->slug
        );
        $this->repository->save($model);
    }
}