<?php

use app\models\GroupHasStudent;
use app\models\search\GroupHasStudentSearch;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel GroupHasStudentSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Csoportok és óvódások összerendelése';
?>
<div class="group-has-student-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Összerendelés', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'group_id',
                'value' => static function (GroupHasStudent $model) {
                    return $model->group->name;
                }
            ],
            [
                'attribute' => 'student_id',
                'value' => static function (GroupHasStudent $model) {
                    return $model->student->name;
                }
            ],
            [
                    'class' => ActionColumn::class
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
