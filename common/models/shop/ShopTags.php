<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "shop_tags".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 * @property ShopTagAssignments[] $shopTagAssignments
 * @property ShopProducts[] $products
 */
class ShopTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
        ];
    }

    public static function create($name, $slug){
        $model = new static();
        $model->name = $name;
        $model->slug = $slug;
        return $model;
    }

}
