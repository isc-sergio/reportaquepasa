<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoReporteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Reporte';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-reporte-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tipo de Reporte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'categoria',
            'orden',
            'publico:boolean',
            'activo:boolean',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => ['view' => function ($url, $model, $key) {
                    return Html::a('abrir', $url, ['data-pjax' => '0']);
                }],
            ],
        ],
    ]); ?>


</div>
