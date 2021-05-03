<?php

use app\models\Caregiver;
use app\models\StudentHasCaregiver;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Caregiver */

$this->title = $model->name;
YiiAsset::register($this);
?>
<div class="caregiver-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php foreach (StudentHasCaregiver::findAll(['caregiver_id' => $model->id]) as $studentHasCaregiver) { ?>
            <?= Html::a($studentHasCaregiver->student->name, ['student/view', 'id' => $studentHasCaregiver->student_id], ['class' => 'btn btn-success']) ?>
        <?php } ?>
        <?= Html::a('Összerendelés', ['student-has-caregiver/create'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Módosítás', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Biztosan törli a szülőt?',
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
            [
                'attribute' => 'students',
                'label' =>'Gyermeke(i)',
                'value' => static function (Caregiver $model) {
                    return implode(', ', $model->getStudentNames());
                }
            ],
        ],
    ]) ?>
</div>
