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
 * @property StudentHasCaregiver $studentHasCaregiver
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
            [['class'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'class' => 'Class',
        ];
    }

    /**
     * Gets query for [[StudentHasCaregiver]].
     *
     * @return ActiveQuery
     */
    public function getStudentHasCaregiver()
    {
        return $this->hasOne(StudentHasCaregiver::className(), ['student_id' => 'id']);
    }
}
