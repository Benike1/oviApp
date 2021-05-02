<?php

use app\models\TeacherHasFile;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model TeacherHasFile */

$this->title = $model->teacher->name . ' ' . $model->file->name;
?>.
<div class="teacher-has-file-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a($model->file->name, ['caregiver/view', 'id' => $model->file_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a($model->teacher->name, ['student/view', 'id' => $model->teacher_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Módosítás', ['update', 'teacher_id' => $model->teacher_id, 'file_id' => $model->file_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'teacher_id' => $model->teacher_id, 'file_id' => $model->file_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teacher_id',
            'file_id',
        ],
    ]) ?>

</div>
