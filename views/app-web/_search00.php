<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoReporteSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="tipo-reporte-webapp-search">

    <?php echo Html::beginForm(['index'], 'get'); ?>

    <div class="form-row form-group">

        <div class="col-3 col-md-2">
            <label for="foto" class="btn btn-light btn-block">foto</label>
            <?= Html::fileInput('foto', null, ['id' => 'foto', 'class' => 'form-control-file d-none']) ?>
        </div>

        <div class="col-6 col-md-5 col-lg-5">
            <?= Html::activeTextInput($model, 'q', ['placeholder' => 'comentario', 'class' => 'form-control']) ?>
        </div>

        <div class="col-3 col-md-2 col-lg-1">
            <?= Html::submitButton('ubicar', ['class' => 'btn btn-outline-primary btn-block']) ?>
        </div>

    </div>

    <?php //= Html::activeHiddenInput($model, 'categoria') ?>
    <?php //= Html::activeHiddenInput($model, 'etiquetas') ?>

    <?php echo Html::endForm(); ?>

</div>
