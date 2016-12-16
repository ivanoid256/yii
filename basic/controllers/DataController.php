<?php

namespace app\controllers;

use Yii;
use app\models\Data;
use app\models\DataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataController implements the CRUD actions for Data model.
 */
class DataController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new DataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        $model = new Data();
        $years = $model->find()->select('`id`, YEAR(`date`) as year , Count(*) as cnt')
        	->groupBy('YEAR(`date`)')->orderBy('YEAR(`date`)')->asArray()->all(); // ->toArray(['id','year']);
        $months = $model->find()
        	->select('Year(`date`) as year, MONTH(`date`) as month, Count(*) as cnt')
        	->groupBy('MONTH(`date`)')
        	->orderBy('Year(`date`), Month(`date`)')->asArray()->all(); //->toArray(['year','month','cnt']);
        	
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	'years' => $years,
        	'months' => $months,
        	'err' => $searchModel->filterDataErr,
        ]);
    }

}
