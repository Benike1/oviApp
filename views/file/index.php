<?php

use app\models\search\FileSearch;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel FileSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Fájlok';
?>
<div class="file-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Fájl feltöltése', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'description:ntext',
            'filename',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>

</div>
