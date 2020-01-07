<?php

namespace app\controllers;

use Yii;
use app\models\AppWebSearch;
use app\models\Reporte;
use app\models\TipoReporteSearch;

class AppWebController extends \yii\web\Controller
{
    public $layout = 'app-web';

    public function actionIndex()
    {
        $searchModel = new AppWebSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Reporte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reporte();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $searchModel = new TipoReporteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('create', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
