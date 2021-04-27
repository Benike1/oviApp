<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CaregiverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Szülők';
?>
<div class="caregiver-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Szülő hozzáadása', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'caregiver:boolean',
            'email:email',
            'phone',
            'phone_home',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
