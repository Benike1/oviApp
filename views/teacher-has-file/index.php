<?php

use app\models\TeacherHasFile;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TeacherHasFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Óvónők - fájlok összerendelése';
?>
<div class="teacher-has-file-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Összerendelés', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'teacher_id',
                'value' => static function (TeacherHasFile $model) {
                    return $model->teacher->name;
                }
            ],
            [
                'attribute' => 'file_id',
                'value' => static function (TeacherHasFile $model) {
                    return $model->file->name;
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
