<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppWebSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="app-web-search">

    <?php echo Html::beginForm(['index'], 'get'); ?>

    <div class="form-row form-group">

    <div class="col-3 col-md-2">
        <?= Html::a(
            Html::img('@web/feather/camera.svg', ['class' => 'feather']) . ' foto',
            ['create'], ['class' => 'btn btn-light btn-block']
        ) ?>
    </div>

    <div class="col-9 col-lg-7">
        <div class="input-group form-group">
            <?= Html::activeTextInput($model, 'q', ['placeholder' => 'tipo de reporte', 'class' => 'form-control']) ?>
            <div class="input-group-append">
                <?= Html::submitButton(
                    Html::img('@web/feather/search.svg', ['class' => 'feather', 'alt' => 'buscar']),
                    ['class' => 'btn btn-primary', 'aria-label' => 'buscar']
                ) ?>
            </div>
        </div>
    </div>

    </div>

    <?php echo Html::endForm(); ?>

</div>
