<?php
use yii\helpers\Html;

/* @var $model app\models\TipoReporte */
?>
<h3><?= Html::encode($model->nombre) ?></h3>

<p><?= Html::encode($model->descripcion) ?></p>

<?= Html::img('@web/tipo_reporte/' . $model->id . '.jpg', ['class' => 'img-fluid rounded']) ?>

<hr>