<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_specific".
 *
 * @property string $id
 * @property string $title
 *
 * @property ProductSpecificList[] $productSpecificLists
 */
class ProductSpecific extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_specific';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSpecificLists()
    {
        return $this->hasMany(ProductSpecificList::className(), ['fid_specific' => 'id']);
    }
}
