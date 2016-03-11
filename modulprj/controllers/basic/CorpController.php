<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\controllers\basic;

/* VARIABLE BASE YII2 Author: -YII2- */
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
use  modulprj\models\basic\Corp;			/* TABLE CLASS JOIN */
use  modulprj\models\basic\CorpSearch;		/* TABLE CLASS SEARCH */
	
/**
 * HRD | CONTROLLER EMPLOYE .
 */
class CorpController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['Corp']),
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
        $searchModel_Corp = new CorpSearch();
	    $dataProvider_Corp = $searchModel_Corp->search(Yii::$app->request->queryParams);
		
		return $this->render('index',[
            'searchModel_Corp'=>$searchModel_Corp,
            'dataProvider_Corp'=>$dataProvider_Corp,
        ]);
    }
	
}
