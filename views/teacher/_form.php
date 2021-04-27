<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">
    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-lg-6">
        <?= $form->field($model, 'birth')->widget(DatePicker::class,[
            'name' => 'datePicker',
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>
    </div>
</div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'city')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'postcode')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'house_number')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'distance_from')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
