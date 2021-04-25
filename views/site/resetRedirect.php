<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $form ActiveForm */
/* @var $resetLink string */

?>
<div class="site-reset-password">
    <div class="row">
        <p>Új jelszó generáláshoz kattintson <?= Html::a('ide', Html::encode($resetLink)) ?>!</p>
    </div>
</div>
