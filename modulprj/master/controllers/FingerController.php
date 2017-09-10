<?php

namespace modulprj\master\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\components\GcodeComponent;
use yii\helpers\Json;
use yii\web\UploadedFile;
use kartik\grid\GridView;
use kartik\date\DatePicker;
use kartik\helpers\Html;
use yii\bootstrap\Modal;

use modulprj\master\models\Karyawan;
use modulprj\master\models\KaryawanSearch;	    /* TABLE CLASS SEARCH */
use modulprj\master\models\Kar_finger;
use modulprj\master\models\Kar_fingerSearch;	    /* TABLE CLASS SEARCH */
  
use modulprj\master\models\Dept;
use modulprj\master\models\Cbg;
use modulprj\master\models\Machine;

class FingerController extends Controller
{
	/**
     * Before Action Index
     */
	public function beforeAction(){
			if (Yii::$app->user->isGuest)  {
				 Yii::$app->user->logout();
                   $this->redirect(array('/site/login'));  //
			}
            // Check only when the user is logged in
            if (!Yii::$app->user->isGuest)  {
               if (Yii::$app->session['userSessionTimeout']< time() ) {
                   // timeout
                   Yii::$app->user->logout();
                   $this->redirect(array('/site/login'));  //
               } else {
                   //Yii::$app->user->setState('userSessionTimeout', time() + Yii::app()->params['sessionTimeoutSeconds']) ;
				   Yii::$app->session->set('userSessionTimeout', time() + Yii::$app->params['sessionTimeoutSeconds']);
                   return true; 
               }
            } else {
                return true;
            }
    }
	
	public function aryDept(){ 
		return ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');
	}
	public function aryDeptId(){ 
		return ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');
	}
	public function aryCbg(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_NM','CAB_NM');
	}
	public function aryCbgId(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM');
	}
	
    public function actionIndex()
    {
        $paramCari=Yii::$app->getRequest()->getQueryParam('id');
		if ($paramCari!=''){
			$cari=['KAR_ID'=>$paramCari];			
		}else{
			$cari='';			
		};
		
		//print_r($cari);
		
		$searchModel = new KaryawanSearch($cari);
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$searchModelFinfer = new Kar_fingerSearch($cari);
		$dataProviderFinger = $searchModelFinfer->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider, 
			'searchModelFinfer' => $searchModelFinfer,
			'dataProviderFinger' => $dataProviderFinger,			
			'aryDeptId'=>$this->aryDeptId(),
			'aryCbgId'=>$this->aryCbgId(),
			'aryCbg'=>$this->aryCbg()			
        ]);
    }
	
	public function actionCreate($id){
		//return $id;
		$model=new Kar_finger();
		
		if ($model->load(Yii::$app->request->post())) {
			$hsl = \Yii::$app->request->post();
				$model->TerminalID = $hsl['Kar_finger']['TerminalID'];
				$model->KAR_ID = $hsl['Kar_finger']['KAR_ID'];
				$model->FingerPrintID = $hsl['Kar_finger']['FingerPrintID'];
				if ($model->save()){
					 return $this->redirect(['index','Kar_fingerSearch[KAR_ID]'=>$id]);
				}  
		}else{
			return $this->renderAjax('_form',[
				'id'=>$id,
				'model'=>$model
			]);
		}
	}
	
	// DEPDROP : TEMPORARY [tmpCab,tmpNm]
	public function actionSubcat() {
		$out = [];
		if (isset($_POST['depdrop_parents'])) {			
			$parents = $_POST['depdrop_parents'];
			//print_r($parents);
			if ($parents != null) {
				//$terminal_id = $parents[0]!=''?$parents[0]:'0';
				$terminal_id = $parents[0];
				// $dataMachine=Machine::find()->where(['TerminalID'=>$terminal_id])->one();
				if($terminal_id){
					//foreach ($dataMachine as $key => $value) {
						$out[] = ['id'=>$terminal_id,'name'=> $terminal_id];
					//};
				}else{
					$out[] = ['id'=>'','name'=> ''];
				};		
				echo Json::encode(['output'=>$out, 'selected'=>'']);
				return;
			}
		}
		echo Json::encode(['output'=>'', 'selected'=>'']);
	}
}
