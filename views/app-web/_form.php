<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reporte */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeHiddenInput($model, 'tipo_reporte_id') ?>

    <?= Html::activeHiddenInput($model, 'latitud') ?>

    <?= Html::activeHiddenInput($model, 'longitud') ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entre_calles')->textInput(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>

</div>
