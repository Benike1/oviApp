<?php

use app\models\GroupHasTeacher;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model GroupHasTeacher */

$this->title = $model->group->name . ' ' . $model->teacher->name . 'módosítása';
?>
<div class="group-has-teacher-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
