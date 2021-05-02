<?php

namespace app\models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $birth
 * @property string|null $gender
 * @property int|null $edu_id
 * @property int|null $ssn_id
 *
 * @property GroupHasStudent[] $groupHasStudents
 * @property Group[] $groups
 * @property StudentHasCaregiver[] $studentHasCaregivers
 * @property-read ActiveQuery $caregiver
 * @property-read array $groupNames
 * @property-read null[]|null|array|string[] $caregiverNames
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
            [['name', 'gender', 'edu_id', 'ssn_id'], 'string', 'max' => 255],
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
            'gender' => 'Nem',
            'birth' => 'Születési idő',
            'edu_id' => 'OM azonosító',
            'ssn_id' => 'TAJ szám',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getGroupHasStudents()
    {
        return $this->hasMany(GroupHasStudent::class, ['student_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getGroups()
    {
        return $this->hasMany(Group::class, ['id' => 'group_id'])->viaTable('group_has_student', ['student_id' => 'id']);
    }


    public function getGroupNames()
    {
        $groups = $this->getGroupHasStudents()->all();
        if (!$groups) {
            return [];
        }
        return array_map(static function (GroupHasStudent $hasGroups) {
            return $hasGroups->group->name;
        }, $groups);
    }

    /**
     * @return ActiveQuery
     */
    public function getStudentHasCaregivers()
    {
        return $this->hasMany(StudentHasCaregiver::class, ['student_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCaregiver()
    {
        return $this->getStudentHasCaregivers()->andWhere(['caregiver.caregiver' => true]);
    }

    /**
     * @return array|null[]|string[]|null
     */
    public function getCaregiverNames()
    {
        $caregivers = $this->getStudentHasCaregivers()->all();
        if (!$caregivers) {
            return [];
        }
        return array_map(static function (StudentHasCaregiver $hasCaregiver) {
            return $hasCaregiver->caregiver->name;
        }, $caregivers);
    }

    /**
     * @return array
     */
    public static function getAllStudentIdWithName()
    {
        $students = self::find()->all();
        foreach ($students as $student) {
            $idWithNamMap[$student->id] = $student->name;
        }
        return $idWithNamMap ?? [];
    }
}
