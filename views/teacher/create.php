<?php


/* @var $this View */
/* @var $model Teacher */

use app\models\Teacher;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Óvónő hozzáadása';

?>
<div class="teacher-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
