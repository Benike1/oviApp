<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beállítások';
?>
<div class="setting-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Létrehozás', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'value',
            'description:ntext',
            [
                    'class' => ActionColumn::class
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
