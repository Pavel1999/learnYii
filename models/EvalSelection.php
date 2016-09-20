<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eval_selection".
 *
 * @property string $id
 * @property string $first_price
 * @property string $fid_calc_age
 * @property string $fid_calc_zodiac
 * @property string $fid_sections
 * @property string $products
 * @property string $products_favorite
 */
class EvalSelection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eval_selection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_price', 'fid_calc_age', 'fid_calc_zodiac', 'fid_sections', 'products'], 'required'],
            [['first_price', 'fid_calc_age', 'fid_calc_zodiac'], 'string', 'max' => 11],
            [['fid_sections', 'products', 'products_favorite'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_price' => 'First Price',
            'fid_calc_age' => 'Fid Calc Age',
            'fid_calc_zodiac' => 'Fid Calc Zodiac',
            'fid_sections' => 'Fid Sections',
            'products' => 'Products',
            'products_favorite' => 'Products Favorite',
        ];
    }
}
