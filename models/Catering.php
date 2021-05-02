<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Catering
 * @package app\models
 * @property int $id [int(11)]
 * @property string $date [date]
 * @property array $full_price_ids [json]
 * @property array $half_price_ids [json]
 * @property array $non_price_ids [json]
 * @property array $teacher_ids [json]
 */
class Catering extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catering';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'full_price_ids', 'half_price_ids', 'non_price_ids', 'teacher_ids'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'full_price_ids' => 'Teljes árúak',
            'half_price_ids' => 'Kedvezményesek (50%)',
            'non_price_ids' => 'Ingyenesek',
            'teacher_ids' => 'Dolgozók',
        ];
    }

    /**
     * @param array $student_ids
     * @return array
     */
    public function getStudentNames(array $student_ids): array
    {
        $studentNames = [];

        if (!$student_ids) {
            return $studentNames;
        }
        foreach ($student_ids as $studentId) {
            $studentNames[] = Student::findOne(['id' => $studentId])->name;
        }
        return $studentNames;
    }

    /**
     * @param array $teacher_ids
     * @return array
     */
    public function getTeacherNames(array $teacher_ids): array
    {
        $teacherNames = [];

        if (!$teacher_ids) {
            return $teacherNames;
        }
        foreach ($teacher_ids as $teacherId) {
            $teacherNames[] = Teacher::findOne(['id' => $teacherId])->name;
        }
        return $teacherNames;
    }
}
