<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "group".
 *
 * @property GroupHasStudent[] $groupHasStudents
 * @property Student[] $students
 * @property GroupHasTeacher[] $groupHasTeachers
 * @property Teacher[] $teachers
 */
class Group extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'integer'],
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
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[GroupHasStudents]].
     *
     * @return ActiveQuery
     */
    public function getGroupHasStudents()
    {
        return $this->hasMany(GroupHasStudent::className(), ['group_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['id' => 'student_id'])->viaTable('group_has_student', ['group_id' => 'id']);
    }

    /**
     * Gets query for [[GroupHasTeachers]].
     *
     * @return ActiveQuery
     */
    public function getGroupHasTeachers()
    {
        return $this->hasMany(GroupHasTeacher::className(), ['group_id' => 'id']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['id' => 'teacher_id'])->viaTable('group_has_teacher', ['group_id' => 'id']);
    }
}
