<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $birth
 * @property int|null $class
 *
 */
class Student extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birth'], 'safe'],
            [['name', 'class'], 'string', 'max' => 255],
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
            'birth' => 'Születési idő',
            'class' => 'Csoport',
        ];
    }

    /**
     * Gets query for [[StudentHasCaregiver]].
     *
     * @return ActiveQuery
     */
    public function getStudentHasCaregivers()
    {
        return $this->hasMany(StudentHasCaregiver::class, ['student_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getAllStudentIdWithName()
    {
        $students = self::find()->all();
        foreach ($students as $student) {
            $idWithNamMap[$student->id] =  $student->name;
        }
        return $idWithNamMap;
    }
}
