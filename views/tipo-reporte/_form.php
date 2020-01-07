<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use app\models\CategoriaReporteSearch;

/* @var $this yii\web\View */
/* @var $model app\models\TipoReporte */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="tipo-reporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->dropDownList(
        ArrayHelper::map(CategoriaReporteSearch::asArray(), 'nombre', 'nombre'),
        ['prompt' => ''],
    ) ?>

    <?= $form->field($model, 'etiquetas')->textInput(['maxlength' => true])->hint('
        mejora la búsqueda, no escribas signos de puntiación (, . ? etc.),
        no escribas pronombres (el, las, etc.), preposiciones (de, para, por, etc.) ni conjunciones (y, o),
        si ya está en el nombre, descripción o categoría, no lo agregues como etiqueta
    ') ?>

    <?= $form->field($model, 'publico')->dropDownList(Yii::$app->formatter->booleanFormat) ?>

    <?= $form->field($model, 'orden')->textInput()->hint('determina el orden en la lista') ?>

    <?= $form->field($model, 'unidad_responsable_reporte_id')->textInput() ?>

<?php if (!$model->isNewRecord): ?>
    <?= $form->field($model, 'activo')->dropDownList(Yii::$app->formatter->booleanFormat) ?>
<?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
