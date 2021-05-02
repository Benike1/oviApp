<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = 'Beállítás létrehozása';

?>
<div class="setting-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
