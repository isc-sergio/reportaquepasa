<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Reporte */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Crear Reporte';
//$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporte-create">

    <div class="row no-gutters">
        <div class="col-4 mr-1">
            <label for="reporte-foto" class="btn btn-light btn-block">
                <?= Html::img('@web/feather/camera.svg', ['class' => 'feather']) ?>
                foto
            </label>
            <?= Html::activeFileInput($model, 'foto', ['class' => 'd-none']) ?>
        </div>

        <div class="col ml-1">
            <div class="input-group form-group">
                <?= Html::activeTextInput($model, 'foto', ['placeholder' => 'tipo de reporte', 'class' => 'form-control']) ?>
                <div class="input-group-append">
                    <?= Html::button(
                        Html::img('@web/feather/search.svg', ['class' => 'feather', 'alt' => 'buscar']),
                        ['class' => 'btn btn-primary', 'aria-label' => 'buscar']
                    ) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-4 mr-1">
            <?= Html::img('@web/tipo_reporte/1.jpg', ['class' => 'img-fluid rounded']) ?>
        </div>

        <div class="col ml-1">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                'itemOptions' => ['class' => 'my-3'],
                'itemView' => '_tipo_reporte_item',
            ]) ?>
        </div>
    </div>

    <?php /*= $this->render('_form', [
        'model' => $model,
    ])*/ ?>

</div>
