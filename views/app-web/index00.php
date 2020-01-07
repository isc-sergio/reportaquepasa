<?php

use yii\helpers\Html;
use yii\widgets\ListView;
//use app\models\CategoriaReporteSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoReporteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->name;
?>
<div class="web-app-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'itemOptions' => ['class' => 'col-12 col-md-4'],//my-3
            'itemView' => '_tipo_reporte_item',
        ]) ?>

        <!--<div class="col-4"></div>-->
    </div>

</div>

