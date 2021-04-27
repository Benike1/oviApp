<?php


use app\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $this View */
/* @var $form ActiveForm */
/* @var $model LoginForm */

$this->registerJs("jQuery('#reveal_password').change(function(){jQuery('#loginform-password').attr('type',this.checked?'text':'password');})");

?>
<div class="site-login">
    <div class="col-lg-offset-2 col-lg-8">
        <h1>Bejelentkezés!</h1>
        A bejelentkezéshez írja be a felhasználónevét és jelszavát!
    </div>
    <?php $form = ActiveForm::begin([
        'id' => 'loginform',
        'options' => [
            'class' => 'form-horizontal'
        ],
        'layout' => 'horizontal',
    ]) ?>

    <div class="col-lg-8">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Felhasználónév') ?>
    </div>
    <div class="col-lg-8">
        <?= $form->field($model, 'password')->passwordInput() ?>
    </div>
    <div class="col-lg-offset-2 col-lg-8">
        <?= Html::checkbox('reveal_password', false, ['id' => 'reveal_password']) ?> <?= Html::label('Mutasd a jelszót ', 'reveal_password') ?>
    </div>
    <div class="col-lg-8">
        <?= $form->field($model, 'rememberMe')->checkbox()->label('Emlékezz rám') ?>
    </div>
    <div class="col-lg-offset-2 col-lg-8" style="color:#999;">
        Elfelejtett jelszó visszaállítása <?= Html::a('itt', ['site/request-password-reset']) ?>!
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-8" style="margin-top: 20px">
            <?= Html::submitButton('Bejelentkezés', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
