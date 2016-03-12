<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\master\controllers;

/* VARIABLE BASE YII2 Author: -YII2- */
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
use  modulprj\master\models\Cbg;			/* TABLE CLASS JOIN */
use  modulprj\master\models\CbgSearch;		/* TABLE CLASS SEARCH */
	
/**
 * HRD | CONTROLLER EMPLOYE .
 */
class CbgController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['Cbg']),
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
		/*	variable content View Employe Author: -ptr.nov- */
        $searchModel_Cbg = new CbgSearch();
	    $dataProvider_Cbg = $searchModel_Cbg->search(Yii::$app->request->queryParams);
		
		return $this->render('index',[
            'searchModel_Cbg'=>$searchModel_Cbg,
            'dataProvider_Cbg'=>$dataProvider_Cbg,
        ]);
    }
	
}
