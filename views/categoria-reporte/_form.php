<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaReporte */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="categoria-reporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destacado')->dropDownList(Yii::$app->formatter->booleanFormat)->hint('fijo al comienzo de la lista') ?>

<?php if (!$model->isNewRecord): ?>
    <?= $form->field($model, 'activo')->dropDownList(Yii::$app->formatter->booleanFormat) ?>
<?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
