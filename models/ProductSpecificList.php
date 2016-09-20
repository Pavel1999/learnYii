<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_specific_list".
 *
 * @property string $id
 * @property string $fid_product
 * @property string $fid_specific
 * @property string $value
 *
 * @property Products $fidProduct
 * @property ProductSpecific $fidSpecific
 */
class ProductSpecificList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_specific_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid_product', 'fid_specific', 'value'], 'required'],
            [['fid_product', 'fid_specific'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['fid_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['fid_product' => 'id']],
            [['fid_specific'], 'exist', 'skipOnError' => true, 'targetClass' => ProductSpecific::className(), 'targetAttribute' => ['fid_specific' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid_product' => 'Fid Product',
            'fid_specific' => 'Fid Specific',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFidProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'fid_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFidSpecific()
    {
        return $this->hasOne(ProductSpecific::className(), ['id' => 'fid_specific']);
    }
}
