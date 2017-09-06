<?php

namespace modulprj\master\controllers;

use Yii;
use yii\helpers\Json;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use ptrnov\postman4excel\Postman4ExcelBehavior;
use yii\web\Response;

class EmployeExportController extends Controller
{
	public function behaviors()
    {
        return [
			'export4excel' => [
				'class' => Postman4ExcelBehavior::className(),
				//'downloadPath'=>Yii::getAlias('@modulprj').'/uploads/temp/',
				//'downloadPath'=>'/var/www/backup/customer/',
				'widgetType'=>'download',
			], 
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ]
        ];
    }

	/**
     * Lists all Customers models.
     * @return mixed
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
	/*
	 * EXPORT DATA CUSTOMER TO EXCEL
	 * export_data
	*/
	public function actionIndex(){

		//$custDataMTI=Yii::$app->db_esm->createCommand("CALL ERP_MASTER_CUSTOMER_export('CUSTOMER_MTI')")->queryAll();
						
		$aryEmp= new ArrayDataProvider([
			'key' => 'ID',
			'allModels'=>Yii::$app->db->createCommand("
							SELECT DISTINCT KAR_ID AS KARYAWAN_ID,KAR_NM AS KARYAWAN,
								(CASE WHEN x2.DEP_ID<>'' THEN (SELECT DEP_NM FROM departemen WHERE DEP_ID=x2.DEP_ID LIMIT 1) ELSE 'none' END) AS DEPARTMENT,
								 x2.JOBGRADE_ID as GOLONGAN,
								(CASE WHEN x2.GF_ID<>'' THEN (SELECT GF_NM FROM kepangkatan WHERE GF_ID=x2.GF_ID LIMIT 1) ELSE 'none' END) AS GF_NM,
								(CASE WHEN x2.JOBGRADE_ID<>'' THEN (SELECT JOBGRADE_NM FROM grading WHERE JOBGRADE_ID=x2.JOBGRADE_ID LIMIT 1) ELSE 'none' END) AS GRADING_NM,								
								(CASE WHEN x2.CAB_ID<>'' THEN (SELECT CAB_NM FROM cabang WHERE CAB_ID=x2.CAB_ID LIMIT 1) ELSE 'none' END) AS CAB_NM,
								(CASE WHEN x2.KAR_STS<>'' THEN (SELECT KAR_STS_NM FROM kar_stt WHERE KAR_STS_ID=x2.KAR_STS LIMIT 1) ELSE 'none' END) AS STATUS_KERJA,								
								DATE_FORMAT(x2.KAR_TGLM,'%d-%m-%Y') as TANGGAL_MASUK,
								KAR_KTP,KAR_ALMT,KAR_TLP,KAR_HP,KAR_TGL_LAHIR,
								(CASE WHEN x2.AGAMA_ID<>'' THEN (SELECT AGAMA_NM FROM agama WHERE AGAMA_ID=x2.AGAMA_ID LIMIT 1) ELSE 'none' END) AS AGAMA,
								(CASE WHEN x2.STT_ID='K' THEN 'KAWIN' ELSE 'TIDAK KAWIN' END) AS STT_NIKAH,
								(CASE WHEN x2.KAR_JK='1' THEN 'PRIA' ELSE 'WANITA' END) AS GENDER,
								(CASE WHEN x2.PEN_ID<>'' THEN (SELECT PEN_NM FROM pendidikan WHERE PEN_ID=x2.PEN_ID LIMIT 1) ELSE 'none' END) AS PEN_NM,
								JML_ANAK
							FROM karyawan x2;
						")->queryAll(),
			'pagination' => [
				'pageSize' => 10,
			]
		]);
		// print_r($aryEmp->allModels);
		// die();
		$aryEmpProvider=$aryEmp->allModels;
		
		$excel_data= Postman4ExcelBehavior::excelDataFormat($aryEmpProvider);      
        $excel_ceils= $excel_data['excel_ceils'];		
		$excel_content = [
			[
				'sheet_name' => 'Data_Karyawan',
				'ceils' => $excel_ceils,
                'freezePane' => 'A2',
				'columnGroup'=>['KARYAWAN_ID'],
				'autoSize'=>false,
                'headerColor' => Postman4ExcelBehavior::getCssClass("header"),
				'sheet_title' => [
					[
						'KARYAWAN_ID','KARYAWAN','DEPARTMENT','GOLONGAN','LEVEL','GRADING','CABANG','STATUS_KERJA','TANGGAL_MASUK','KTP','ALAMAT',
						'TLP','HP','TGL LAHIR','AGAMA','STATUS PERNIKAHAN','JENIS KELAMIN','PENDIDIKAN','JUMLAH ANAK'
					]
				],
                'headerStyle'=>[					
					[
						'KARYAWAN_ID' =>['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'],
						'KARYAWAN' =>['font-size'=>'8','width'=>'23','valign'=>'center','align'=>'center'],
						'DEPARTMENT' => ['font-size'=>'8','width'=>'23','valign'=>'center','align'=>'center','wrap'=>true],
						'GOLONGAN' => ['font-size'=>'8','width'=>'10','valign'=>'center','align'=>'center'],
						'LEVEL' => ['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'GRADING' =>['font-size'=>'8','width'=>'20','valign'=>'center','align'=>'center'],
						'CABANG' =>['font-size'=>'8','width'=>'17','valign'=>'center','align'=>'center'],
						'STATUS_KERJA' => ['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center','wrap'=>true],
						'TANGGAL_MASUK' => ['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'], 
						'KTP' => ['font-size'=>'8','width'=>'12','valign'=>'center','align'=>'center'],
						'ALAMAT' => ['font-size'=>'8','width'=>'7','valign'=>'center','align'=>'center'],
						'TLP' => ['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'],
						'HP' => ['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'],
						'TGL LAHIR' => ['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'],
						'AGAMA' => ['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'],
						'STATUS PERNIKAHAN' => ['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'],
						'JENIS KELAMIN' => ['font-size'=>'8','width'=>'13','valign'=>'center','align'=>'center'],
						'PENDIDIKAN' => ['font-size'=>'8','width'=>'16','valign'=>'center','align'=>'center'],
						'JUMLAH ANAK' => ['font-size'=>'8','width'=>'16','valign'=>'center','align'=>'center']
					]						
				],
				'contentStyle'=>[
					[						
						'KARYAWAN_ID' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KARYAWAN' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'DEPARTMENT' => ['font-size'=>'8','valign'=>'center','align'=>'left','wrap'=>true],
						'GOLONGAN' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
						'LEVEL' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'GRADING' =>['font-size'=>'8','valign'=>'center','align'=>'left'],
						'CABANG' => ['font-size'=>'8','valign'=>'center','align'=>'left','wrap'=>true],
						'STATUS_KERJA' => ['font-size'=>'8','valign'=>'center','align'=>'left'], 
						'TANGGAL_MASUK' => ['font-size'=>'8','valign'=>'center','align'=>'center'],
						'KAR_KTP' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_ALMT' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_TLP' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_HP' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_TGL_LAHIR' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'AGAMA' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'STT_NIKAH' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'KAR_PEN' => ['font-size'=>'8','valign'=>'center','align'=>'left'],
						'JML_ANAK' => ['font-size'=>'8','valign'=>'center','align'=>'right']
					]
				],
               'oddCssClass' => Postman4ExcelBehavior::getCssClass("odd"),
               'evenCssClass' => Postman4ExcelBehavior::getCssClass("even"),
			]			
		];

		$excel_file = "Data_Karyawan";
		$this->export4excel($excel_content, $excel_file);
	}
}