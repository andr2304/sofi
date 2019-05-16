<?php
/**
 * Created by PhpStorm.
 * User: iadmin
 * Date: 16.05.2019
 * Time: 10:06
 */

namespace backend\forms\shop\manage;


use common\models\shop\ShopTags;
use yii\base\Model;

class TagForm extends Model
{
    public $name;
    public $slug;

    private $_tag;

    public function __construct(ShopTags $model = null, $config = [])
    {
        if(!empty($model)){
            $this->name = $model->name;
            $this->slug = $model->slug;
            $this->_tag = $model;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['name', 'slug'], 'unique', 'targetClass' => ShopTags::class, 'filter' => $this->_tag ? ['<>', 'id', $this->_tag->id] : null]
        ];
    }
}