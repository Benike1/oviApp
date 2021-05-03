<?php

use app\models\Catering;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Catering */

$this->title = $model->date. ' nap étkeztetése';
?>
<div class="catering-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Módosítás', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'id' => $model->id], [
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
            'date',
            [
                'attribute' => 'full_price_ids',
                'value' => static function (Catering $model) {
                    return implode(', ', $model->getStudentNames($model->full_price_ids));
                }
            ],
            [
                'attribute' => 'half_price_ids',
                'value' => static function (Catering $model) {
                    return implode(', ', $model->getStudentNames($model->half_price_ids));
                }
            ],
            [
                'attribute' => 'non_price_ids',
                'value' => static function (Catering $model) {
        $names = implode(', ', $model->getStudentNames($model->non_price_ids));
                    return $names??[];
                }
            ],
            [
                'attribute' => 'teacher_ids',
                'value' => static function (Catering $model) {
                    return implode(', ', $model->getTeacherNames($model->teacher_ids))??[];
                }
            ],
        ],
    ]) ?>
</div>
