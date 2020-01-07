<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\components\BytesizeIcons;

/* @var $this yii\web\View */
/* @var $model app\models\AppWebSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="app-web-search">

    <?php echo Html::beginForm(['index'], 'get'); ?>

    <div class="form-row">

    <div class="form-group col">
        <div class="input-group">
            <?= Html::activeTextInput($model, 'q', ['v-model' => 'q', 'placeholder' => 'tipo de reporte', 'class' => 'form-control']) ?>
            <div class="input-group-append">
                <?= Html::submitButton(
                    BytesizeIcons::getIcon('i-search'),
                    ['class' => 'btn btn-primary', 'aria-label' => 'buscar']
                ) ?>
            </div>
        </div>
    </div>

    <div class="form-group col-2">
        <?= Html::button(
            BytesizeIcons::getIcon('i-location'),
            ['v-on:click' => 'createMap', 'class' => 'btn btn-outline-success btn-block', 'aria-label' => 'ubicación']
        ) ?>
    </div>

    <div class="form-group col-2">
        <?= Html::activeFileInput($model, 'foto', ['v-on:change' => 'changeFoto', 'ref' => 'foto_input', 'class' => 'd-none']) ?>
        <?= Html::button(
            BytesizeIcons::getIcon('i-camera'),
            ['v-on:click' => 'selectFoto', 'class' => 'btn btn-outline-success btn-block', 'aria-label' => 'foto']
        ) ?>
    </div>

    </div>

    <?php echo Html::endForm(); ?>

</div>
