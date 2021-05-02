<?php

use app\models\GroupHasStudent;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model GroupHasStudent */

$this->title = $model->group->name . ' - ' . $model->student->name;

?>
<div class="group-has-student-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a($model->group->name, ['group/view', 'id' => $model->group_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a($model->student->name, ['student/view', 'id' => $model->student_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Módosítás', ['update', 'group_id' => $model->group_id, 'student_id' => $model->student_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'group_id' => $model->group_id, 'student_id' => $model->student_id], [
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
                'value' => static function (GroupHasStudent $model) {
                    return $model->group->name;
                }
            ],
            [
                'attribute' => 'student_id',
                'value' => static function (GroupHasStudent $model) {
                    return $model->student->name;
                }
            ],
        ],
    ]) ?>
</div>
