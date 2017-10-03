<?php

namespace modulprj\payroll\controllers;

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
use kartik\mpdf\Pdf;
use yii\base\DynamicModel;

use ptrnov\postman4excel\Postman4ExcelBehavior;
use modulprj\absensi\models\AbsenImportPeriode;
use modulprj\payroll\models\AbsenPayroll;
use modulprj\payroll\models\AbsenPayrollSearch;
use modulprj\payroll\models\AbsenPaid;
use modulprj\payroll\models\AbsenPayrollPaidSearch;
use modulprj\payroll\models\AbsenPayrollPrintSearch;
use modulprj\master\models\Karyawan;
use modulprj\master\models\Machine;
use modulprj\master\models\Kar_finger;
use modulprj\master\models\TimetableGroup;

/**
 * AbsenImportController implements the CRUD actions for AbsenImport model.
 */
class AbsenDailyController extends Controller
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
		$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'1','AKTIF'=>'1'])->one();
		$closingParam=['tglStart'=>$modelPrd->TGL_START,'tglEnd'=>$modelPrd->TGL_END];
		//$closingParam=['tglStart'=>'2017-09-08','tglEnd'=>'2017-09-14'];
		
		$paramFile=Yii::$app->getRequest()->getQueryParam('id');
		$paramx=Yii::$app->getRequest()->getQueryParam('idx');
		if ($paramFile){
			$sqlStr="UPDATE absen_import SET STT_UPDATE=1 WHERE STATUS<>2 AND (IN_TGL BETWEEN '".$modelPrd->TGL_START."' AND '".$modelPrd->TGL_END."');";
			$cmd_update=Yii::$app->db->createCommand($sqlStr);
			$cmd_update->execute();
		};
		
		
        $searchModelAbsensi = new AbsenPayrollSearch($closingParam);
        $dataProviderAbsensi = $searchModelAbsensi->searchHeader(Yii::$app->request->queryParams);
        //$dataProviderAbsensi = $searchModelAbsensi->searchHeader($param);
		
		$searchModelPaid = new AbsenPayrollPaidSearch($closingParam);
        $dataProviderPaid = $searchModelPaid->search(Yii::$app->request->queryParams);
		
		//return self::getValidateDate('2017-12-12');
		//return self::getValidateDate('12-12-2017');
		//return date('Y-m-d', strtotime('2037-12-12')); //BUG di tahun 3038
		//return date('H:i:s', strtotime('10:00:00')); //BUG di tahun 3038
		//return checkdate('2017','12', '12');
		//getValidateTime
        return $this->render('index', [
			'searchModelAbsensi' => $searchModelAbsensi,
            'dataProviderAbsensi' => $dataProviderAbsensi,
            'searchModelPaid' => $searchModelPaid,
            'dataProviderPaid' => $dataProviderPaid
        ]);
    }
	
	/**
     * TEMPORARY : BAYAR GAJI
     */
	public function actionPaid($id,$start,$end)
    {
		//print_r($id.'-'.$start.'-'.$end);
		$sqlStr="UPDATE absen_import SET STATUS=2 WHERE KAR_ID='".$id."' AND (IN_TGL BETWEEN '".$start."' AND '".$end."');";
		$cmd_update=Yii::$app->db->createCommand($sqlStr);
		$cmd_update->execute();
		return $this->redirect(['index']);		
    }

	/**
     * TEMPORARY : PRINT PER KARYAWAN
     */
	public function actionPrint($id)
    {
		Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
		$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'1','AKTIF'=>'1'])->one();
		$closingParam=['tglStart'=>$modelPrd->TGL_START,'tglEnd'=>$modelPrd->TGL_END];
		//$closingParam=['tglStart'=>'2017-09-08','tglEnd'=>'2017-09-14'];
		$searchModelDetail = new AbsenPayrollSearch($closingParam);
		$dataProviderDetail=$searchModelDetail->searchHeader(['AbsenPayrollSearch'=>['KAR_ID'=>$id]]);
		$content= $this->renderPartial( '_printPdf',[
			'dataProviderDetail'=>$dataProviderDetail,
			'model'=>$dataProviderDetail->getModels()
		]);
		
		$pdf = new Pdf([
			// set to use core fonts only
			'mode' => Pdf::MODE_CORE,
			// A4 paper format
			'format' => Pdf::FORMAT_A4,
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT,
			// stream to browser inline
			'destination' => Pdf::DEST_BROWSER,
			//'destination' => Pdf::DEST_FILE ,
			// your html content input
			'content' => $content,
			// format content from your own css file if needed or use the
			// enhanced bootstrap css built by Krajee for mPDF formatting
			//D:\xampp\htdocs\advanced\lukisongroup\web\widget\pdf-asset
			'cssFile' => '@modulprj/web/addasset/pdf-asset/kv-mpdf-bootstrap.min.css',
			// any css to be embedded if required
			'cssInline' => '.kv-heading-1{font-size:12px}',
			 // set mPDF properties on the fly
			//'options' => ['title' => 'Slip Gaji','subject'=>'Payroll'],
			 // call mPDF methods on the fly
			// 'methods' => [
				// 'SetHeader'=>['Copyright@wanindo '.date("r")],
				// 'SetFooter'=>['{PAGENO}'],
			// ]
		]);
		
		return $pdf->render();
		
    }
	
	/**
     * TEMPORARY : PRINT PER KARYAWAN
     */
	public function actionRePrint($id)
    {
		Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
		$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'1','AKTIF'=>'1'])->one();
		$closingParam=['tglStart'=>$modelPrd->TGL_START,'tglEnd'=>$modelPrd->TGL_END];
		//$closingParam=['tglStart'=>'2017-09-08','tglEnd'=>'2017-09-14'];
		$searchModelDetail = new AbsenPayrollPaidSearch($closingParam);
		$dataProviderDetail=$searchModelDetail->search(['AbsenPayrollPaidSearch'=>['KAR_ID'=>$id]]);
		$content= $this->renderPartial( '_printPdf',[
			'dataProviderDetail'=>$dataProviderDetail,
			'model'=>$dataProviderDetail->getModels()
		]);
		
		$pdf = new Pdf([
			// set to use core fonts only
			'mode' => Pdf::MODE_CORE,
			// A4 paper format
			'format' => Pdf::FORMAT_A4,
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT,
			// stream to browser inline
			'destination' => Pdf::DEST_BROWSER,
			//'destination' => Pdf::DEST_FILE ,
			// your html content input
			'content' => $content,
			// format content from your own css file if needed or use the
			// enhanced bootstrap css built by Krajee for mPDF formatting
			//D:\xampp\htdocs\advanced\lukisongroup\web\widget\pdf-asset
			'cssFile' => '@modulprj/web/addasset/pdf-asset/kv-mpdf-bootstrap.min.css',
			// any css to be embedded if required
			'cssInline' => '.kv-heading-1{font-size:12px}',
			 // set mPDF properties on the fly
			'options' => ['title' => 'Slip Gaji','subject'=>'Payroll'],
			 // call mPDF methods on the fly
			'methods' => [
				'SetHeader'=>['Copyright@wanindo '.date("r")],
				'SetFooter'=>['{PAGENO}'],
			]
		]);
		
		return $pdf->render();
		
    }
	/**
     * TEMPORARY : TEMPORARY : PRINT ALL KARYAWAN
     */
	public function actionPrintAll()
    {
		
		$model = new \yii\base\DynamicModel([
			'TT_GRP_ID','CAB_ID','DEP_ID'
		]);
		
		$model->addRule(['TT_GRP_ID','CAB_ID','DEP_ID'], 'required')
         ->addRule(['TT_GRP_ID','CAB_ID','DEP_ID'], 'safe');
        //->addRule('TT_GRP_ID',['max'=>100]);
		//$model = TimetableGroup::find()->all();
		//$model = new TimetableGroup;//::find();//->all();
		
		if (!$model->load(Yii::$app->request->post())) {
			return $this->renderAjax('_fromPrintAll', [
					'model' => $model
				]); 				
		}else{				
			 $hsl = \Yii::$app->request->post();		    
		     $cabId = $hsl['DynamicModel']['CAB_ID'];
		     $depId = $hsl['DynamicModel']['DEP_ID'];
			 $grpId = $hsl['DynamicModel']['TT_GRP_ID'];
			// $aryModelKar=Karyawan::find()->where(['CAB_ID'=>$cabId,'DEP_ID'=>$depId,'GRP_ID'=>$grpId])->all();
			 //$aryModelKar=AbsenPayroll::find()->select(['KAR_ID'])->where(['MESIN_NM'=>$cabId,'DEP_ID'=>$depId])->all();
			 $aryModelKar=AbsenPayroll::find()->where(['MESIN_NM'=>$cabId,'DEP_ID'=>$depId])->groupBy(['KAR_ID'])->all();//->where(['MESIN_NM'=>$cabId,'DEP_ID'=>$depId])->all();
			 //print_r($aryModelKar[1]->KAR_ID);
			 // die();
			 foreach($aryModelKar as $row => $val){
				 if($val['KAR_ID']!=''){
					 // if ($row==0){
						 // $data="'".$val['KAR_ID']."'";
					 // }else{
						 $data=$data.",'".$val['KAR_ID']."'";
					 // }	
				 }
			 };
			// $aryKarID="(".$data.")";
			 $aryKarID="(".substr("(".$data.")",2); //menghilangkan koma di depan
		
			 // print_r($aryKarID);
			 // die();
			 
			 Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
			// if(Yii::$app->request->isAjax){				
				// $model->load(Yii::$app->request->post());				
				// return Json::encode(\yii\widgets\ActiveForm::validate($model));
			// }else{
				// if ($model->load(Yii::$app->request->post())) {
					//$aryKarID="('3.0915.0001','3.0915.0002','3.0915.0004')";
					//$aryKarID=('3.0915.0001','3.0915.0002','3.0915.0004');
					$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'1','AKTIF'=>'1'])->one();
					$closingParam=['tglStart'=>$modelPrd->TGL_START,'tglEnd'=>$modelPrd->TGL_END,'aryKarID'=>$aryKarID];
					//$closingParam=['tglStart'=>'2017-09-08','tglEnd'=>'2017-09-14'];
					$searchModelDetail = new AbsenPayrollPrintSearch($closingParam);
					
					$dataProviderDetail=$searchModelDetail->searchPrint(Yii::$app->request->queryParams);
					$content= $this->renderPartial( '_printPdfAll',[
						'dataProviderDetail'=>$dataProviderDetail,
						'searchModelDetail'=>$searchModelDetail,
						'model'=>$dataProviderDetail->getModels()
					]);
							
					$pdf = new Pdf([
						// set to use core fonts only
						'mode' => Pdf::MODE_CORE,
						// A4 paper format
						'format' => Pdf::FORMAT_A4,
						// portrait orientation
						'orientation' => Pdf::ORIENT_PORTRAIT,
						// stream to browser inline
						'destination' => Pdf::DEST_BROWSER,
						//'destination' => Pdf::DEST_FILE ,
						// your html content input
						'content' => $content,
						// format content from your own css file if needed or use the
						// enhanced bootstrap css built by Krajee for mPDF formatting
						//D:\xampp\htdocs\advanced\lukisongroup\web\widget\pdf-asset
						'cssFile' => '@modulprj/web/addasset/pdf-asset/kv-mpdf-bootstrap.min.css',
						// any css to be embedded if required
						'cssInline' => '.kv-heading-1{font-size:12px}',
						 // set mPDF properties on the fly
						//'options' => ['title' => 'Slip Gaji','subject'=>'Payroll'],
						 // call mPDF methods on the fly
						// 'methods' => [
							// 'SetHeader'=>['Copyright@wanindo '.date("r")],
							// 'SetFooter'=>['{PAGENO}'],
						// ]
					]);					
					return $pdf->render();					
				// }
			// }	
		}		
		
		
		
    }
	
	/**====================================
     * EXPORT EXCEL REPORT PAID
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
	 * @since 1.2
	 * ====================================
     */
	public function actionExportExcel(){
		//DATA IMPORT
		// $aryPaid=[
			// ['TERMINAL_ID'=>'01234567890','FINGER_ID'=>'321','KARYAWAN'=>'Piter','TGL_IN'=>'2017-09-05','TGL_OUT'=>'2017-09-05','JAM_IN'=>'08:00:00','JAM_OUT'=>'17:00:00'],
			// ['TERMINAL_ID'=>'112312312312','FINGER_ID'=>'321','KARYAWAN'=>'Piter','TGL_IN'=>'2017-09-05','TGL_OUT'=>'2017-09-06','JAM_IN'=>'08:00:00','JAM_OUT'=>'02:00:00'],
		// ];
		$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'1','AKTIF'=>'1'])->one();
		$closingParam=['tglStart'=>$modelPrd->TGL_START,'tglEnd'=>$modelPrd->TGL_END];
		$searchModelDetail = new AbsenPayrollPaidSearch($closingParam);
		$dataProviderDetail=$searchModelDetail->searchExcelExport(Yii::$app->request->queryParams);
		$aryPaid=$dataProviderDetail->getModels();	
		
		$excel_dataPaid = Postman4ExcelBehavior::excelDataFormat($aryPaid);
        $excel_titlePaid = $excel_dataPaid['excel_title'];
        $excel_ceilsPaid = $excel_dataPaid['excel_ceils'];
		$excel_content = [
			 [
				'sheet_name' => 'Payroll-Paid-Data',
                'sheet_title' => [
					['KAR_ID','KAR_NM','CABANG','DEPARTMENT','UPAH_HARIAN','PERIODE_MULAI','PERIODE_AKHIR','PAGI','LEMBUR','UANG_MAKAN','TTL_PAGI','TTL_LEMBUR','TTL_POT_TELAT','POT_DIVISI','TOTAL']
				],
			    'ceils' => $excel_ceilsPaid,
                'freezePane' => 'A2',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'headerStyle'=>[					
					[
						'KAR_ID' =>['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'],
						'KAR_NM' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'CABANG' => ['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'DEPARTMENT' => ['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'UPAH_HARIAN' => ['font-size'=>'8','width'=>'15','valign'=>'center','align'=>'center'],
						'PERIODE_MULAI' =>['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'],
						'PERIODE_AKHIR' =>['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'],
						'PAGI' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'LEMBUR' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'UANG_MAKAN' =>['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'],
						'TTL_PAGI' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'TTL_LEMBUR' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'TTL_POT_TELAT' =>['font-size'=>'8','width'=>'15','valign'=>'center','align'=>'center'],
						'POT_DIVISI' =>['font-size'=>'8','width'=>'15','valign'=>'center','align'=>'center'],
						'TOTAL' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
					]						
				],
				'contentStyle'=>[
					[						
						'KAR_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_NM' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'CABANG' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'DEPARTMENT' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'UPAH_HARIAN' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
						'PERIODE_MULAI' =>['font-size'=>'8','valign'=>'center','align'=>'center'],
						'PERIODE_AKHIR' =>['font-size'=>'8','valign'=>'center','align'=>'center'],
						'PAGI' =>['font-size'=>'8','valign'=>'center','align'=>'right'],
						'LEMBUR' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
						'UANG_MAKAN' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
						'TTL_PAGI' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
						'TTL_LEMBUR' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
						'TTL_POT_TELAT' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
						'POT_DIVISI' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
						'TOTAL' => ['font-size'=>'8','valign'=>'center','align'=>'right'],
					]
				],
               'oddCssClass' => Postman4ExcelBehavior::getCssClass("odd"),
               'evenCssClass' => Postman4ExcelBehavior::getCssClass("even"),
			]
		];
		$excel_file = "Payroll-Paid-Data";
		$this->export4excel($excel_content, $excel_file,0);
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
					 return $this->redirect(['index', 'idx' => $model->ID]);
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
     * PAYROLL : SET PERIODE
     */
    public function actionCreatePeriode()
    {
        $modelPeriode = new AbsenImportPeriode();
		//$model->scenario='create';
        $modelPeriode = AbsenImportPeriode::find()->where(['TIPE'=>'1','AKTIF'=>'1'])->one();
		if ($modelPeriode->load(Yii::$app->request->post())) {
			$hsl = \Yii::$app->request->post();
				$modelPeriode->TGL_START = date('Y-m-d', strtotime($hsl['AbsenImportPeriode']['TGL_START']));
				$modelPeriode->TGL_END = date('Y-m-d', strtotime($hsl['AbsenImportPeriode']['TGL_END']));
				$modelPeriode->TIPE =1;
				$modelPeriode->AKTIF =1; 
				if ($modelPeriode->save()){
					//return $this->redirect(['index','#ai-tab1']);
				    return $this->redirect(['/payroll/absen-daily#ai-tab1']);
				}  
		}else{
			return $this->renderAjax('_formPeriode', [
                'modelPeriode' => $modelPeriode,
            ]);
		
		} 
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
		$sql="INSERT INTO absen_import (TERMINAL_ID,FINGER_ID,IN_TGL,IN_WAKTU,OUT_TGL,OUT_WAKTU,GRP_ID)
			  SELECT TERMINAL_ID,FINGER_ID,IN_TGL,IN_WAKTU,OUT_TGL,OUT_WAKTU,GRP_ID
			  FROM absen_import_tmp
		";
		Yii::$app->db->CreateCommand($sql)->execute();
		Yii::$app->db->CreateCommand("DELETE FROM absen_import_tmp")->execute();
		return $this->redirect(['index','#ai-tab1']);
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
		$this->redirect(array('/payroll/absen-import/#ai-tab1'));
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
						$dataModelImport=self::getArryFile($model->FILE_NM)->getModels();
						if($dataModelImport){		
													
							foreach($dataModelImport as $key => $value){
								$modelTmp = new AbsenImportTmp();
								//$modelTmp->ID=null;
								//$modelTmp->isNewRecord = true;							
								$modelTmp->TERMINAL_ID=(string)$value['TERMINAL_ID'];
								$modelTmp->FINGER_ID=(string)$value['FINGER_ID'];
								$modelTmp->IN_TGL=$value['TGL_IN'];
								$modelTmp->IN_WAKTU=$value['JAM_IN'];
								$modelTmp->OUT_TGL=$value['TGL_OUT'];
								$modelTmp->OUT_WAKTU=$value['JAM_OUT'];
								$modelTmp->save();
								//unset($modelTmp);
							}
						};
						return $this->redirect(['index','id'=>$model->FILE_NM]);


						
						// return $this->redirect(['index','id'=>$model->FILE_NM]);
						// $searchModel = new AbsenImportSearch();
						// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
						// return $this->render('index', [
							// 'searchModel' => $searchModel,
							// 'dataProvider' => $dataProvider,
							// 'dataModelImport'=>$dataModelImport
						// ]);
					}
				}
			}
		}
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

			$data = \moonland\phpexcel\Excel::widget([
				'id'=>'import-payroll',
				'mode' => 'import',
				'fileName' => $fileData,
				'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
				'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
				'getOnlySheet' => 'Import-payroll', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
				]);

			//print_r($data);
			$aryDataProvider= new ArrayDataProvider([
				'allModels'=>$data,
				 'pagination' => [
					'pageSize' => 1000,
				]
			]);

			//return Spinner::widget(['preset' => 'medium', 'align' => 'center', 'color' => 'blue','hidden'=>false]);
			return $aryDataProvider;
			
	}
	
	/**=====================================
     * GET VALIDATE DATA
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
	 * =====================================
     */
	public function getValidateDataImport($paramFile){
		
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
		
		//DATA IMPORT
		$aryImport=[
			['TERMINAL_ID'=>'01234567890','FINGER_ID'=>'321','KARYAWAN'=>'Piter','TGL_IN'=>'2017-09-05','TGL_OUT'=>'2017-09-05','JAM_IN'=>'08:00:00','JAM_OUT'=>'17:00:00'],
			['TERMINAL_ID'=>'112312312312','FINGER_ID'=>'321','KARYAWAN'=>'Piter','TGL_IN'=>'2017-09-05','TGL_OUT'=>'2017-09-06','JAM_IN'=>'08:00:00','JAM_OUT'=>'02:00:00'],
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
					x1.TerminalID AS TERMINAL_ID,x1.KAR_ID,x2.KAR_NM,x1.FingerPrintID AS FINGER_ID
				FROM kar_finger x1 left join karyawan x2 on x2.KAR_ID=x1.KAR_ID					
			")->queryAll()
		]);
		$aryKarFinger=$dataKarFinger->allModels;
		$excel_dataKarFinger = Postman4ExcelBehavior::excelDataFormat($aryKarFinger);
        $excel_titleKarFinger = $excel_dataKarFinger['excel_title'];
        $excel_ceilsKarFinger = $excel_dataKarFinger['excel_ceils'];
		
		
		$excel_content = [
			 [
				'sheet_name' => 'Import-payroll',
                'sheet_title' => [
					['TERMINAL_ID','FINGER_ID','NAMA','TGL_IN','TGL_OUT','JAM_IN','JAM_OUT']
				],
			    'ceils' => $excel_ceilsImport,
                'freezePane' => 'A2',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'headerStyle'=>[					
					[
						'TERMINAL_ID' =>['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'],
						'FINGER_ID' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'KARYAWAN' => ['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'TGL_IN' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'TGL_OUT' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'JAM_IN' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'JAM_OUT' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
					]						
				],
				'contentStyle'=>[
					[						
						'TERMINAL_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'FINGER_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KARYAWAN' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'TGL_IN' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
						'TGL_OUT' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
						'JAM_IN' =>['font-size'=>'8','valign'=>'center','align'=>'center'],
						'JAM_OUT' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
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
                    ["  A. NAMA SHEET: Import-payroll"],
					["  B. NAMA HEADER COLUMN : [TERMINAL_ID,FINGER_ID,NAMA,TGL_IN,TGL_OUT,JAM_IN,JAM_OUT]"],
					["3.Refrensi."],
					["  [TERMINAL_ID] = Serial Number pada mesin finger setiap cabang"],
					["  [FINGER_ID] =  Kode Finger yang di dapatkan saat pendaftaran jadi di mesin per-Cabang"],
					["  [KARYAWAN]  =  Nama dari karyawan yang pernah di daftarkan"],
					["  [TGL_IN]    = Tanggal pada saat payroll masuk "],
					["  [TGL_OUT]   = Tanggal pada saat payroll keluar "],
					["  [TGL_OUT]   = Jam pada saat payroll masuk "],
					["  [TGL_OUT]   = Jam pada saat payroll keluar "],
					["4.Refrensi Kode."],
					["  [TERMINAL_ID] = Sheet Cabang-Mechine"],
					["  [FINGER_ID]  = Sheet Data-Karyawan"],					
					["  [KARYAWAN]    = Sheet Data-Karyawan"],					
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
					['TERMINAL_ID','KAR_ID','KAR_NM','FINGER_ID']
				],
			    'ceils' => $excel_ceilsKarFinger,
                'freezePane' => 'A2',
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
                'headerStyle'=>[					
					[
						'TERMINAL_ID' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'KAR_ID' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'KAR_NM' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'FINGER_ID' =>['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
					]						
				],
				'contentStyle'=>[
					[						
						'TERMINAL_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_NM' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'FINGER_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
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
