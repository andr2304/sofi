<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "shop_products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $created_at
 * @property string $code
 * @property string $name
 * @property string $description
 * @property int $price_old
 * @property int $price_new
 * @property string $rating
 * @property string $meta_json
 * @property int $main_photo_id
 * @property int $status
 * @property int $weight
 * @property int $quantity
 *
 * @property ShopCategoryAssignments[] $shopCategoryAssignments
 * @property ShopCategories[] $categories
 * @property ShopModifications[] $shopModifications
 * @property ShopPhotos[] $shopPhotos
 * @property ShopCategories $category
 * @property ShopPhotos $mainPhoto
 * @property ShopRelatedAssignments[] $shopRelatedAssignments
 * @property ShopRelatedAssignments[] $shopRelatedAssignments0
 * @property ShopProducts[] $relateds
 * @property ShopProducts[] $products
 * @property ShopReviews[] $shopReviews
 * @property ShopTagAssignments[] $shopTagAssignments
 * @property ShopTags[] $tags
 * @property ShopValues[] $shopValues
 * @property ShopCharacteristics[] $characteristics
 */
class ShopProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'created_at', 'code', 'name', 'status', 'weight', 'quantity'], 'required'],
            [['category_id', 'created_at', 'price_old', 'price_new', 'main_photo_id', 'status', 'weight', 'quantity'], 'integer'],
            [['description', 'meta_json'], 'string'],
            [['rating'], 'number'],
            [['code', 'name'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['main_photo_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopPhotos::className(), 'targetAttribute' => ['main_photo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
            'price_old' => 'Price Old',
            'price_new' => 'Price New',
            'rating' => 'Rating',
            'meta_json' => 'Meta Json',
            'main_photo_id' => 'Main Photo ID',
            'status' => 'Status',
            'weight' => 'Weight',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopCategoryAssignments()
    {
        return $this->hasMany(ShopCategoryAssignments::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(ShopCategories::className(), ['id' => 'category_id'])->viaTable('shop_category_assignments', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopModifications()
    {
        return $this->hasMany(ShopModifications::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopPhotos()
    {
        return $this->hasMany(ShopPhotos::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ShopCategories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainPhoto()
    {
        return $this->hasOne(ShopPhotos::className(), ['id' => 'main_photo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopRelatedAssignments()
    {
        return $this->hasMany(ShopRelatedAssignments::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopRelatedAssignments0()
    {
        return $this->hasMany(ShopRelatedAssignments::className(), ['related_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelateds()
    {
        return $this->hasMany(ShopProducts::className(), ['id' => 'related_id'])->viaTable('shop_related_assignments', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(ShopProducts::className(), ['id' => 'product_id'])->viaTable('shop_related_assignments', ['related_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopReviews()
    {
        return $this->hasMany(ShopReviews::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopTagAssignments()
    {
        return $this->hasMany(ShopTagAssignments::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(ShopTags::className(), ['id' => 'tag_id'])->viaTable('shop_tag_assignments', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopValues()
    {
        return $this->hasMany(ShopValues::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasMany(ShopCharacteristics::className(), ['id' => 'characteristic_id'])->viaTable('shop_values', ['product_id' => 'id']);
    }
}
