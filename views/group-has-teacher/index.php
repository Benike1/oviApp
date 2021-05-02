<?php

use app\models\GroupHasTeacher;
use app\models\search\GroupHasTeacherSearch;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel GroupHasTeacherSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Csoportok - óvónők összerendelése';
?>
<div class="group-has-teacher-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Létrehozás', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'group_id',
                'value' => static function (GroupHasTeacher $model) {
                    return $model->group->name;
                }
            ],
            [
                'attribute' => 'teacher_id',
                'value' => static function (GroupHasTeacher $model) {
                    return $model->teacher->name;
                }
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{delete}'
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
