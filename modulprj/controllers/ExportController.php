<?php

namespace modulprj\controllers;

use Yii;
use yii\helpers\Json;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use scotthuangzl\export2excel\Export2ExcelBehavior;
use yii\web\Response;

class ExportController extends Controller
{
    public function behaviors()
    {
        return [
			'export2excel' => [
				'class' => Export2ExcelBehavior::className(),
			],
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ]
        ];
    }

	public function actions()
    {
        return [
            'download' => [
                'class' => 'scotthuangzl\export2excel\DownloadAction',
            ],
        ];
    }

    /**
     * Lists all Customers models.
     * @return mixed
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
	/*
	 * EXPORT DATA CUSTOMER TO EXCEL
	 * export_data
	*/
	public function actionEmploye(){

		//$custDataMTI=Yii::$app->db_esm->createCommand("CALL ERP_MASTER_CUSTOMER_export('CUSTOMER_MTI')")->queryAll();
						
		$aryEmp= new ArrayDataProvider([
			'key' => 'ID',
			'allModels'=>Yii::$app->db->createCommand("
							SELECT DISTINCT KAR_ID,KAR_NM,
								(CASE WHEN x2.DEP_ID<>'' THEN (SELECT DEP_NM FROM departemen WHERE DEP_ID=x2.DEP_ID LIMIT 1) ELSE 'none' END) AS DEP_NM,
								 x2.JOBGRADE_ID as Golongan,
								(CASE WHEN x2.GF_ID<>'' THEN (SELECT GF_NM FROM kepangkatan WHERE GF_ID=x2.GF_ID LIMIT 1) ELSE 'none' END) AS GF_NM,
								(CASE WHEN x2.JOBGRADE_ID<>'' THEN (SELECT JOBGRADE_NM FROM grading WHERE JOBGRADE_ID=x2.JOBGRADE_ID LIMIT 1) ELSE 'none' END) AS GRADING_NM,								
								(CASE WHEN x2.CAB_ID<>'' THEN (SELECT CAB_NM FROM cabang WHERE CAB_ID=x2.CAB_ID LIMIT 1) ELSE 'none' END) AS CAB_NM,
								(CASE WHEN x2.KAR_STS<>'' THEN (SELECT KAR_STS_NM FROM kar_stt WHERE KAR_STS_ID=x2.KAR_STS LIMIT 1) ELSE 'none' END) AS KAR_STS_NM,								
								DATE_FORMAT(x2.KAR_TGLM,'%d-%m-%Y') as JoinDate,
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

		$excel_data = Export2ExcelBehavior::excelDataFormat($aryEmpProvider);
        $excel_title = $excel_data['excel_title'];
        $excel_ceils = $excel_data['excel_ceils'];
		$excel_content = [
			 [
				'sheet_name' => 'Employee',
                'sheet_title' => [
					'KAR_ID','KAR_NM','DEPARTMENT','GOLONGAN','LEVEL','GRADING','CABANG','STATUS KERJA','TANGGAL MASUK','KTP','ALAMAT',
					'TLP','HP','TGL LAHIR','AGAMA','STATUS PERNIKAHAN','JENIS KELAMIN','PENDIDIKAN','JUMLAH ANAK'
				],
			    'ceils' => $excel_ceils,
                //'freezePane' => 'E2',
                'headerColor' => Export2ExcelBehavior::getCssClass("header"),
                'headerColumnCssClass' => [
					 'KAR_ID' => Export2ExcelBehavior::getCssClass('header'),
					 'KAR_NM' => Export2ExcelBehavior::getCssClass('header'),
					 'DEP_NM' => Export2ExcelBehavior::getCssClass('header'),
					 'Golongan' => Export2ExcelBehavior::getCssClass('header'),
					 'GF_NM' => Export2ExcelBehavior::getCssClass('header'),
					 'GRADING_NM' => Export2ExcelBehavior::getCssClass('header'),
					 'CAB_NM' => Export2ExcelBehavior::getCssClass('header'),
					 'KAR_STS_NM' => Export2ExcelBehavior::getCssClass('header'),
					 'JoinDate' => Export2ExcelBehavior::getCssClass('header'),					 
					 'KAR_KTP' => Export2ExcelBehavior::getCssClass('header'),					 
					 'KAR_ALMT' => Export2ExcelBehavior::getCssClass('header'),					 
					 'KAR_TLP' => Export2ExcelBehavior::getCssClass('header'),					 
					 'KAR_HP' => Export2ExcelBehavior::getCssClass('header'),					 
					 'KAR_TGL_LAHIR' => Export2ExcelBehavior::getCssClass('header'),					 
					 'AGAMA' => Export2ExcelBehavior::getCssClass('header'),					 
					 'STT_NIKAH' => Export2ExcelBehavior::getCssClass('header'),					 
					 'GENDER' => Export2ExcelBehavior::getCssClass('header'),					 
					 'KAR_PEN' => Export2ExcelBehavior::getCssClass('header'),					 
					 'JML_ANAK' => Export2ExcelBehavior::getCssClass('header'),					 
                ], //define each column's cssClass for header line only.  You can set as blank.
               'oddCssClass' => Export2ExcelBehavior::getCssClass("odd"),
               'evenCssClass' => Export2ExcelBehavior::getCssClass("even"),
			]
			/* [
				'sheet_name' => 'IMPORTANT NOTE ',
                'sheet_title' => ["Important Note For Import Stock Customer"],
                'ceils' => [
					["1.pastikan tidak merubah format hanya menambahkan data, karena import versi 1.2 masih butuhkan pengembangan validasi"],
                    ["2.Berikut beberapa format nama yang tidak di anjurkan di ganti:"],
                    ["  A. Nama dari Sheet1: IMPORT FORMAT STOCK "],
					["  B. Nama Header seperti column : DATE,CUST_KD,CUST_NM,SKU_ID,SKU_NM,QTY_PCS,DIS_REF"],
					["3.Refrensi."],
					["  'IMPORT FORMAT STOCK'= Nama dari Sheet1 yang aktif untuk di import "],
					["  'DATE'= Tanggal dari data stok yang akan di import "],
					["  'CUST_KD'= Kode dari customer, dimana setiap customer memiliki kode sendiri sendiri sesuai yang mereka miliki "],
					["  'CUST_NM'= Nama dari customer "],
					["  'SKU_ID'=  Kode dari Item yang mana customer memiliku kode items yang berbeda beda "],
					["  'SKU_NM'=  Nama dari Item, sebaiknya disamakan dengan nama yang dimiliki lukisongroup"],
					["  'QTY_PCS'= Quantity dalam unit PCS "],
					["  'DIS_REF'= Kode dari pendistribusian, contoh pendistribusian ke Distributor, Subdisk, Agen dan lain-lain"],
				],
			],
			[
				'sheet_name' => 'IMPORTANT NOTE ',
                'sheet_title' => ["Important Note For Import Stock Customer"],
                'ceils' => [
					["1.pastikan tidak merubah format hanya menambahkan data, karena import versi 1.2 masih butuhkan pengembangan validasi"],
                    ["2.Berikut beberapa format nama yang tidak di anjurkan di ganti:"],
                    ["  A. Nama dari Sheet1: IMPORT FORMAT STOCK "],
					["  B. Nama Header seperti column : DATE,CUST_KD,CUST_NM,SKU_ID,SKU_NM,QTY_PCS,DIS_REF"],
					["3.Refrensi."],
					["  'IMPORT FORMAT STOCK'= Nama dari Sheet1 yang aktif untuk di import "],
					["  'DATE'= Tanggal dari data stok yang akan di import "],
					["  'CUST_KD'= Kode dari customer, dimana setiap customer memiliki kode sendiri sendiri sesuai yang mereka miliki "],
					["  'CUST_NM'= Nama dari customer "],
					["  'SKU_ID'=  Kode dari Item yang mana customer memiliku kode items yang berbeda beda "],
					["  'SKU_NM'=  Nama dari Item, sebaiknya disamakan dengan nama yang dimiliki lukisongroup"],
					["  'QTY_PCS'= Quantity dalam unit PCS "],
					["  'DIS_REF'= Kode dari pendistribusian, contoh pendistribusian ke Distributor, Subdisk, Agen dan lain-lain"],
				],
			], */
		];

		$excel_file = "EmployeeData";
		$this->export2excel($excel_content, $excel_file);
	}
}