<?php

use app\models\Student;
use app\models\StudentHasCaregiver;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Student */

$this->title = $model->name;
YiiAsset::register($this);
?>
<div class="student-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php foreach (StudentHasCaregiver::findAll(['student_id' => $model->id]) as $studentHasCaregiver) { ?>
            <?= Html::a($studentHasCaregiver->caregiver->name, ['caregiver/view', 'id' => $studentHasCaregiver->caregiver_id], ['class' => 'btn btn-success']) ?>
        <?php } ?>
        <?= Html::a('Összerendelés', ['create'], ['class' => 'btn btn-success']) ?>
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
            'name',
            'birth',
            'class',
        ],
    ]) ?>

</div>
