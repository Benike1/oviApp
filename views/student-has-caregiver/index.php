<?php

use yii\grid\ActionColumn;
use app\models\search\StudentHasCaregiverSearch;
use app\models\StudentHasCaregiver;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel StudentHasCaregiverSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Szülők és gyermekek összerendelése';
?>
<div class="student-has-caregiver-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Összerendelés', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
            [
                'class' => ActionColumn::class
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
