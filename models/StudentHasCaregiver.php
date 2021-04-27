<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "student_has_caregiver".
 *
 * @property int $student_id
 * @property int|null $caregiver_id
 *
 * @property Caregiver $caregiver
 * @property Student $student
 */
class StudentHasCaregiver extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_has_caregiver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['caregiver_id','student_id'], 'integer'],
            [['caregiver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Caregiver::class, 'targetAttribute' => ['caregiver_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Óvodás',
            'caregiver_id' => 'Gondviselő',
        ];
    }

    /**
     * Gets query for [[Caregiver]].
     *
     * @return ActiveQuery
     */
    public function getCaregiver()
    {
        return $this->hasOne(Caregiver::class, ['id' => 'caregiver_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }
}
