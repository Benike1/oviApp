<?php

use app\models\Group;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = $model->name . ' csoport';
?>
<div class="group-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Jelenléti ív', ['generate-pdf', 'group_id' => $model->id], ['class' => 'btn btn-default', 'target'=>'_blank', 'data-toggle'=>'tooltip']) ?>
        <?= Html::a('Módosítás', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Biztosan törli a csoportot?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'age_group',
            'description',
            [
                'attribute' => 'teachers',
                'label' => 'Óvónők',
                'value' => static function (Group $model) {
                    return implode(', ', $model->getTeacherNames());

                }
            ],
            [
                'attribute' => 'students',
                'label' => 'Gyerekek',
                'value' => static function (Group $model) {
                    return implode(', ', $model->getStudentNames());

                }
            ],
        ],
    ]) ?>
</div>
