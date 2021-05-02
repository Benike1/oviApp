<?php

use app\models\Catering;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CateringSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Étkeztetés';
?>
<div class="catering-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Nap létrehozása', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
                    return implode(', ', $model->getStudentNames($model->non_price_ids));
                }
            ],
            [
                'attribute' => 'teacher_ids',
                'value' => static function (Catering $model) {
                    return implode(', ', $model->getTeacherNames($model->teacher_ids));
                }
            ],
            [
                'class' => ActionColumn::class
            ]
        ]
    ]) ?>
    <?php Pjax::end(); ?>
</div>
