<?php

namespace  modulprj\master\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \DateTime;
use yii\helpers\Json;
use yii\web\Response;
use yii\web\Request;
use yii\helpers\Url;

use modulprj\master\models\Personallog;
use modulprj\master\models\PersonallogSearch;
use modulprj\master\models\Kar_finger;
use modulprj\master\models\Kar_fingerSearch;
use modulprj\master\models\Karyawan;
use modulprj\master\models\Machine;


class AbsenMaintainController extends Controller
{
	public function aryMesin(){ 
		return ArrayHelper::map(Machine::find()->all(), 'MESIN_NM','MESIN_NM');
	}
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['post'],
					'save' => ['post'],
                ],
            ],
        ];
    }
	
    /**
     * Before Action Index
	 * @author ptrnov  <piter@lukison.com>
	 * @since 1.1
     */
	public function beforeAction($action){
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
	
    public function actionIndex()
    {
		$date=new DateTime();
		$thn=strlen($date->format('Y'));
		$bln=strlen($date->format('m'));
		$hri=strlen($date->format('d'));
		$dateRlt=$thn."-".$bln."-".$hri;
		$searchModel = new PersonallogSearch([
			'tgllog'=>Yii::$app->ambilKonvesi->tglSekarang()
		]);
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		//$queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
        //$queryParams["PersonallogSearch"]["tgllog"]=Yii::$app->ambilKonvesi->tglSekarang();//	Yii::$app->ambilKonvesi->tglSekarang();//$dateRlt;//"2016-02-22";// date('Y-m-d');//"2016-02-22" ;date("Y-mm-dd");//      
        //$dataProvider = $searchModel->search($queryParams);
		
		$searchModelLate = new PersonallogSearch([
			'tgllate'=>Yii::$app->ambilKonvesi->tglSekarang()
		]);
        $dataProviderLate = $searchModelLate->search_telat(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider, 
			'searchModelLate' => $searchModelLate,
            'dataProviderLate' => $dataProviderLate,
			'aryMesin'=>$this->aryMesin(),
        ]);
    }

	/*
	 * Set Finger to EmpID | Employe 
	 * @author ptrnov [piter@lukison]
	 * @since 1.2
	*/
	public function actionFingerEmp($m,$f)
    {
		
		$modelView = Personallog::find()->where(['TerminalID'=>$m,'UserID'=>$f])->one();
        $model = new Kar_finger();
		$searchModel = new Kar_fingerSearch([
			'KAR_ID'=>$modelView->empId
		]);
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['index']);
        } else {
            return $this->renderAjax('_form_karfinger', [
                'model' => $model,
				'modelView'=>$modelView,
				'searchModel'=>$searchModel,
				'dataProvider'=>$dataProvider
            ]);
       }
    }
	
	public function actionFingerEmpSave()
    {
		$model = new Kar_finger();
		
		if(Yii::$app->request->isAjax){
				$model->load(Yii::$app->request->post());
				return Json::encode(\yii\widgets\ActiveForm::validate($model));
		}else{		
			if($model->load(Yii::$app->request->post())){
				$hsl = \Yii::$app->request->post();
				$teminal= $hsl['Kar_finger']['TerminalID'];
				$finger= $hsl['Kar_finger']['FingerPrintID'];
				$karid= $hsl['Kar_finger']['KAR_ID'];
				
				
				$modelUpdate = Kar_finger::findOne(['TerminalID'=>$teminal,'FingerPrintID'=>$finger]); 
				
				//if (!Yii::$app->user->isGuest){			
					/* print_r($modelUpdate);
					if ($modelUpdate->NO_URUT!=''){
						echo  $teminal;
					}else{
						echo  $karid;
						
					} */
					
					/*ADD NEW*/
					
						//return $this->redirect(['index']);
						if ($modelUpdate->NO_URUT!=''){					
							if ($modelUpdate->load(Yii::$app->request->post()) && $modelUpdate->validate()) {
									$modelUpdate->save();
									return $this->redirect(['index']);
							}											
						}else{
							//UPDATE
							if($model->load(Yii::$app->request->post()) && $model->validate()){                  
										//$model->CREATED_BY = Yii::$app->user->identity->username;
										//$model->CREATED_AT = date('Y-m-d H:i:s');
										$model->save();    
								return $this->redirect(['index']);									
							}						
						} 
			}
		}
		//}
    }
	
	/**
     * DepDrop CABANG | KARYAWAN
     * @author ptrnov  <piter@lukison.com>
     * @since 1.1
     */
	public function actionCabangDeptEmploye() {
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if ($parents != null) {
				$cab_id = $parents[0];
				$dep_id = $parents[1];
				//$model = Karyawan::find()->asArray()->where(['CAB_ID'=>$cab_id,'DEP_ID'=>$dep_id])->all();
				$model = Karyawan::find()->asArray()->where("CAB_ID=".$cab_id." AND DEP_ID=".$dep_id." AND KAR_STS<>3")->all();
				foreach ($model as $key => $value) {
					   $out[] = ['id'=>$value['KAR_ID'],'name'=> $value['KAR_NM']];
				   }

				   echo json_encode(['output'=>$out, 'selected'=>'']);
				   return;
			   }
		   }
		   echo Json::encode(['output'=>'', 'selected'=>'']);
	}
	
	
	
	
	
	/**
     * Displays a single Sot2 model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sot2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sot2();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sot2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sot2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($m,$f,$e)
    {
		//echo $m.'-'.$f.'-'.$e;
		$modelDel =  Kar_finger::find()->where(['TerminalID'=>$m,'FingerPrintID'=>$f,'KAR_ID'=>$e])->one();
		Kar_finger::findOne($modelDel->NO_URUT)->delete();
		//print_r($modelDel);
		//die();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Sot2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sot2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sot2::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
