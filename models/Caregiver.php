<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "caregiver".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $caregiver
 * @property string|null $birth
 * @property int|null $postcode
 * @property string|null $address
 * @property string|null $street
 * @property string|null $house_number
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $phone_home
 *
 * @property StudentHasCaregiver[] $studentHasCaregivers
 */
class Caregiver extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caregiver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['caregiver', 'postcode'], 'integer'],
            [['birth'], 'safe'],
            [['name', 'address', 'street', 'house_number', 'email', 'phone', 'phone_home'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Név',
            'caregiver' => 'Gondozó',
            'birth' => 'Születési idő',
            'postcode' => 'Irányítószám',
            'address' => 'Cím',
            'street' => 'Street',
            'house_number' => 'House Number',
            'email' => 'Email',
            'phone' => 'Phone',
            'phone_home' => 'Phone Home',
        ];
    }

    /**
     * Gets query for [[StudentHasCaregivers]].
     *
     * @return ActiveQuery
     */
    public function getStudentHasCaregivers()
    {
        return $this->hasMany(StudentHasCaregiver::className(), ['caregiver_id' => 'id']);
    }
}
