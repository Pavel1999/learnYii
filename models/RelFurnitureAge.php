<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_furniture_age".
 *
 * @property string $id
 * @property string $fid_age
 * @property string $description
 *
 * @property CalcAge $fidAge
 */
class RelFurnitureAge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_furniture_age';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid_age', 'description'], 'required'],
            [['fid_age'], 'integer'],
            [['description'], 'string'],
            [['fid_age'], 'exist', 'skipOnError' => true, 'targetClass' => CalcAge::className(), 'targetAttribute' => ['fid_age' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid_age' => 'Fid Age',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFidAge()
    {
        return $this->hasOne(CalcAge::className(), ['id' => 'fid_age']);
    }
}
