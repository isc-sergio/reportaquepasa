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

    <div class="form-group">
        <div class="input-group">
            <?= Html::activeTextInput($model, 'q', ['v-model' => 'q', 'placeholder' => 'tipo de reporte', 'class' => 'form-control']) ?>
            <div class="input-group-append">
                <?= Html::button(
                    BytesizeIcons::getIcon('i-search'),
                    ['v-on:click' => 'search', 'class' => 'btn btn-info', 'aria-label' => 'buscar']
                ) ?>
            </div>
        </div>
    </div>

    <?php echo Html::endForm(); ?>

</div>
