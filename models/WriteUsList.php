<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "write_us_list".
 *
 * @property string $id
 * @property string $time
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $text
 */
class WriteUsList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'write_us_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['name', 'email', 'phone', 'text'], 'required'],
            [['text'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'text' => 'Text',
        ];
    }
}
