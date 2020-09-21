<?php

namespace common\models\shop;

use common\models\Meta;
use Yii;

/**
 * This is the model class for table "shop_categories".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $meta_json
 * @property int $lft
 * @property int $rgt
 * @property int $depth
 *
 * @property ShopCategoryAssignments[] $shopCategoryAssignments
 * @property ShopProducts[] $products
 * @property ShopProducts[] $shopProducts
 */
class ShopCategories extends \yii\db\ActiveRecord
{
    public $meta;

    public static function create($name, $slug, $title, $description, Meta $meta): self
    {
        $category = new static();
        $category->name = $name;
        $category->slug = $slug;
        $category->title = $title;
        $category->description = $description;
        $category->meta = $meta;
        return $category;
    }

    public function edit($name, $slug, $title, $description, Meta $meta): void
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->title = $title;
        $this->description = $description;
        $this->meta = $meta;
    }

    public function getSeoTitle(): string
    {
        return $this->meta->title ?: $this->getHeadingTile();
    }

    public function getHeadingTile(): string
    {
        return $this->title ?: $this->name;
    }



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'lft', 'rgt', 'depth'], 'required'],
            [['description', 'meta_json'], 'string'],
            [['lft', 'rgt', 'depth'], 'integer'],
            [['name', 'slug', 'title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'description' => 'Description',
            'meta_json' => 'Meta Json',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopCategoryAssignments()
    {
        return $this->hasMany(ShopCategoryAssignments::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(ShopProducts::className(), ['id' => 'product_id'])->viaTable('shop_category_assignments', ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopProducts()
    {
        return $this->hasMany(ShopProducts::className(), ['category_id' => 'id']);
    }
}
