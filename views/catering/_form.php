<?php

use app\models\Student;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Catering */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catering-form">
    <?php $form = ActiveForm::begin() ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'date')->widget(DatePicker::class,[
                'name' => 'datePicker',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
    </div>
    <?= $form->field($model, 'studentIds')->widget(Select2::class, [
    'data' => Student::getAllStudentIdWithName(),
    'options' => ['placeholder' => 'Csoport'],
    'pluginOptions' => [
    'allowClear' => true,
    'multiple' => true
    ],
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
