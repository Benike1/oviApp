<?php

use app\models\ResetPasswordForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model ResetPasswordForm */

$this->title = 'Jelszó visszaállítása!';
?>
<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Írja be az új jelszót!</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Jelszó') ?>
                <div class="form-group">
                    <?= Html::submitButton('Mentés', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
