<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoReporte */

$this->title = 'Crear Tipo de Reporte';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Reporte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-reporte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
