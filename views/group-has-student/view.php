<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GroupHasStudent */

$this->title = $model->group->name . ' - ' . $model->student->name . 'vizsgálata';

?>
<div class="group-has-student-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
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
            'group_id',
            'student_id',
        ],
    ]) ?>
</div>
