<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\File */

$this->title = $model->name;
?>
<div class="file-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Módosítás', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Biztosan törlöd ezt a file-t?',
                'method' => 'post',
            ],
        ]) ?>
        <?php if (!$model->isNewRecord) { ?>
            <?= Html::a('Download file', ['download', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            'filename',
        ],
    ]) ?>

</div>
