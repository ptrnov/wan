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
use  modulprj\master\models\Agama;			/* TABLE CLASS JOIN */
use  modulprj\master\models\AgamaSearch;		/* TABLE CLASS SEARCH */
	
/**
 * HRD | CONTROLLER EMPLOYE .
 */
class AgamaController extends Controller
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
		/*	variable content View Employe Author: -ptr.nov- */
        $searchModel_Agama = new AgamaSearch();
	    $dataProvider_Agama = $searchModel_Agama->search(Yii::$app->request->queryParams);
		
		return $this->render('index',[
            'searchModel_Agama'=>$searchModel_Agama,
            'dataProvider_Agama'=>$dataProvider_Agama,
        ]);
    }
	
}
