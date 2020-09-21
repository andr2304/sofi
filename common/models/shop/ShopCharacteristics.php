<?php

namespace common\models\shop;

use Yii;

/**
 * This is the model class for table "shop_characteristics".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $required
 * @property string $default
 * @property array $variants_json
 * @property int $sort
 *
 * @property ShopValues[] $shopValues
 * @property ShopProducts[] $products
 */
class ShopCharacteristics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_characteristics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'required', 'variants_json', 'sort'], 'required'],
            [['required', 'sort'], 'integer'],
            [['variants_json'], 'safe'],
            [['name', 'default'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 16],
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
            'type' => 'Type',
            'required' => 'Required',
            'default' => 'Default',
            'variants_json' => 'Variants Json',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopValues()
    {
        return $this->hasMany(ShopValues::className(), ['characteristic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(ShopProducts::className(), ['id' => 'product_id'])->viaTable('shop_values', ['characteristic_id' => 'id']);
    }
}
