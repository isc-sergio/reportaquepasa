<?php

namespace app\controllers;

use Yii;
use app\models\AppWebSearch;
use yii\rest\Controller;
use yii\filters\auth\HttpBasicAuth;

/**
 * AppWebServiceController.
 */
class AppWebServiceController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];

        // add authentication filter
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'user' => Yii::$app->get('appwebservice'),
            'only' => ['create'],
            //'except' => ['options', 'login'], // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        ];

        return $behaviors;
    }

    /**
     * Lists all TipoReporte models.
     * @return mixed
     */
    public function actionTipoReporteIndex()
    {
        $searchModel = new AppWebSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $dataProvider;
    }
}