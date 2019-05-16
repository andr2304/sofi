<?php
/**
 * Created by PhpStorm.
 * User: iadmin
 * Date: 16.05.2019
 * Time: 11:01
 */

namespace common\repositories\shop\manage;


use common\models\shop\ShopTags;

class TagRepository
{
    public function save(ShopTags $tags){
        if(!$tags->save()){
            throw new \RuntimeException('Save error');
        }
    }
}