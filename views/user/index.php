<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="user-index">
    <h1>Felhasználók</h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'username',
            'email:email',
            ['class' => ActionColumn::class],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
