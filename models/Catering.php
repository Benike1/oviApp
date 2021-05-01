<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "catering".
 *
 * @property int $id
 * @property string|null $date
 * @property-read null[]|string[] $studentNames
 * @property array $students
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
            [['date', 'studentIds'], 'safe'],
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
            'studentIds' => 'Students',
        ];
    }

    /**
     * @return array
     */
    public function getStudentNames(): array
    {
        $studentNames = [];

        if (!$this->studentIds){
            return $studentNames;
        }
        foreach ($this->studentIds as $studentId) {
            $studentNames[] = Student::findOne(['id' =>$studentId])->name;
        }
        return $studentNames;

    }
}
