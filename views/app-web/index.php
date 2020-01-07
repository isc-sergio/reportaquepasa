<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\components\BytesizeIcons;
//use app\models\CategoriaReporteSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppWebSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->name;
?>
<div class="app-web-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row mb-3">

    <div class="col offset-1">
        <?= Html::button(
            'Nuevo Reporte',
            ['class' => 'btn btn-primary btn-block']
        ) ?>
    </div>

    <div class="col-3">
        <?= Html::button(
            BytesizeIcons::getIcon('i-location'),
            ['v-on:click' => 'createMap', 'class' => 'btn btn-outline-success btn-block', 'aria-label' => 'ubicación']
        ) ?>
    </div>

    <div class="col-3">
        <?php //= Html::activeFileInput($model, 'foto', ['v-on:change' => 'changeFoto', 'ref' => 'foto_input', 'class' => 'd-none']) ?>
        <?= Html::fileInput('foto', null, ['v-on:change' => 'changeFoto', 'ref' => 'foto_input', 'class' => 'd-none']) ?>
        <?= Html::button(
            BytesizeIcons::getIcon('i-camera'),
            ['v-on:click' => 'selectFoto', 'class' => 'btn btn-outline-success btn-block', 'aria-label' => 'foto']
        ) ?>
    </div>

    </div>

    <div v-show="map_show" id="app-web-map" class="mb-3" style="height: 255px; margin-left: -15px; margin-right: -15px;"></div>

    <p v-if="foto_show"><img v-bind:src="foto_src" class="img-fluid"></p>

    <div class="row">
        <div class="col-12 col-md-9 col-lg-8">

        <div v-for="tipo_reporte in tipos_reporte" class="pt-3 border-top">
            <div class="row">
                <div class="col-4">
                    <img v-bind:src="tipo_reporte.src" alt="" class="img-fluid rounded">
                </div>
                <div class="col-8">
                    <h4 class="mb-0">{{tipo_reporte.nombre}}</h4>
                    <p class="mb-2 text-info text-monospace small">
                        {{tipo_reporte.atendidos}} atendidos
                    </p>
                    <p>{{tipo_reporte.descripcion}}</p>
                </div>
            </div>
            <div class="text-right text-muted small">
                {{tipo_reporte.unidad_responsable}}
                &nbsp; &nbsp;
                {{tipo_reporte.categoria}}
            </div>
        </div>

        </div>
    </div>

</div>

