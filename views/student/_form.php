<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'studentid')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999999999'])->label('Student ID') ?>
    
    <?= $form->field($model, 'country')->widget(Select2::classname(), [
    'data' => $country,
    'options' => ['placeholder' => 'Select a country ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ])
    ?>

    <?= $form->field($model, 'course')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
