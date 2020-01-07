<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaReporteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorías para Reporte';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-reporte-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Categoría para Reporte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => ['class' => 'yii\bootstrap4\LinkPager'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'destacado:boolean',
            'activo:boolean',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => ['update' => function ($url, $model, $key) {
                    return Html::a('abrir', $url, ['data-pjax' => '0']);
                }],
            ],
        ],
    ]); ?>


</div>
