<?php

use app\models\GroupHasTeacher;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model GroupHasTeacher */

$this->title = $model->group->name;
?>
<div class="group-has-teacher-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a($model->group->name, ['caregiver/view', 'id' => $model->group_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a($model->teacher->name, ['student/view', 'id' => $model->teacher_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Módosítás', ['update', 'group_id' => $model->group_id, 'teacher_id' => $model->teacher_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'group_id' => $model->group_id, 'teacher_id' => $model->teacher_id], [
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
            [
                'attribute' => 'group_id',
                'value' => static function (GroupHasTeacher $model) {
                    return $model->group->name;
                }
            ],
            [
                'attribute' => 'teacher_id',
                'value' => static function (GroupHasTeacher $model) {
                    return $model->teacher->name;
                }
            ],
        ],
    ]) ?>

</div>
