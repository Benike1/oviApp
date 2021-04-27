<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Óvónők';
?>
<div class="teacher-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Óvónő hozzáadása', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'birth',
            'city',
            'postcode',
            'street',
            'house_number',
            'distance_from',
            [
                    'class' => ActionColumn::class
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
