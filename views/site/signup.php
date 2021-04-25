<?php

use app\models\SignupForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model SignupForm */

$this->registerJs("jQuery('#reveal_password').change(function(){jQuery('#signupform-password').attr('type',this.checked?'text':'password');})");
$this->registerJs("jQuery('#reveal_password_repeat').change(function(){jQuery('#signupform-password_repeat').attr('type',this.checked?'text':'password');})");

?>
<div class="site-signup">
    <h1>Regisztráció!</h1>
    <p>A regisztráláshoz töltse ki a mezőket!</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'signupform']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
            <div class="row">
                <div class="col-lg-8">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
                    <?= Html::checkbox('reveal_password', false, ['id' => 'reveal_password']) ?> <?= Html::label('Mutasd a jelszót ', 'reveal_password') ?>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                </div>
                    <?= Html::checkbox('reveal_password_repeat', false, ['id' => 'reveal_password_repeat']) ?> <?= Html::label('Mutasd a jelszót ', 'reveal_password_repeat') ?>
            </div>
                <div class="form-group">
                    <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
