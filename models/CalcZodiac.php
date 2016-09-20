<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calc_zodiac".
 *
 * @property string $id
 * @property string $title_z
 * @property string $color_z
 * @property string $material_z
 */
class CalcZodiac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calc_zodiac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_z', 'color_z', 'material_z'], 'required'],
            [['title_z', 'color_z', 'material_z'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_z' => 'Title Z',
            'color_z' => 'Color Z',
            'material_z' => 'Material Z',
        ];
    }
}
