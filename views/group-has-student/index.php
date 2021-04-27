<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GroupHasStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Csoportok és óvódások összerendelése';
?>
<div class="group-has-student-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Create Group Has Student', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'group_id',
            'student_id',
            [
                    'class' => ActionColumn::class
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
