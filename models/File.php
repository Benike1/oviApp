<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $filename
 * @property string|null $upload_path
 *
 * @property TeacherHasFile[] $teacherHasFiles
 * @property Teacher[] $teachers
 */
class File extends ActiveRecord
{
    /** @var UploadedFile */
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false],
            [['description', 'upload_path'], 'string'],
            [['name', 'filename'], 'string', 'max' => 255],
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
            'filename' => 'Fájlnév',
            'upload_path' => 'Feltöltés helye',
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->upload_path = 'uploads/' . $this->file->baseName . '.' . $this->file->extension;
            $this->filename = $this->file->baseName;
            $this->file->saveAs('uploads' . DIRECTORY_SEPARATOR . $this->file->baseName . '.' . $this->file->extension);
            return true;
        }

        return false;
    }

    /**
     * Gets query for [[TeacherHasFiles]].
     *
     * @return ActiveQuery
     */
    public function getTeacherHasFiles()
    {
        return $this->hasMany(TeacherHasFile::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::class, ['id' => 'teacher_id'])->viaTable('teacher_has_file', ['file_id' => 'id']);
    }
}
