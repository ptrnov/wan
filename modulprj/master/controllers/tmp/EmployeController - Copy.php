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
	use yii\web\Request;
	use yii\web\Response;
	use yii\helpers\Url;
	use yii\widgets\Pjax;

	use yii\web\NotFoundHttpException;
	use yii\filters\VerbFilter;
	use yii\helpers\ArrayHelper;
/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
	  use common\components\GcodeComponent;
    use yii\helpers\Json;
	use yii\web\UploadedFile;
	use kartik\grid\GridView;
	use kartik\date\DatePicker;
	use kartik\helpers\Html;
	use yii\bootstrap\Modal;
/*Array COMBO*/	
use modulprj\master\models\Karyawan;
use modulprj\master\models\KaryawanSearch;	    /* TABLE CLASS SEARCH */
  
use modulprj\master\models\Dept;
use modulprj\master\models\Cbg;
use modulprj\master\models\Jabatan;
use modulprj\master\models\Status;
use modulprj\master\models\Golongan;
	
	
/**
 * HRD | CONTROLLER EMPLOYE .
 */
class EmployeController extends Controller
{
	
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

	public function aryDept(){ 
		return ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');
	}
	public function aryDeptID(){ 
		return ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');
	}
	public function aryCbg(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_NM','CAB_NM');
	}
	public function aryCbgID(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM');
	}
	public function aryJab(){ 
		return ArrayHelper::map(Jabatan::find()->all(), 'JAB_NM','JAB_NM');
	}
	public function aryJabID(){ 
		return ArrayHelper::map(Jabatan::find()->all(), 'JAB_ID','JAB_NM');
	}
	public function aryStt(){ 
		return ArrayHelper::map(Status::find()->all(), 'KAR_STS_NM','KAR_STS_NM');
	}
	public function arySttID(){ 
		return ArrayHelper::map(Status::find()->all(), 'KAR_STS_ID','KAR_STS_NM');
	}
	public function aryGol(){ 
		return ArrayHelper::map(Golongan::find()->all(), 'TT_GRP_NM','TT_GRP_NM');
	}
	public function aryGolID(){ 
		return ArrayHelper::map(Golongan::find()->all(), 'TT_GRP_ID','TT_GRP_NM');
	}
	
	
	
	
    /**
     * ACTION INDEX
     */
    public function actionIndex()
    {	/*	variable content View Employe Author: -ptr.nov- */
		/* if (Yii::$app->request->isGet){
			$result = Yii::$app->request->isGet;
			//$id=$result['id'];
			//$test=$result['kd']!=false?$_GET['kd']:'0';
			print_r($result['KAR_ID']);
			// if($result!=''){
				// $searchModel = new KaryawanSearch($result);
				// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			// }else{
				// $searchModel = new KaryawanSearch();
				// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			// }
			
			 $searchModel = new KaryawanSearch(['KAR_ID'=>$result]);
			 //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}else{
			$searchModel = new KaryawanSearch();
			//$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		} */
			
		/*
		 * SEARCH FIRST AND DIRECT 
		 * @author piter [ptr.nov@gmail.com]
		 * @since 1.2
		*/
		$paramCari=Yii::$app->getRequest()->getQueryParam('id');
		if ($paramCari!=''){
			$cari=['KAR_ID'=>$paramCari];			
		}else{
			$cari='';			
		};
		
		//print_r($cari);
		
		$searchModel = new KaryawanSearch($cari);
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		//variable content View Additional Author: -ptr.nov-
        $searchModel1 = new KaryawanSearch();
        $dataProvider1 = $searchModel1->searchresign(Yii::$app->request->queryParams);
  
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,  
            'dataProvider1' => $dataProvider1,  
			'aryDept'=>$this->aryDept(),
			'aryCbgID'=>$this->aryCbgID(),
			'aryCbg'=>$this->aryCbg(),
			'aryJab'=>$this->aryJab(),
			'aryStt'=>$this->aryStt(),
			'aryGol'=>$this->aryGol(),			
        ]);
    }

    /**
	 * ACTION VIEW -> $id=PrimaryKey
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        //$modelVal = new Karyawan();
		 $post = Yii::$app->request->post();  
		$DeptMDL=Dept::find()->where(['DEP_ID'=>$model->DEP_ID])->orderBy('DEP_NM')->one();
			$modelDept=$DeptMDL!=''?$DeptMDL->DEP_NM:'none';
		$CbgMDL = Cbg::find()->where(['CAB_ID'=>$model->CAB_ID])->orderBy('CAB_NM')->one();
			$modelCbg = $CbgMDL!=''?$CbgMDL->CAB_NM:'none';
		$JabMDL = Jabatan::find()->where(['JAB_ID'=>$model->JAB_ID])->orderBy('JAB_NM')->one();
			$modelJab = $JabMDL!=''?$JabMDL->JAB_NM:'none';
		$sttMDL = Status::find()->where(['KAR_STS_ID'=>$model->KAR_STS])->orderBy('KAR_STS_NM')->one();		
			$modelStatus = $sttMDL!=''?$sttMDL->KAR_STS_NM:'none';
		 // if(Yii::$app->request->isAjax){
			 // $modelVal->load(Yii::$app->request->post());
			 // return Json::encode(\yii\widgets\ActiveForm::validate($modelVal));
		 // };
		
		//if ($model->load(\Yii::$app->request->post())){
		if ($model->load(Yii::$app->request->post())){
			//$model->save(false);
			//if ($model->load($_POST) && $model->save()){
			 // $result = \Yii::$app->request->post();				
			 // $model->KAR_TLP=$result['Karyawan']['KAR_TLP'];
			// $model->KAR_HP=$result['Karyawan']['KAR_HP'];
			// $model->KAR_MAILP=$result['Karyawan']['KAR_MAILP'];
			//$model->KAR_ALMT=$result['Karyawan']['KAR_ALMT'];			
			// $model->save();
			if($model->save()){
				// echo 1;
				//$model->refresh();				
				return $this->redirect(['/master/employe/']);
				 //Yii::$app->session->setFlash('kv-detail-success', 'Success Message');
			};
		}else{
			return $this->renderAjax('view', [
				'model' => $model,
				'aryDept'=>$this->aryDept(),
				'modelDept'=>$modelDept,
				'modelCbg'=>$modelCbg,
				'modelJab'=>$modelJab,
				'modelStatus'=>$modelStatus,
				'aryCbgID'=>$this->aryCbgID(),
			]);
		}

    }
	
	public function actionViewContact($id)
    {
        $model = $this->findModel($id);
        //$modelVal = new Karyawan();
		 $post = Yii::$app->request->post();  
		$DeptMDL=Dept::find()->where(['DEP_ID'=>$model->DEP_ID])->orderBy('DEP_NM')->one();
			$modelDept=$DeptMDL!=''?$DeptMDL->DEP_NM:'none';
		$CbgMDL = Cbg::find()->where(['CAB_ID'=>$model->CAB_ID])->orderBy('CAB_NM')->one();
			$modelCbg = $CbgMDL!=''?$CbgMDL->CAB_NM:'none';
		$JabMDL = Jabatan::find()->where(['JAB_ID'=>$model->JAB_ID])->orderBy('JAB_NM')->one();
			$modelJab = $JabMDL!=''?$JabMDL->JAB_NM:'none';
		$sttMDL = Status::find()->where(['KAR_STS_ID'=>$model->KAR_STS])->orderBy('KAR_STS_NM')->one();		
			$modelStatus = $sttMDL!=''?$sttMDL->KAR_STS_NM:'none';
		//if(Yii::$app->request->isAjax){
			//$modelVal->load(Yii::$app->request->post());
			//return Json::encode(\yii\widgets\ActiveForm::validate($modelVal));
		if ($model->load(Yii::$app->request->post())){
			$result = \Yii::$app->request->post();				
			$model->KAR_TLP=$result['Karyawan']['KAR_TLP'];
			$model->KAR_HP=$result['Karyawan']['KAR_HP'];
			$model->KAR_MAILP=$result['Karyawan']['KAR_MAILP'];
			$model->save();
			return $this->redirect(['/master/employe/']);
			//Yii::$app->session->setFlash('kv-detail-success', 'Success Message');
		}else{
			return $this->renderAjax('view', [
				'model' => $model,
				'aryDept'=>$this->aryDept(),
				'modelDept'=>$modelDept,
				'modelCbg'=>$modelCbg,
				'modelJab'=>$modelJab,
				'modelStatus'=>$modelStatus,
				'aryCbgID'=>$this->aryCbgID(),
			]);
		}
    }
	
	public function actionViewIndentitas($id)
    {
        $model = $this->findModel($id);
        //$modelVal = new Karyawan();
		 $post = Yii::$app->request->post();  
		$DeptMDL=Dept::find()->where(['DEP_ID'=>$model->DEP_ID])->orderBy('DEP_NM')->one();
			$modelDept=$DeptMDL!=''?$DeptMDL->DEP_NM:'none';
		$CbgMDL = Cbg::find()->where(['CAB_ID'=>$model->CAB_ID])->orderBy('CAB_NM')->one();
			$modelCbg = $CbgMDL!=''?$CbgMDL->CAB_NM:'none';
		$JabMDL = Jabatan::find()->where(['JAB_ID'=>$model->JAB_ID])->orderBy('JAB_NM')->one();
			$modelJab = $JabMDL!=''?$JabMDL->JAB_NM:'none';
		$sttMDL = Status::find()->where(['KAR_STS_ID'=>$model->KAR_STS])->orderBy('KAR_STS_NM')->one();		
			$modelStatus = $sttMDL!=''?$sttMDL->KAR_STS_NM:'none';
		//if(Yii::$app->request->isAjax){
			//$modelVal->load(Yii::$app->request->post());
			//return Json::encode(\yii\widgets\ActiveForm::validate($modelVal));
		if ($model->load(Yii::$app->request->post())){
			$result = \Yii::$app->request->post();				
			$model->KAR_KTP=$result['Karyawan']['KAR_KTP'];
			$model->save();
			return $this->redirect(['/master/employe/']);
		    //Yii::$app->session->setFlash('kv-detail-success', 'Success Message');
		}else{
			return $this->renderAjax('view', [
				'model' => $model,
				'aryDept'=>$this->aryDept(),
				'modelDept'=>$modelDept,
				'modelCbg'=>$modelCbg,
				'modelJab'=>$modelJab,
				'modelStatus'=>$modelStatus,
				'aryCbgID'=>$this->aryCbgID(),
			]);
		}
    }
	
	
	
	
	
	
    /**
     * ACTION CREATE note | $id=PrimaryKey -> TRIGER FROM VIEW  -ptr.nov-
     */
    public function actionCreate()
    {
		$model = new Karyawan();
		if ($model->load(Yii::$app->request->post()) ) {					
			//call function contentBase64 using base64
			$upload_file = $model->uploadImage();
			$data_base64 = $upload_file != ''? $this->contentBase64(file_get_contents($upload_file->tempName)): ''; 
			$model->IMG64 = $data_base64;

			$result = \Yii::$app->request->post();				
			$kd = Yii::$app->ambilkonci->getKey_Employe($result['Karyawan']['CAB_ID']);
			$model->KAR_ID = $kd;
			$model->KAR_TGLM=date('Y-m-d');
			//$model->KAR_NM=
			if($model->validate()){
				//$model->CREATED_BY = Yii::$app->user->identity->username;				
				if ($model->save()) {
					// upload only if valid uploaded file instance found
					if ($upload_file !== false) {
						$path = $model->getImageFile();
						$upload_file->saveAs($path);
					} 
				}
			}
			 return $this->redirect(['index','id'=>$model->KAR_ID]);
		}else {
            return $this->renderAjax('create', [
                'model' => $model,
				'aryCbgID'=>$this->aryCbgID()
            ]);
        }
		
		
		
		
		
		
		
		
		
		
		
		
                //$EMP_ID='DDPX';
               // $EMP_ID = Yii::$app->request->getIsPost('ssss');
                //$file_name = Yii::app()->request->getParam( 'file' );
                //$EMP_ID1=(string)$_POST(MyParam1);
                //print_r('ok'.$EMP_ID);

        /*
                //$EMP_ID=$_GET['KAR_ID'];
                //$generate_key_emp1= Yii::$app->ambilkonci->getKey_Employe($EMP_ID);
                if ($EMP_ID!='') {
                    $generate_key_emp= Yii::$app->ambilkonci->getKey_Employe($EMP_ID);
                }else{
                    $generate_key_emp =$EMP_ID;
                };

                if (Yii::$app->request->post('name')) {
                    //$EMP_ID = Yii::$app->request->post('editableKey');
                   //$model = Employe::findOne($EMP_ID);

                    // store a default json response as desired by editable
                    //$out = Json::encode(['output'=>'', 'message'=>'']);

                    $enerate_key_emp= Yii::$app->ambilkonci->getKey_Employe('DDPX');
                    //return $generate_key_emp;
                    //$post = [];
                    //$posted = current($_POST['Employe']);
                    //$post['Employe'] = $posted;
                    //$out = Json::encode(['output'=>$output, 'message'=>'']);
                    //echo $out;
                    return $enerate_key_emp;
                }


                if (isset($_POST['depdrop_parents'])) {
                   // $parents = $_POST['depdrop_parents'];
                    //if ($parents != null) {
                     //   $cab_id = $parents[0];
                      //  $generate_key_emp= Yii::$app->ambilkonci->getKey_Employe($cab_id);
                       // print_r($generate_key_emp);
                    //}
                    $enerate_key_emp= Yii::$app->ambilkonci->getKey_Employe('DDPX');
                }
                //$generate_key_emp= Yii::$app->ambilkonci->getKey_Employe('DDPX');


        $model = new Karyawan();




        if (Yii::$app->request->isAjax) {
            //Yii::$app->response->format = Response::FORMAT_JSON;
            $generate_key_emp = Yii::$app->ambilkonci->getKey_Employe('DDPX');



        }

       */
        //$_GET['foo']
       // print_r($_GET[$id]);
       /*  $generate_key_emp= Yii::$app->ambilkonci->getKey_Employe('HO');
        //$generate_key_emp= Yii::$app->ambilkonci->getKey_Employe('DDPX');
        $model = new Karyawan();
        if ($model->load(Yii::$app->request->post())){
			$upload_file=$model->uploadFile();
			var_dump($model->validate());
			if($model->validate()){
				if($model->save()) {
					if ($upload_file !== false) {
						$path=$model->getUploadedFile();
                        $path1=str_replace('*','',$path);
						$upload_file->saveAs($path1);
					}
					return $this->redirect(['view', 'id' => $model->KAR_ID]);
				} 
			}
		}else {

            return $this->render('create', [
                'model' => $model,
                'gkey_emp' => $generate_key_emp,
            ]);
        }
       // print_r($EMP_ID); */

    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

	public function actionEditIdentity($id){
        $model = $this->findModel($id);
		
		if (!$model->load(Yii::$app->request->post())) {
			return $this->renderAjax('_form_edit_identity', [
					'model' => $model,
					'aryCbgID'=>$this->aryCbgID(),
				]); 				
		}else{
				
			if(Yii::$app->request->isAjax){
				$model->load(Yii::$app->request->post());
				return Json::encode(\yii\widgets\ActiveForm::validate($model));
			}else{
				if ($model->load(Yii::$app->request->post())) {
					//$model->save();
					$image = $model->uploadImage();
					if ($model->save()) {
						// upload only if valid uploaded file instance found
						if ($image !== false) {
							$path = $model->getImageFile();
							$image->saveAs($path);
						} 
					}
					return $this->redirect(['index','id'=>$model->KAR_ID]);			
				}
			}	
		}
	}

	public function actionEditTitel($id)
    {
        $model = $this->findModel($id);
		
		if (!$model->load(Yii::$app->request->post())) {
			return $this->renderAjax('_form_edit_title', [
					'model' => $model,
					'aryCbgID'=>$this->aryCbgID(),
				]); 				
		}else{
				
			if(Yii::$app->request->isAjax){
				$model->load(Yii::$app->request->post());
				return Json::encode(\yii\widgets\ActiveForm::validate($model));
			}else{
				if ($model->load(Yii::$app->request->post())) {
					//$model->save();
					$image = $model->uploadImage();
					if ($model->save()) {
						// upload only if valid uploaded file instance found
						if ($image !== false) {
							$path = $model->getImageFile();
							$image->saveAs($path);
						} 
					}
					return $this->redirect(['index','id'=>$model->KAR_ID]);
					/* if(Yii::$app->request->isAjax){
						$model->load(Yii::$app->request->post());
						return Json::encode(\yii\widgets\ActiveForm::validate($model));
					} */				
				}
			}	
		}
		
		
		/* if(Yii::$app->request->isAjax){
			$model->load(Yii::$app->request->post());
			return Json::encode(\yii\widgets\ActiveForm::validate($model));
		}else{
			
		// print_r($model);
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['index','id'=>$model->KAR_ID]);
			} else {
				return $this->renderAjax('_form_edit_title', [
					'model' => $model,
					'aryCbgID'=>$this->aryCbgID(),
				]); 
			}
        } */
		
		
		
    }

	public function actionEditTitelSave($id)
    {
        $model = $this->findModel($id);
		
		/* if(Yii::$app->request->isAjax){
			$model->load(Yii::$app->request->post());
			return Json::encode(\yii\widgets\ActiveForm::validate($model));
		}else{ */
			
		// print_r($model);
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['index','id'=>$model->KAR_ID]);
			}
        //} 
		
		
		
    }
	
	
	
	
	
    /**
     * ACTION UPDATE -> $id=PrimaryKey
     */
   /*  public function actionEditTitel($id){
        
		$model = $this->findModel($id);		
		
        //if ($model->load(Yii::$app->request->post())) {	
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			//$hsl = \Yii::$app->request->post();
			//$model->KAR_NM = $hsl['Karyawan']['KAR_NM'];
			//$model->save();		
			//$image = $model->uploadImage();
			// if ($model->save()) {
				// upload only if valid uploaded file instance found
				// if ($image !== false) {
					// $path = $model->getImageFile();
					// $image->saveAs($path);
				// }  
				// print_r(Yii::$app->request->post());
				// die();
				
			// } 
            //return $this->redirect(['view', 'id' => $model->KAR_ID]);
			return $this->redirect(['index','id'=>$model->KAR_ID]);
        } else {
            //return $this->renderAjax('_form_edit_title', [
            return $this->renderAjax('_form', [
                'model' => $model,
				'aryDept'=>$this->aryDept(),
				'aryCbgID'=>$this->aryCbgID(),
				'aryJab'=>$this->aryJab(),
				'aryStt'=>$this->aryStt(),
				'aryGol'=>$this->aryGol(),	
            ]);
        }	
	} */

    /**
     * ACTION DELETE -> $id=PrimaryKey | CHANGE STATUS -> lihat Standart table status | Jangan dihapus dari record
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * CLASS TABLE FIND PrimaryKey
     * Example:  Employe::find()
     */
    protected function findModel($id)
    {
        if (($model = Karyawan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	// THE CONTROLLER
	public function actionSubcat() {
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			//print_r($parents);
			if ($parents != null) {
				$cat_id = $parents[0];
				$generate_key_emp1= Yii::$app->ambilkonci->getKey_Employe($cat_id);
				//$out = self::getSubCatList($cat_id);
				// the getSubCatList function will query the database based on the
				// cat_id and return an array like below:
			   // $out = self::getSubCatList1($cat_id);
				$data=[
						'out'=>[
							//['id'=>$generate_key_emp1, 'name'=> $generate_key_emp1],
							['id'=> $generate_key_emp1, 'name'=>$generate_key_emp1, 'options'=> ['style'=>['color'=>'red'],'disabled'=>false]],
							//['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
							],
						'selected'=>$generate_key_emp1,
					];
			   // $selected = self::getSubcat($cat_id);

				echo Json::encode(['output'=>$data['out'], 'selected'=>$data['selected']]);
				return;
			}
		}
		echo Json::encode(['output'=>'', 'selected'=>'']);
	}
		
    public function actionProd() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            print_r($ids);
            $cat_id = empty($ids[0]) ? null : $ids[0];
            if ($cat_id != null) {
                $data = self::getProdList($cat_id);
                /**
                 * the getProdList function will query the database based on the
                 * cat_id and sub_cat_id and return an array like below:
                 *  [
                 *      'out'=>[
                 *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
                 *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
                 *       ],
                 *       'selected'=>'<prod-id-1>'
                 *  ]
                 */

                echo Json::encode(['output'=>$data['out'], 'selected'=>$data['selected']]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
	
	
	
	
	
	/*
	 * convert base 64 image
	 * @author piter [ptr.nov@gmail.com] 
	 * @since 1.0
	*/
    public function contentBase64($base64)
    {
      $base64 = str_replace('data:image/jpg;base64,', '', $base64);
      $base64 = base64_encode($base64);
      $base64 = str_replace(' ', '+', $base64);
      return $base64;
    }
	
}
