<?php

use app\models\StudentHasCaregiver;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

$this->title = $model->name;
YiiAsset::register($this);
?>
<div class="caregiver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php foreach (StudentHasCaregiver::findAll(['student_id' => $model->id]) as $studentHasCaregiver) { ?>
            <?= Html::a($studentHasCaregiver->student->name, ['student/view', 'id' => $studentHasCaregiver->student_id], ['class' => 'btn btn-success']) ?>
        <?php } ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'caregiver',
            'city',
            'postcode',
            'street',
            'house_number',
            'email:email',
            'phone',
            'phone_home',
        ],
    ]) ?>

</div>
