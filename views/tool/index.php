<?php

use yii\grid\ActionColumn;
use app\models\search\ToolSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel ToolSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Eszközök';
?>
<div class="tool-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Eszközök hozzáadása', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'description:ntext',
            'count',
            ['class' => ActionColumn::class],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
