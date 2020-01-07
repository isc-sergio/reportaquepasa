<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Reporte */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Crear Reporte';
//$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

$bytesize = Yii::getAlias('@web/bytesize-symbols.min.svg') . '#';
?>
<div class="reporte-create">

    <div class="form-row">
        <div class="col">
            <div class="input-group form-group">
                <?= Html::textInput('foto', '', ['placeholder' => 'tipo de reporte', 'class' => 'form-control']) ?>
                <div class="input-group-append">
                    <?= Html::button(
                        '<svg class="i"><use href="' . $bytesize . 'i-search"></use></svg>',
                        ['class' => 'btn btn-primary', 'aria-label' => 'buscar']
                    ) ?>
                </div>
            </div>
        </div>

        <div class="col-2 form-group">
            <?= Html::button(
                '<svg class="i"><use href="' . $bytesize . 'i-location"></use></svg>',
                ['class' => 'btn btn-light btn-block', 'aria-label' => 'ubicacion']
            ) ?>
        </div>

        <div class="col-2 form-group">
            <?= Html::button(
                '<svg class="i"><use href="' . $bytesize . 'i-camera"></use></svg>',
                ['class' => 'btn btn-outline-secondary btn-block', 'aria-label' => 'foto']
            ) ?>
        </div>
    </div>

</div>
