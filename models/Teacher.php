<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $birth
 * @property int|null $postcode
 * @property string|null $address
 * @property string|null $street
 * @property string|null $house_number
 * @property string|null $distance_from
 */
class Teacher extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birth'], 'safe'],
            [['postcode'], 'integer'],
            [['name', 'address', 'street', 'house_number', 'distance_from'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'birth' => 'Birth',
            'postcode' => 'Postcode',
            'address' => 'Address',
            'street' => 'Street',
            'house_number' => 'House Number',
            'distance_from' => 'Distance From',
        ];
    }
}
