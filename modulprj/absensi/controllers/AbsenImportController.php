<?php
namespace modulprj\absensi\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use kartik\widgets\Spinner;
use yii\bootstrap\Modal;
use \moonland\phpexcel\Excel;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\web\Response;
use yii\web\Request;
use kartik\form\ActiveForm;
use ptrnov\postman4excel\Postman4ExcelBehavior;
use modulprj\absensi\models\AbsenImport;
use modulprj\absensi\models\AbsenImportSearch;
use modulprj\absensi\models\AbsenImportFile;
use modulprj\absensi\models\AbsenImportTmp;
use modulprj\absensi\models\AbsenImportTmpSearch;
use modulprj\master\models\Karyawan;
use modulprj\master\models\Machine;
use modulprj\master\models\Kar_finger;
use modulprj\absensi\models\AbsenImportPeriode;
/**
 * AbsenImportController implements the CRUD actions for AbsenImport model.
 */
class AbsenImportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
			/*EXCEl IMPORT*/
			'export4excel' => [
				'class' => Postman4ExcelBehavior::className(),
				//'downloadPath'=>Yii::getAlias('@lukisongroup').'/cronjob/',
				//'downloadPath'=>'/var/www/backup/ExternalData/',
				'widgetType'=>'download',
			], 
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
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
	
    /**
     * Lists all AbsenImport models.
     * @return mixed
     */
    public function actionIndex()
    {
		// print_r(self::selisihWaktu('07:00','09:00'));
		// die();
		$paramFile=Yii::$app->getRequest()->getQueryParam('id');
		$paramx=Yii::$app->getRequest()->getQueryParam('idx');
		if ($paramFile){
			$dataModelImport=self::getArryFile($paramFile);//->getModels();
			if(!$dataModelImport){
				$js='$("#msg-erro-format").modal("show")';
				$this->getView()->registerJs($js);
			}else{
				
			}
		}else{
			if(!$paramx){
				//DELETE STOCK GUDANG | SO_TYPE=1
				
			}	
		};
		
        $searchModelTmp = new AbsenImportTmpSearch();
        $dataProviderTmp = $searchModelTmp->search(Yii::$app->request->queryParams);
		$searchModel = new AbsenImportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		//return self::getValidateDate('2017-12-12');
		//return self::getValidateDate('12-12-2017');
		//return date('Y-m-d', strtotime('2037-12-12')); //BUG di tahun 3038
		//return date('H:i:s', strtotime('10:00:00')); //BUG di tahun 3038
		//return checkdate('2017','12', '12');
		//getValidateTime
        return $this->render('index', [
			'searchModelTmp' => $searchModelTmp,
            'dataProviderTmp' => $dataProviderTmp,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,			
			'dataModelImport'=>$dataModelImport
        ]);
    }
	/**
     * TEMPORARY : CLEAR /HAPUS LIST 
     */
	public function actionClearTmp()
    {
        $cmd_clear=Yii::$app->db->createCommand("
				DELETE FROM absen_import_tmp;
		");
		$cmd_clear->execute();
		return $this->redirect(['index']);
    }
	/**
     * TEMPORARY : CREATE
     */
    public function actionCreatePeriode()
    {
        $modelPeriode = new AbsenImportPeriode();
		//$model->scenario='create';
        $modelPeriode = AbsenImportPeriode::find()->where(['TIPE'=>'0','AKTIF'=>'1'])->one();
		if ($modelPeriode->load(Yii::$app->request->post())) {
			$hsl = \Yii::$app->request->post();
				$modelPeriode->TGL_START = date('Y-m-d', strtotime($hsl['AbsenImportPeriode']['TGL_START']));
				$modelPeriode->TGL_END = date('Y-m-d', strtotime($hsl['AbsenImportPeriode']['TGL_END']));
				$modelPeriode->TIPE =0;
				$modelPeriode->AKTIF =1; 
				if ($modelPeriode->save()){
					//return $this->redirect(['index','#ai-tab1']);
				    return $this->redirect(['/absensi/absen-import#ai-tab0']);
				}  
		}else{
			return $this->renderAjax('_formPeriode', [
                'modelPeriode' => $modelPeriode,
            ]);
		
		} 
    } 
	
	/**
     * ACTUAL  : CHECKED LEMBURAN
     */
	public function actionCheckLemburan()
    {
      	if (Yii::$app->request->isAjax) {
          Yii::$app->response->format = Response::FORMAT_JSON;
          $request= Yii::$app->request;
          $idKode=$request->post('idKode');
          $dataKeySelect=$request->post('keysSelect');
          if ($dataKeySelect!=0){
			foreach ($dataKeySelect as $id) {
				  $items = AbsenImport::find()->where(['IN','STT_LEMBUR','0,1,7,8'])->one();
				  $items->STT_LEMBUR=1;
				  $items->save();
			}
		  }else{
			  $itemsOne = AbsenImport::find()->where(['ID'=>$idKode])->one();
			  $itemsOne->STT_LEMBUR=1;
			  $itemsOne->save();
		  }
        return true;
      }
    }
	
	/**
     * ACTUAL  : UN_CHECKED LEMBURAN
     */
	public function actionUncheckLemburan()
    {
      	if (Yii::$app->request->isAjax) {
			  Yii::$app->response->format = Response::FORMAT_JSON;
			  $request= Yii::$app->request;
			  $idKode=$request->post('idKode');
			  $dataKeySelect=$request->post('keysSelect');
			  if ($dataKeySelect==""){
					//foreach ($dataKeySelect as $id) {
						  // $items = AbsenImport::find()->where(['IN','STT_LEMBUR','0,1,7,8'])->one();
						  // $items->STT_LEMBUR=0;
						  // $items->save();
					//}
					$cmd_clear=Yii::$app->db->createCommand("
							UPDATE absen_import SET STT_LEMBUR=0 WHERE STT_LEMBUR=1;
					");
					$cmd_clear->execute();
					return true;
			  }else{
					$itemsOne = AbsenImport::find()->where(['ID'=>$idKode])->one();
					$itemsOne->STT_LEMBUR=0;
					$itemsOne->save();
					return true;
			  }
			
      }
    }
	
	/**
     * TEMP  : CHECKED OVER TIME LIMIT
     */
	public function actionCheckLimitTime()
    {
      	if (Yii::$app->request->isAjax) {
          Yii::$app->response->format = Response::FORMAT_JSON;
          $request= Yii::$app->request;
          $idKode=$request->post('idKode');
			$items = AbsenImportTmp::find()->where(['ID'=>$idKode])->one();
			$items->STT_LEMBUR =7;
			$items->save();
        return true;
      }
    }
	
	/**
     * TEMP  : CHECKED OVER TIME LIMIT
     */
	public function actionUncheckLimitTime()
    {
      	if (Yii::$app->request->isAjax) {
          Yii::$app->response->format = Response::FORMAT_JSON;
          $request= Yii::$app->request;
          $idKode=$request->post('idKode');
			$items = AbsenImportTmp::find()->where(['ID'=>$idKode])->one();
			$items->STT_LEMBUR =8;			
			$items->LEBIH_WAKTU= self::selisihWaktu('07:00',$items->OUT_WAKTU);
			$items->OUT_WAKTU ='07:00';
			$items->OUT_TGL= self::formulaTglOut('07:00',$items->IN_TGL);
			$items->save();
        return true;
      }
    }
	
	/**
     * TEMPORARY : CREATE
     */
    public function actionCreateTmp()
    {
        $model = new AbsenImportTmp();
		$model->scenario='create';
        
		if ($model->load(Yii::$app->request->post())) {
			$hsl = \Yii::$app->request->post();
				$model->TERMINAL_ID = $hsl['AbsenImportTmp']['TERMINAL_ID'];
				$model->FINGER_ID = $hsl['AbsenImportTmp']['FINGER_ID'];
				$model->IN_TGL = date('Y-m-d', strtotime($hsl['AbsenImportTmp']['tmpTglIn']));
				$model->IN_WAKTU = date('H:i:s', strtotime($hsl['AbsenImportTmp']['tmpTglIn']));
				$model->OUT_TGL = date('Y-m-d', strtotime($hsl['AbsenImportTmp']['tmpTglOut']));
				$model->OUT_WAKTU = date('H:i:s', strtotime($hsl['AbsenImportTmp']['tmpTglOut']));
				if ($model->save()){
					 //return $this->redirect(['index', 'idx' => $model->ID]);
					 return $this->redirect(['index']);
				}  
		}else{
			return $this->renderAjax('_form', [
                'model' => $model,
            ]);
		
		} 
		
		/* if (!$model->load(Yii::$app->request->post())) {
			 return $this->renderAjax('_form', [
                'model' => $model,
            ]);
		}else{
			if(Yii::$app->request->isAjax){
				$model->load(Yii::$app->request->post());
				return Json::encode(\yii\widgets\ActiveForm::validate($model));
			}else{
				$hsl = \Yii::$app->request->post();
				$model->TERMINAL_ID = $hsl['AbsenImportTmp']['TERMINAL_ID'];
				$model->FINGER_ID = $hsl['AbsenImportTmp']['FINGER_ID'];
				$model->IN_TGL = date('Y-m-d', strtotime($hsl['AbsenImportTmp']['tmpTglIn']));
				$model->IN_WAKTU = date('H:i:s', strtotime($hsl['AbsenImportTmp']['tmpTglIn']));
				$model->OUT_TGL = date('Y-m-d', strtotime($hsl['AbsenImportTmp']['tmpTglOut']));
				$model->OUT_WAKTU = date('H:i:s', strtotime($hsl['AbsenImportTmp']['tmpTglOut']));
				if ($model->save()){
					 return $this->redirect(['index', 'idx' => $model->ID]);
				}  
			}
        }; */
    } 
	
	/**
     * TEMPORARY : VALIDATION CREATE
     */
	public function actionValid()
    {
		$model = new AbsenImportTmp();
		$model->scenario=AbsenImportTmp::SCENARIO_EXIST;
        if(Yii::$app->request->isAjax && $model->load($_POST))
		{
		  Yii::$app->response->format = 'json';
		  return ActiveForm::validate($model);
		}
    }
	
	/**
     * TEMPORARY : IMPORT 
	 * PR Validation attribute -> actionViewValid
     */
    public function actionViewTmp($id)
    {
    	$model=$this->findModelTmp($id);
		//$model->scenario=AbsenImportTmp::SCENARIO_UPDATE;
		
		if (!$model->load(Yii::$app->request->post())) {
			return $this->renderAjax('_viewTmp', [
					'model' => $model
				]); 				
		}else{		
			
			if(Yii::$app->request->isAjax){				
				$model->load(Yii::$app->request->post());				
				return Json::encode(\yii\widgets\ActiveForm::validate($model));
			}else{
				if ($model->load(Yii::$app->request->post())) {
					if ($model->save()) {
						return $this->redirect(['index']);
					}			
				}
			}	
		}		
    }
	/**
     * TEMPORARY : IMPORT 
	 * Next PR
     */
	public function actionViewValid()
    {
		$model = new AbsenImportTmp();
		$model->scenario=AbsenImportTmp::SCENARIO_UPDATE;
        if(Yii::$app->request->isAjax && $model->load($_POST))
		{
		  Yii::$app->response->format = 'json';
		  return ActiveForm::validate($model);
		}
    } 
	
	/**
     * ACTUAL : VIEW 
     */
    public function actionSync()
    {
		$sql="SELECT sum(STATUS) FROM absen_import_tmp";		
		$sumStt=Yii::$app->db->createCommand($sql)->queryScalar();
		
		$model = new \yii\base\DynamicModel([
			'validationSave'
		]);			
		$model->addRule(['validationSave'], 'required');		
		
		if (!$model->load(Yii::$app->request->post())) {
			return $this->renderAjax('_msgSaveDb', [
					'model' => $model,
					'sumStt'=>$sumStt
				]); 				
		}else{
			$hsl = \Yii::$app->request->post();
			$textValidate = $hsl['DynamicModel']['validationSave'];			
			// print_r($kdPo);
			// die();
			if($textValidate=="setuju"){
				$sql="INSERT INTO absen_import (TERMINAL_ID,FINGER_ID,IN_TGL,IN_WAKTU,OUT_TGL,OUT_WAKTU,LEBIH_WAKTU,GRP_ID,STT_LEMBUR)
				SELECT TERMINAL_ID,FINGER_ID,IN_TGL,IN_WAKTU,OUT_TGL,OUT_WAKTU,LEBIH_WAKTU,GRP_ID,STT_LEMBUR
				FROM absen_import_tmp
				";
				Yii::$app->db->CreateCommand($sql)->execute();
				Yii::$app->db->CreateCommand("DELETE FROM absen_import_tmp")->execute();
				return $this->redirect(['index','#ai-tab1']);
			}else{
				return $this->redirect(['index']);
			}
		}
			
	
		
		
		// $sql="INSERT INTO absen_import (TERMINAL_ID,FINGER_ID,IN_TGL,IN_WAKTU,OUT_TGL,OUT_WAKTU,GRP_ID)
			  // SELECT TERMINAL_ID,FINGER_ID,IN_TGL,IN_WAKTU,OUT_TGL,OUT_WAKTU,GRP_ID
			  // FROM absen_import_tmp
		// ";
		// Yii::$app->db->CreateCommand($sql)->execute();
		// Yii::$app->db->CreateCommand("DELETE FROM absen_import_tmp")->execute();
		// return $this->redirect(['index','#ai-tab1']);
    } 
	
	/**
     * ACTION : VIEW 
	 */
    public function actionView($id)
    {
    	$model=$this->findModel($id);
		//$model->scenario=AbsenImportTmp::SCENARIO_UPDATE;
		
		if (!$model->load(Yii::$app->request->post())) {
			return $this->renderAjax('_viewTmp', [
					'model' => $model
				]); 				
		}else{		
			
			if(Yii::$app->request->isAjax){				
				$model->load(Yii::$app->request->post());				
				return Json::encode(\yii\widgets\ActiveForm::validate($model));
			}else{
				if ($model->load(Yii::$app->request->post())) {
					if ($model->save()) {
						return $this->redirect(['index']);
					}			
				}
			}	
		}		
    }
	
	/**
     * ACTION : VIEW 
	 */
    public function actionFormException($id)
    {
    	$model=$this->findModel($id);
		//$model->scenario=AbsenImportTmp::SCENARIO_UPDATE;
		
		if (!$model->load(Yii::$app->request->post())) {
			return $this->renderAjax('_viewTmp', [
					'model' => $model
				]); 				
		}else{		
			
			if(Yii::$app->request->isAjax){				
				$model->load(Yii::$app->request->post());				
				return Json::encode(\yii\widgets\ActiveForm::validate($model));
			}else{
				if ($model->load(Yii::$app->request->post())) {
					if ($model->save()) {
						return $this->redirect(['index']);
					}			
				}
			}	
		}		
    }
	
    /**
     * ACTUAL : CREATE 
     */
    // public function actionCreateAct()
    // {
        // $model = new AbsenImport();
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->ID]);
        // } else {
            // return $this->renderAjax('_form', [
                // 'model' => $model,
            // ]);
        // }
    // }
	
	 
	
	
	
    /**
     * Updates an existing AbsenImport model.
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
       * TEMPORARY : Delete
     */
    public function actionDeleteTmp($id)
    {
        $this->findModelTmp($id)->delete();
        return $this->redirect(['index']);
    }
	
	/**
       * ACTUAL : Delete
     */
    public function actionDeleteAct($id)
    {
        self::findModel($id)->delete();
        //return $this->redirect(['index']);
		$this->redirect(array('/absensi/absen-import/#ai-tab1'));
    }
    /**
     * Finds the AbsenImport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AbsenImport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AbsenImport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    } 
	
	protected function findModelTmp($id)
    {
        if (($model = AbsenImportTmp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	 /**
     * UPLOAD FILE 
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
     */
	public function actionUpload(){
		$model = new AbsenImportFile();
		if ($model->load(Yii::$app->request->post()) ) {
			$hsl = \Yii::$app->request->post();
			$fileNm = $hsl['AbsenImportFile']['FILE_NM'];
			if($model->validate()){
				//$model->USER_ID = Yii::$app->user->identity->username;
				$exportFile = $model->uploadFile();
				if ($model->save()) {
				 //upload only if valid uploaded file instance found
					 if ($exportFile !== false) {
						$path = $model->getImageFile();
						$exportFile->saveAs($path);
						//return $this->redirect(['index','id'=>$model->FILE_NM]);
						// $dataModelImport=self::getArryFile($model->FILE_NM)->getModels();
						$dataModelImport=self::getArryFile($model->FILE_NM);//->getModels();
						if($dataModelImport){
							$scrcData=self::dataKombinasi($dataModelImport);
							$cnt=self::tglCount($dataModelImport);
							$i=0;
							for($i=0; $i<=$cnt; $i++){
								//$IN[]=self::excelColumnName(($i+$i)+4);
								$IN=self::excelColumnName(($i+$i)+4);	//0 + 4 + 0
								$OUT=self::excelColumnName(($i+$i)+5);	//0 + 5 + 0		
								foreach($scrcData as $srcRows){		
										$modelTmp = new AbsenImportTmp();
										// $rsltTgl[]=$srcRows[$i];		//0 
										// $rsltIn[]=$srcRows[$IN];		//0 + 4 + 0
										// $rsltOut[]=$srcRows[$OUT];		//0 + 5 + 0		
										$modelTmp->TERMINAL_ID=str_replace("'","",(string)$srcRows['A']); 								//TERMINAL
										$modelTmp->FINGER_ID=str_replace("'","",(string)$srcRows['B']);									//FINGER
										$modelTmp->IN_TGL=date('Y-m-d', strtotime(str_replace("'","",(string)$srcRows[$i])));			//TGL MASUK
										$modelTmp->IN_WAKTU=self::checkWaktu($srcRows[$IN]);											//WAKTU MASUK
										//$modelTmp->OUT_TGL=date('Y-m-d', strtotime(str_replace("'","",(string)$srcRows[$i])));		//TGL KELUAR
										$modelTmp->OUT_TGL=self::formulaTglOut(self::formulaOut($srcRows[$OUT]),$srcRows[$i]);				//TGL KELUAR
										$modelTmp->OUT_WAKTU=self::formulaOut($srcRows[$OUT]);											//WAKTU KELUAR
										//$modelTmp->OUT_WAKTU=self::checkWaktu($srcRows[$OUT]);											//WAKTU KELUAR
										$modelTmp->STT_LEMBUR=self::formulaStt($srcRows[$IN],$srcRows[$OUT]);							//VALDASASI STT
										$modelTmp->LEBIH_WAKTU=self::formulaStt($srcRows[$IN],$srcRows[$OUT]);							//VALDASASI STT
										$modelTmp->save();										
								}
								
							};
						};
						return $this->redirect(['index','id'=>$model->FILE_NM]);
					}
				}
			}
		}
	}
	
	// POSISI INSERT STS_LEMBUR DAN IJIN
	private function formulaStt($valWaktuIn,$valWaktuOut){
		if(self::checkWaktu($valWaktuIn) AND self::checkWaktu($valWaktuOut)){
			if(self::checkWaktu($valWaktuOut)>'08:00' AND self::checkWaktu($valWaktuOut)<='12:00'){
				return '7'; 																						// LEWAT WAKTU DI TENTUKAN
			}else{
				return '0';
			}			
		}elseif(($valWaktuIn=='OF' or $valWaktuIn=='of') OR ($valWaktuOut=='OF' or $valWaktuOut=='of')){		//STATUS LIBUR
			return '2';
		}elseif(($valWaktuIn=='AL' or $valWaktuIn=='al') OR ($valWaktuOut=='AL' or $valWaktuOut=='al')){		//STATUS ALFA
			return '3';
		}elseif(($valWaktuIn=='SK' or $valWaktuIn=='sk') OR ($valWaktuOut=='SK' or $valWaktuOut=='sk')){		//STATUS SAKIR
			return '4';
		}elseif(($valWaktuIn=='LK' or $valWaktuIn=='lk') OR ($valWaktuOut=='LK' or $valWaktuOut=='lk')){		//STATUS LUAR KOTA
			return '5';
		}elseif(($valWaktuIn=='IJ' or $valWaktuIn=='ij') OR ($valWaktuOut=='IJ' or $valWaktuOut=='ij')){		//STATUS IJIN
			return '6';
		}elseif($valWaktuIn=='' AND $valWaktuOut<>''){															// in/oot kosong diangap LIBUR
			return '2';
		}elseif($valWaktuIn<>'' AND $valWaktuOut==''){															// IN / OUT kosong diangap LIBUR
			return '2';
		}elseif($valWaktuIn=='' AND $valWaktuOut==''){															// IN & OUT kosong diangap ALFA
			return '3';
		}else{
			return '3';
		}		
	}
	
	private function formulaIn($valWaktuIn,$valTgl){
		if(self::checkWaktu($valWaktuIn)){
			return self::checkWaktu($valWaktuIn);
		}else{
			return '00:00';
		};	
	}
	
	//CLOSING TIME OUT on 07:00
	private function formulaOut($valWaktuOut){
		if(self::checkWaktu($valWaktuOut)){
			$timeOUT=self::checkWaktu($valWaktuOut);
			if ($timeOUT >='08:00' AND $timeOUT <='12:00'){
				return '07:00';
			}else{
				return $timeOUT;
			}
		}else{
			//return '17:00';
			return '00:00';
		};	
	}
	
	/* //KELEBIHAN WAKTU : lewat jam 08:00 lemburan di cut
	private function formulaLebihWaktu($valWaktuOut){
		if(self::checkWaktu($valWaktuOut)){
			$timeOUT=self::checkWaktu($valWaktuOut);
			if ($timeOUT >='07:00' AND $timeOUT <='12:00'){
				return '07:00';
			}else{
				return $timeOUT;
			}
		}else{
			//return '17:00';
			return '00:00';
		};	
	} */
	
	private function formulaTglOut($valWaktuOut,$valTgl){
		$strtgl=date('Y-m-d', strtotime(str_replace("'","",(string)$valTgl)));
		//if(self::checkWaktu($valWaktuIn) AND self::checkWaktu($valWaktuOut)){
		if(self::checkWaktu($valWaktuOut)){
			//$timeIN= self::checkWaktu($valWaktuIn);
			$timeOUT= self::checkWaktu($valWaktuOut);
			if ($timeOUT >='00:00' AND $timeOUT<'08:00'){
				return date('Y-m-d', strtotime('+1 day',  strtotime($strtgl)));
				// return date('Y-m-d', strtotime('+1 day',  strtotime(date('Y-m-d', strtotime(str_replace("'","",(string)$valTgl))))));
				// date('Y-m-d', strtotime('+1 day', strtotime('2017-09-22')));
			}else{
				return $strtgl;
			}
		}else{
			return $strtgl;
		}
	}
	
	/**=========================
	* Validasi Waktu dan format
	**==========================
	*/
	private function checkWaktu($value){
		$inVal=str_replace("'","",(string)$value);
		//$a=preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $value);
		$a=preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', $inVal);
		return $a!=false?$inVal:false;
	}
	
	/**====================================
     * VALIDATION INPUT DATE
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
	 * @since 1.2
	 * ====================================
     */
	function getValidateDate($date)
	{		
		$tgl=date('Y-m-d', strtotime($date)); 
		if($tgl<>'1970-01-01'){ //check String
			if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$tgl))
			{
				$tempDate = explode('-', $tgl);
				// checkdate(month, day, year)
				return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
			}else{
				//echo 'Date is invalid';
				return false;
			}
		}else{
			return false;
		}		 
	}
	
	/**=========================
	* get Selisih Waktu
	**==========================
	*/
	private function selisihWaktu($starTime,$endTime){
		$awal  = strtotime($starTime);
		$akhir = strtotime($endTime);
		// $awal  = strtotime('07:00:00');
		// $akhir = strtotime('10:00:00');
		$diff  = $akhir - $awal;
		$jam   = floor($diff / (60 * 60));
		$menit = $diff - $jam * (60 * 60);
		//$X='Waktu tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';
		$X='0'.$jam.':0'.floor($menit / 60 );
		return $X;
	}
	
	/**================================================
	* Data tanggal Dan Data Rows
	* row1 dan row2 excel di eliminasi, untuk gabungan
	**=================================================
	*/
	private function dataKombinasi($data){
		//ARRAY TGL
		foreach($data as $rowTgl => $valTgl){
			if($rowTgl==1){				
				foreach($valTgl as $rowTgl1 => $valTgl1){
					if($valTgl1<>''){
						$tmp=$valTgl1;
					}else{
						$aryTgl[]=$tmp;
					};
				}	
			}
		} 
		//print_r($aryTgl);
		
		//ARRAY DATA AND ARRAY ADD
		foreach($data as &$record){
			//if($row1<>1 AND $row1<>2){
			//if($row1==1){
				foreach($aryTgl as $rowAryTgl => $valAryTgl){
					$record[$rowAryTgl]=$valAryTgl;
					
				}
				$dataKombinasi[]=$record;
			//}
		} 
		
		// print_r($hari1);
		//return $dataKombinasi;
		foreach($dataKombinasi as $rowRslt => $valRslt){
			if($rowRslt<>0 AND $rowRslt<>1){
			// if($rowRslt==0){
				$rsltAry[]=$valRslt;
			}
		} 
		
		$dataProvider = new \yii\data\ArrayDataProvider([
			'allModels' => $rsltAry,
			'pagination' => [
				 'pageSize' => 10000, //max row input
			]
		]);
		return $dataProvider->getModels();
	}
	
	/**================================================
	* COUNT JUMLAH TANGGAL DI MASUKAN
	**=================================================
	*/
	private function tglCount($data){
		//ARRAY TGL
		foreach($data as $rowTgl => $valTgl){
			if($rowTgl==1){				
				foreach($valTgl as $rowTgl1 => $valTgl1){
					if($valTgl1<>''){
						$tmp=$valTgl1;
					}else{
						$aryTgl[]=$tmp;
					};
				}	
			}
		} 
		$cnt=count($aryTgl);
		return $cnt!=0?($cnt-1):0;
	}
	
	/**================================================
	* GENERATE COLUMN INDEX NAME BY ALFABET
	**=================================================
	*/
	public static function excelColumnName($index)
    {
        --$index;
        if ($index >= 0 && $index < 26)
            return chr(ord('A') + $index);
        else if ($index > 25)
            return (self::excelColumnName($index / 26)) . (self::excelColumnName($index % 26 + 1));
        else
            throw new Exception("Invalid Column # " . ($index + 1));
    }
	
	/**=====================================
     * GET ARRAY FROM FILE
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
	 * =====================================
     */
	public function getArryFile($paramFile){
		
			$pathDefault='/var/www/backup/ExternalData/default_format/';
			$pathImport=realpath(Yii::$app->basePath) . '/web/uploads/temp/';
			//$fileData=$paramFile!=''?$pathImport.$paramFile:$pathDefault.'default_import_gudang.xlsx';
			$fileData=$pathImport.$paramFile;
			//$fileData=$pathImport.'absen_import2017-09-06-115804.xlsx';
			//$fileName='/var/www/backup/ExternalData/import_gudang/'.$fileData;
			$config='';
			//$data = \moonland\phpexcel\Excel::import($fileName, $config);
			//Test Direct file
			$pathImportTmp=realpath(Yii::$app->basePath) . '/web/uploads/temp/test.xlsx';
			
			$data = \moonland\phpexcel\Excel::widget([
				'id'=>'import-absensi',
				'mode' => 'import',
				'fileName' => $fileData,
				//'fileName' => $pathImportTmp,
				'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
				'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
				'getOnlySheet' => 'Import-Absensi', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
				]);
			/* //print_r($data);
			$aryDataProvider= new ArrayDataProvider([
				'allModels'=>$data,
				 'pagination' => [
					'pageSize' => 1000,
				]
			]);
			//return Spinner::widget(['preset' => 'medium', 'align' => 'center', 'color' => 'blue','hidden'=>false]);
			return $aryDataProvider; */
			
			return $data;
			
	}
	
	/**=====================================
     * GET VALIDATE DATA
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
	 * =====================================
     */
	public function getValidateDataImport($paramFile){
		
	}
	
	
	
	/* function getValidateTime($time)
	{
		
		$tgl=time('H:i:s', strtotime($time));
		if($tgl<>'1970-01-01'){
			if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$tgl))
			{
				$tempDate = explode('-', $tgl);
				// checkdate(month, day, year)
				return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
			}else{
				//echo 'Date is invalid';
				return false;
			}
		}else{
			return false;
		}
		//$tgl=date('Y-m-d H:i:s', strtotime($date));
		 // $tempDate = explode('-', $date);
		////  checkdate(month, day, year)
		// return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
		  
		 
	} */
	
	
	
	
	/**====================================
     * EXPORT FORMAT
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
	 * @since 1.2
	 * ====================================
     */
	public function actionExport(){
		
		$modelPeriode = AbsenImportPeriode::find()->where(['TIPE'=>'0','AKTIF'=>'1'])->one();
		$prdStart=date('Y-m-d', strtotime($modelPeriode->TGL_START));
		$prdEnd=date('Y-m-d', strtotime($modelPeriode->TGL_END));
		
		$mergeVal=('1,0');
		$s1=0;
		while ($prdStart <=$prdEnd)
		{
			$hd1_2["'".$prdStart."'"]=['font-size'=>'8','width'=>'5','valign'=>'center','align'=>'center','merge'=>$mergeVal];
			$hd1_2[$prdStart.'x']=['font-size'=>'8','width'=>'5','valign'=>'center','align'=>'center'];
			$hd2_2['IN'.$s1]=['font-size'=>'8','width'=>'6','valign'=>'center','align'=>'center'];
			$hd2_2['OUT'.$s1]=['font-size'=>'8','width'=>'6','valign'=>'center','align'=>'center'];
			$ttlhd1[]=$prdStart;
			$ttlhd1[]=$prdStart.'merge';			
			$fieldTitelhd2_2[]='IN';
			$fieldTitelhd2_2[]='OUT';
			$ttlContent['IN'.$s1]=['font-size'=>'8','width'=>'6','valign'=>'center','align'=>'center'];
			$ttlContent['OUT'.$s1]=['font-size'=>'8','width'=>'6','valign'=>'center','align'=>'center'];
			$datafield[]=['IN'.$s1=>'08:00:00'];
			$datafield[]=['OUT'.$s1=>'17:00:00'];
			$prdStart = date('Y-m-d', strtotime($prdStart . ' +1 day'));
			$s1=$s1+1;
		}
		$hd1_1['TERMINAL_ID']=['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center','merge'=>'0,2'];
		$hd1_1['FINGER_ID']=['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center','merge'=>'0,2'];
		$hd1_1['NAMA']=['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center','merge'=>'0,2'];
		$hd2_1['TERMINAL_ID']=['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'];
		$hd2_1['FINGER_ID']=['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'];
		$hd2_1['NAMA']=['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'];
		$row_1[]=['TERMINAL_ID'=>'01234567890'];
		$row_1[]=['FINGER_ID'=>'321'];
		$row_1[]=['NAMA'=>'Piter'];
		$rsltHd1=ArrayHelper::merge($hd1_1,$hd1_2);
		$rsltHd2=ArrayHelper::merge($hd2_1,$hd2_2);
		$rsltContent=ArrayHelper::merge($hd1_1,$ttlContent);
		// $rowResult=ArrayHelper::merge($row_1,$datafield);
		
		//TITLE 
		$fieldTitelhd1_1[]='TERMINAL_ID';
		$fieldTitelhd1_1[]='FINGER_ID';
		$fieldTitelhd1_1[]='NAMA';
		
		foreach($ttlhd1 as $rws){
				$fieldTitelhd1_2[]="'".$rws."'";	
		};
		$fieldTitelhd1=ArrayHelper::merge($fieldTitelhd1_1,$fieldTitelhd1_2);
		$fieldTitelhd2=ArrayHelper::merge($fieldTitelhd1_1,$fieldTitelhd2_2);
						// 'TGL1' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center','merge'=>'1,0'],
						// 'TGL11' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						// 'TGL2' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center','merge'=>'1,0'],
						// 'TGL22' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
		
		// print_r($rowResult);
		// die();
		
		//DATA IMPORT
		$aryImport=[
			// ['TERMINAL_ID'=>'01234567890','FINGER_ID'=>'321','NAMA'=>'Piter','IN0'=>'08:00:00','OUT0'=>'17:00:00','IN1'=>'08:00:00','OUT1'=>'17:00:00','IN2'=>'08:00:00','OUT2'=>'17:00:00','IN3'=>'08:00:00','OUT3'=>'17:00:00','IN4'=>'08:00:00','OUT4'=>'17:00:00','IN5'=>'08:00:00','OUT5'=>'17:00:00','IN6'=>'08:00:00','OUT6'=>'17:00:00'],
			// ['TERMINAL_ID'=>'112312312312','FINGER_ID'=>'321','NAMA'=>'Piter','IN0'=>'08:00:00','OUT0'=>'17:00:00','IN1'=>'08:00:00','OUT1'=>'17:00:00','IN2'=>'08:00:00','OUT2'=>'17:00:00','IN3'=>'08:00:00','OUT3'=>'17:00:00','IN4'=>'08:00:00','OUT4'=>'17:00:00','IN5'=>'08:00:00','OUT5'=>'17:00:00','IN6'=>'08:00:00','OUT6'=>'17:00:00'],
			['TERMINAL_ID'=>'01234567890','FINGER_ID'=>'321','NAMA'=>'Piter','IN0'=>'08:00','OUT0'=>'17:00'],
			['TERMINAL_ID'=>'112312312312','FINGER_ID'=>'321','NAMA'=>'Piter','IN0'=>'08:00','OUT0'=>'17:00'],
		];		
		$excel_dataImport = Postman4ExcelBehavior::excelDataFormat($aryImport);
        $excel_titleImport = $excel_dataImport['excel_title'];
        $excel_ceilsImport = $excel_dataImport['excel_ceils'];
		
		//DATA CABANG
		$dataCabang= new ArrayDataProvider([
			'key' => 'ID',
			'allModels'=>Yii::$app->db->createCommand("
				SELECT 
					MESIN_SN AS TERMINAL_ID,
					MESIN_NM AS CABANG
				FROM machine 
			")->queryAll()
		]);
		$aryCabang=$dataCabang->allModels;
		$excel_dataCbg = Postman4ExcelBehavior::excelDataFormat($aryCabang);
        $excel_titleCbg = $excel_dataCbg['excel_title'];
        $excel_ceilsCbg = $excel_dataCbg['excel_ceils'];
		
		//DATA KARYAWAN FINGER
		$dataKarFinger= new ArrayDataProvider([
			'key' => 'ID',
			'allModels'=>Yii::$app->db->createCommand("
				SELECT 
					x1.TerminalID AS TERMINAL_ID,x1.FingerPrintID AS FINGER_ID,x2.KAR_NM,x1.KAR_ID
				FROM kar_finger x1 left join karyawan x2 on x2.KAR_ID=x1.KAR_ID					
			")->queryAll()
		]);
		$aryKarFinger=$dataKarFinger->allModels;
		$excel_dataKarFinger = Postman4ExcelBehavior::excelDataFormat($aryKarFinger);
        $excel_titleKarFinger = $excel_dataKarFinger['excel_title'];
        $excel_ceilsKarFinger = $excel_dataKarFinger['excel_ceils'];
		
		
		$excel_content = [
			 [
				'sheet_name' => 'Import-Absensi',
                'sheet_title' => [
					$fieldTitelhd1,
					$fieldTitelhd2,
				],
			    'ceils' => $excel_ceilsImport,
                'freezePane' => 'A3',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'headerStyle'=>[$rsltHd1,//$rsltHd2					
					// [
						// 'TERMINAL_ID' =>['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center','merge'=>'0,2'],
						// 'FINGER_ID' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center','merge'=>'0,2'],
						// 'NAMA' => ['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center','merge'=>'0,2'],
						// 'TGL1' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center','merge'=>'1,0'],
						// 'TGL11' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						// 'TGL2' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center','merge'=>'1,0'],
						// 'TGL22' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
					// ],
					// [
						// 'TERMINAL_ID' =>['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'],
						// 'FINGER_ID' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						// 'NAMA' => ['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						// 'IN' => ['font-size'=>'8','width'=>'7','valign'=>'center','align'=>'center'],
						// 'OUT' => ['font-size'=>'8','width'=>'7','valign'=>'center','align'=>'center'],
						// 'IN' => ['font-size'=>'8','width'=>'7','valign'=>'center','align'=>'center'],
						// 'OUT' => ['font-size'=>'8','width'=>'7','valign'=>'center','align'=>'center'],
					// ]						
				],
				'contentStyle'=>[//$rsltContent
					[						
						'TERMINAL_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'FINGER_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KARYAWAN' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'IN' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
						'OUT' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
						'IN' =>['font-size'=>'8','valign'=>'center','align'=>'center'],
						'OUT' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
					]
				],
               'oddCssClass' => Postman4ExcelBehavior::getCssClass("odd"),
               'evenCssClass' => Postman4ExcelBehavior::getCssClass("even"),
			],
			//Catatan Penting
			[
				'sheet_name' => 'Catatan Penting',
				'freezePane' => 'A2',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'sheet_title' => [
					["CATATAN PENTING"],
				],
                'ceils' => [
					["1.Pastikan format sesuai dengan yang sudah di download."],
                    ["2.Validasi format yang akan di upload:"],
                    ["  A. NAMA SHEET: Import-Absensi"],
					["  B. NAMA HEADER COLUMN : [TERMINAL_ID,FINGER_ID,NAMA,TGL_IN,TGL_OUT,JAM_IN,JAM_OUT]"],
					["3.Refrensi."],
					["  [TERMINAL_ID] = Serial Number pada mesin finger setiap cabang"],
					["  [FINGER_ID] =  Kode Finger yang di dapatkan saat pendaftaran jadi di mesin per-Cabang"],
					["  [NAME]  =  Nama dari karyawan yang pernah di daftarkan"],
					["  [TGL]    = Otomatis keluar saat export pada periode aktif "],
					["  [IN]   = Jam pada saat absensi masuk "],
					["  [OUT]   = Jam pada saat absensi keluar "],
					["4.Refrensi Kode."],
					["  [TERMINAL_ID] = Sheet Cabang-Mechine"],
					["  [FINGER_ID]  = Sheet Data-Karyawan"],					
					["  [KARYAWAN]    = Sheet Data-Karyawan"],
					["5.Exceptions/Ketidak hadiran."],
					["  AL [Alfa] = tidak masuk "],							
					["  OF [OFF]  = tidak masuk"],	
					["  IJ [IJIN] = tidak masuk "],	
					["  SK [SAKIT] = tidak masuk "],					
					["  LK [LUAR KOTA] = tidak masuk "],					
				],
				'headerStyle'=>[					
					[
						'CATATAN PENTING' =>['font-size'=>'8','width'=>'130','valign'=>'center','align'=>'center'],
					]						
				],
				'contentStyle'=>[
					[						
						'CATATAN PENTING' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
					]
				],
				'oddCssClass' => Postman4ExcelBehavior::getCssClass("odd"),
                'evenCssClass' => Postman4ExcelBehavior::getCssClass("even"),
			],
			//Cabang-Mechine
			[
				'sheet_name' => 'Cabang-Mechine',
                'sheet_title' => [
					['TERMINAL_ID','CABANG']
				],
			    'ceils' => $excel_ceilsCbg,
                'freezePane' => 'A2',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'headerStyle'=>[					
					[
						'TERMINAL_ID' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'CABANG' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
					]						
				],
				'contentStyle'=>[
					[						
						'TERMINAL_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'CABANG' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
					]
				],
               'oddCssClass' => Postman4ExcelBehavior::getCssClass("odd"),
               'evenCssClass' => Postman4ExcelBehavior::getCssClass("even"),
			],
			//Data-Karyawan
			[
				'sheet_name' => 'Data-Karyawan',
                'sheet_title' => [
					['TERMINAL_ID','FINGER_ID','KAR_NM','KAR_ID']
				],
			    'ceils' => $excel_ceilsKarFinger,
                'freezePane' => 'A2',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'headerStyle'=>[					
					[
						'TERMINAL_ID' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'FINGER_ID' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],						
						'KAR_NM' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'KAR_ID' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						
					]						
				],
				'contentStyle'=>[
					[						
						'TERMINAL_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],						
						'FINGER_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_NM' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
					]
				],
               'oddCssClass' => Postman4ExcelBehavior::getCssClass("odd"),
               'evenCssClass' => Postman4ExcelBehavior::getCssClass("even"),
			],
		];
		$excel_file = "ImportFormat";
		$this->export4excel($excel_content, $excel_file,0);
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
				$dataKar=Karyawan::find()->where(['CAB_ID'=>$terminal_id])->all();
				if($dataKar){
					foreach ($dataKar as $key => $value) {
						$out[] = ['id'=>$value['KAR_ID'],'name'=> $value['KAR_NM']];
					};
				}else{
					$out[] = ['id'=>'','name'=> ''];
				};		
				echo Json::encode(['output'=>$out, 'selected'=>'']);
				return;
			}
		}
		echo Json::encode(['output'=>'', 'selected'=>'']);
	}
	
	// DEPDROP : Terminal_id
	public function actionSubTerminal() {
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			
			$parents = $_POST['depdrop_parents'];
			//print_r($parents);
			if ($parents != null) {
				$terminal_id = $parents[0]!=''?$parents[0]:'0';
				$modelMachine=Machine::find()->where(['CAB_ID'=>$terminal_id])->one();
				if($modelMachine){
					$out[] = ['id'=>$modelMachine->MESIN_SN,'name'=> $modelMachine->MESIN_SN,'options'=> ['style'=>['color'=>'red'],'disabled'=>false]];
				}
				echo Json::encode(['output'=>$out, 'selected'=>'']);
				return;
			}
		}
		echo Json::encode(['output'=>'', 'selected'=>'']);
	}
	// DEPDROP : Terminal_id
	public function actionSubFinger() {
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			
			$parents = $_POST['depdrop_parents'];
			//print_r($parents);
			if ($parents != null) {
				$terminal_id = $parents[0]!=''?$parents[0]:'0';
				$finger_id = $parents[1]!=''?$parents[1]:'0';
				$modelFinger=Kar_finger::find()->where(['TerminalID'=>$terminal_id,'KAR_ID'=>$finger_id])->one();
				if($modelFinger){
					$out[] = ['id'=>$modelFinger->FingerPrintID,'name'=> $modelFinger->FingerPrintID,'options'=> ['style'=>['color'=>'red'],'disabled'=>false]];
				};				
				echo Json::encode(['output'=>$out, 'selected'=>'']);
				return;
			}
		}
		echo Json::encode(['output'=>'', 'selected'=>'']);
	}
}