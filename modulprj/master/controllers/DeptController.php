<?php
namespace modulprj\master\controllers;

/* VARIABLE BASE YII2 Author: -YII2- */
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use modulprj\master\models\DeptSearch;
use modulprj\master\models\Grading;
use modulprj\master\models\Kepangkatan;
use modulprj\master\models\GradingSearch;
use modulprj\master\models\KepangkatanSearch;

/**
 * HRD | CONTROLLER EMPLOYE .
 */
class DeptController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['Agama']),
                'actions' => [
                    //'delete' => ['post'],
					'save' => ['post'],
                ],
            ],
        ];
    }

    /**
     * ACTION INDEX
     */
    public function actionIndex()
    {
		/*	Department */
        $searchModel_Dept= new DeptSearch();
	    $dataProvider_Dept = $searchModel_Dept->search(Yii::$app->request->queryParams);
		
		/*	Kepangkatan */
        $searchModel_Gf= new KepangkatanSearch();
	    $dataProvider_Gf = $searchModel_Gf->search(Yii::$app->request->queryParams);
		
		/*	Grading */
        $searchModel_Grading= new GradingSearch();
	    $dataProvider_Grading = $searchModel_Grading->search(Yii::$app->request->queryParams);
		
		return $this->render('index',[
			/*	Department */
            'searchModel_Dept'=>$searchModel_Dept,
            'dataProvider_Dept'=>$dataProvider_Dept,
			/*	Kepangkatan */
			'searchModel_Gf'=>$searchModel_Gf,
            'dataProvider_Gf'=>$dataProvider_Gf,
			/*	Grading */
			'searchModel_Grading'=>$searchModel_Grading,
            'dataProvider_Grading'=>$dataProvider_Grading,
        ]);
    }
	
	public function actionCreateDept(){
		$modal = new  Dept();
		return $this->renderAjax('_formDept',['modal'=>$modal]);		
	}
	public function actionCreateGf(){
		$modal = new  Kepangkatan();
		return $this->renderAjax('_formGf',['modal'=>$modal]);		
	}
	public function actionCreateGrading(){
		$modal = new  Grading();
		return $this->renderAjax('_formGrading',['modal'=>$modal]);		
	}
	
	
	
}
