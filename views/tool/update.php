<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tool */

$this->title = 'Eszköz módosítása: ' . $model->name;
?>
<div class="tool-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
