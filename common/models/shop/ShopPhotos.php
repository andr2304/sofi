<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "shop_photos".
 *
 * @property int $id
 * @property int $product_id
 * @property string $file
 * @property int $sort
 *
 * @property ShopProducts $product
 * @property ShopProducts[] $shopProducts
 */
class ShopPhotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'file', 'sort'], 'required'],
            [['product_id', 'sort'], 'integer'],
            [['file'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopProducts::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'file' => 'File',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ShopProducts::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopProducts()
    {
        return $this->hasMany(ShopProducts::className(), ['main_photo_id' => 'id']);
    }
}
