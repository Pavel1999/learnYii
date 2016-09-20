<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $fid_category
 * @property string $fid_section
 * @property string $title
 * @property string $descr
 * @property string $articul
 * @property double $price
 * @property string $link
 * @property string $date_add
 * @property string $img_path_small
 * @property string $img_path_full
 * @property string $fid_age
 *
 * @property ProductSpecificList[] $productSpecificLists
 * @property Categorys $fidCategory
 * @property Sections $fidSection
 * @property CalcAge $fidAge
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid_category', 'fid_section', 'title', 'descr', 'articul', 'price', 'link', 'img_path_small', 'img_path_full', 'fid_age'], 'required'],
            [['fid_category', 'fid_section', 'fid_age'], 'integer'],
            [['descr'], 'string'],
            [['price'], 'number'],
            [['date_add'], 'safe'],
            [['title', 'link', 'img_path_small', 'img_path_full'], 'string', 'max' => 255],
            [['articul'], 'string', 'max' => 20],
            [['fid_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categorys::className(), 'targetAttribute' => ['fid_category' => 'id']],
            [['fid_section'], 'exist', 'skipOnError' => true, 'targetClass' => Sections::className(), 'targetAttribute' => ['fid_section' => 'id']],
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
            'fid_category' => 'Fid Category',
            'fid_section' => 'Fid Section',
            'title' => 'Title',
            'descr' => 'Descr',
            'articul' => 'Articul',
            'price' => 'Price',
            'link' => 'Link',
            'date_add' => 'Date Add',
            'img_path_small' => 'Img Path Small',
            'img_path_full' => 'Img Path Full',
            'fid_age' => 'Fid Age',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSpecificLists()
    {
        return $this->hasMany(ProductSpecificList::className(), ['fid_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFidCategory()
    {
        return $this->hasOne(Categorys::className(), ['id' => 'fid_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFidSection()
    {
        return $this->hasOne(Sections::className(), ['id' => 'fid_section']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFidAge()
    {
        return $this->hasOne(CalcAge::className(), ['id' => 'fid_age']);
    }
}
