<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $fid_products
 * @property double $price
 * @property string $email
 * @property string $phone
 * @property string $name
 * @property string $notice
 * @property string $date_order
 * @property string $date_send
 * @property string $date_pay
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid_products', 'price', 'email', 'phone', 'name', 'notice'], 'required'],
            [['fid_products', 'notice'], 'string'],
            [['price'], 'number'],
            [['date_order', 'date_send', 'date_pay'], 'safe'],
            [['email', 'phone', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid_products' => 'Fid Products',
            'price' => 'Price',
            'email' => 'Email',
            'phone' => 'Phone',
            'name' => 'Name',
            'notice' => 'Notice',
            'date_order' => 'Date Order',
            'date_send' => 'Date Send',
            'date_pay' => 'Date Pay',
        ];
    }
}
