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
use ptrnov\postman4excel\Postman4ExcelBehavior;

use modulprj\absensi\models\AbsenImport;
use modulprj\absensi\models\AbsenImportSearch;

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
     * Lists all AbsenImport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AbsenImportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AbsenImport model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AbsenImport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AbsenImport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

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
     * Deletes an existing AbsenImport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
	
	/**====================================
     * EXPORT FORMAT
     * @return mixed
	 * @author piter [ptr.nov@gmail.com]
	 * @since 1.2
	 * ====================================
     */
	public function actionExport(){
		
		//DATA CABANG
		$dataCabang= new ArrayDataProvider([
			 'key' => 'ID',
			  'allModels'=>Yii::$app->db->createCommand("
					SELECT 
						MESIN_NM AS TERMINAL_ID,
						MESIN_SN AS CABANG
					FROM machine 
			  ")->queryAll(),
			   'pagination' => [
				 'pageSize' => 10,
			 ]
		]);
		$aryCabang=$dataCabang->allModels;
		$excel_dataCbg = Postman4ExcelBehavior::excelDataFormat($aryCabang);
        $excel_titleCbg = $excel_dataCbg['excel_title'];
        $excel_ceilsCbg = $excel_dataCbg['excel_ceils'];
		
		//DATA Import
		$aryImport=[
			['TERMINAL_ID'=>'1234567890',''=>'FINGER_ID','KARYAWAN'=>'Piter','TGL_IN'=>'2017-09-05','TGL_OUT'=>'2017-09-05','JAM_IN'=>'08:00:00','JAM_OUT'=>'17:00:00'],
			['TERMINAL_ID'=>'1234567890',''=>'FINGER_ID','KARYAWAN'=>'Piter','TGL_IN'=>'2017-09-05','TGL_OUT'=>'2017-09-06','JAM_IN'=>'08:00:00','JAM_OUT'=>'02:00:00'],
		];		
		$excel_dataImport = Postman4ExcelBehavior::excelDataFormat($aryImport);
        $excel_titleImport = $excel_dataImport['excel_title'];
        $excel_ceilsImport = $excel_dataImport['excel_ceils'];
		
		$excel_content = [
			 [
				'sheet_name' => 'Import-Absensi',
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
					["  [KARYAWAN]  =  Nama dari karyawan yang pernah di daftarkan"],
					["  [TGL_IN]    = Tanggal pada saat absensi masuk "],
					["  [TGL_OUT]   = Tanggal pada saat absensi keluar "],
					["  [TGL_OUT]   = Jam pada saat absensi masuk "],
					["  [TGL_OUT]   = Jam pada saat absensi keluar "],
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

		];
		$excel_file = "ImportFormat";
		$this->export4excel($excel_content, $excel_file,0);
	}
}
