<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $form ActiveForm */
/* @var $resetLink string */

?>
<div class="site-reset-password">
    <h4>Amennyiben biztos benne, hogy új jelszót generál, kattintson az "Új jelszó generálása!" gombra!</h4>
    <button><?= Html::a('Új jelszó generálása!', Html::encode($resetLink)) ?></button>
</div>
