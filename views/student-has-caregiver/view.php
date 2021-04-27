<?php

use app\models\StudentHasCaregiver;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model StudentHasCaregiver */

$this->title = $model->student->name . ', ' . $model->caregiver->name;
YiiAsset::register($this);
?>
<div class="student-has-caregiver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'student_id' => $model->student_id, 'caregiver_id' => $model->caregiver_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'student_id' => $model->student_id, 'caregiver_id' => $model->caregiver_id], [
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
                'attribute' => 'student_id',
                'value' => static function (StudentHasCaregiver $model) {
                    return $model->student->name;
                }
            ],
            [
                'attribute' => 'caregiver_id',
                'value' => static function (StudentHasCaregiver $model) {
                    return $model->caregiver->name;
                }
            ],
        ],
    ]) ?>

</div>
