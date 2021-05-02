<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $age_group
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
            [['description'], 'string'],
            [['name', 'age_group'], 'string', 'max' => 255],
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
            'description' => 'Leírás',
            'age_group' => 'Csoport',
        ];
    }

    /**
     * Gets query for [[GroupHasStudents]].
     *
     * @return ActiveQuery
     */
    public function getGroupHasStudents()
    {
        return $this->hasMany(GroupHasStudent::class, ['group_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::class, ['id' => 'student_id'])->viaTable('group_has_student', ['group_id' => 'id']);
    }

    /**
     * Gets query for [[GroupHasTeachers]].
     *
     * @return ActiveQuery
     */
    public function getGroupHasTeachers()
    {
        return $this->hasMany(GroupHasTeacher::class, ['group_id' => 'id']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::class, ['id' => 'teacher_id'])->viaTable('group_has_teacher', ['group_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getAllGroupIdWithName()
    {
        $groups = self::find()->all();
        foreach ($groups as $group) {
            $idWithNamMap[$group->id] = $group->name;
        }
        return $idWithNamMap??[];
    }

    /**
     * @return array|null[]|string[]
     */
    public function getStudentNames()
    {
        $students = $this->getStudents()->all();
        if (!$students) {
            return [];
        }
        return array_map(static function (Student $student) {
            return $student->name;
        }, $students);
    }
    /**
     * @return array|null[]|string[]
     */
    public function getTeacherNames()
    {
        $teachers = $this->getTeachers()->all();
        if (!$teachers) {
            return [];
        }
        return array_map(static function (Teacher $teacher) {
            return $teacher->name;
        }, $teachers);
    }
}
