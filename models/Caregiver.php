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
 * @property string|null $city
 * @property int|null $postcode
 * @property string|null $street
 * @property string|null $house_number
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $phone_home
 *
 * @property StudentHasCaregiver[] $studentHasCaregivers
 * @property-read null[]|array|string[] $studentNames
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
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => __CLASS__, 'message' => 'Ez az emailcím már foglalt!'],
            [['caregiver', 'postcode'], 'integer'],
            [['name', 'city', 'street', 'house_number', 'phone', 'phone_home'], 'string', 'max' => 255],
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
            'caregiver' => 'Gondviselő',
            'birth' => 'Születési idő',
            'city' => 'Város',
            'postcode' => 'Irányítószám',
            'street' => 'Utca',
            'house_number' => 'Házszám',
            'email' => 'Email cím',
            'phone' => 'Mobiltelefonszám',
            'phone_home' => 'Telefonszám (vezetékes)',
        ];
    }

    /**
     * Gets query for [[StudentHasCaregivers]].
     *
     * @return ActiveQuery
     */
    public function getStudentHasCaregivers()
    {
        return $this->hasMany(StudentHasCaregiver::class, ['caregiver_id' => 'id']);
    }

    /**
     * @return array|null[]|string[]
     */
    public function getStudentNames()
    {
        $students = $this->getStudentHasCaregivers()->all();
        if (!$students) {
            return [];
        }
        return array_map(static function (StudentHasCaregiver $student) {
            return $student->student->name;
        }, $students);
    }
    /**
     * @return array
     */
    public static function getAllCaregiverIdWithName()
    {
        $caregivers = self::find()->all();
        foreach ($caregivers as $caregiver) {
            $idWithNamMap[$caregiver->id] =  $caregiver->name;
        }
        return $idWithNamMap??[];
    }
}
