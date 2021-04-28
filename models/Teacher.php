<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $birth
 * @property string|null $city
 * @property int|null $postcode
 * @property string|null $street
 * @property int|null $house_number
 * @property int|null $distance_from
 *
 * @property GroupHasTeacher[] $groupHasTeachers
 * @property Group[] $groups
 */
class Teacher extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birth'], 'safe'],
            [['postcode', 'house_number', 'distance_from'], 'integer'],
            [['name', 'city', 'street'], 'string', 'max' => 255],
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
            'postcode' => 'Irányítószám',
            'street' => 'Utca',
            'city' => 'Város',
            'house_number' => 'Házszám',
            'distance_from' => 'Távolság a munkahelytől',
        ];
    }

    /**
     * Gets query for [[GroupHasTeachers]].
     *
     * @return ActiveQuery
     */
    public function getGroupHasTeachers()
    {
        return $this->hasMany(GroupHasTeacher::className(), ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id' => 'group_id'])->viaTable('group_has_teacher', ['teacher_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getAllTeacherIdWithName()
    {
        $teachers = self::find()->all();
        foreach ($teachers as $teacher) {
            $idWithNamMap[$teacher->id] = $teacher->name;
        }
        return $idWithNamMap ?? [];
    }
}
