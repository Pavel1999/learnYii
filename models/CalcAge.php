<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calc_age".
 *
 * @property string $id
 * @property integer $min
 * @property integer $max
 *
 * @property Products[] $products
 * @property RelFurnitureAge[] $relFurnitureAges
 */
class CalcAge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calc_age';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['min', 'max'], 'required'],
            [['min', 'max'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min' => 'Min',
            'max' => 'Max',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['fid_age' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelFurnitureAges()
    {
        return $this->hasMany(RelFurnitureAge::className(), ['fid_age' => 'id']);
    }
}
