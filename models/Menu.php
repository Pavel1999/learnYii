<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property string $id
 * @property string $fid_parent
 * @property string $menu_title
 * @property string $menu_link
 *
 * @property Menu $fidParent
 * @property Menu[] $menus
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid_parent'], 'integer'],
            [['menu_title', 'menu_link'], 'required'],
            [['menu_title', 'menu_link'], 'string', 'max' => 255],
            [['fid_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['fid_parent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid_parent' => 'Fid Parent',
            'menu_title' => 'Menu Title',
            'menu_link' => 'Menu Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFidParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'fid_parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['fid_parent' => 'id']);
    }
}
