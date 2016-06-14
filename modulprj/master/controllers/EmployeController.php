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
use modulprj\master\models\Kepangkatan;
use modulprj\master\models\Status;
use modulprj\master\models\Timetable;
use modulprj\master\models\Pendidikan;
	
	
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
	public function aryDeptId(){ 
		return ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');
	}
	public function aryCbg(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_NM','CAB_NM');
	}
	public function aryCbgId(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM');
	}
	public function aryGf(){ 
		return ArrayHelper::map(Kepangkatan::find()->all(), 'GF_NM','GF_NM');
	}
	public function aryGfId(){ 
		return ArrayHelper::map(Kepangkatan::find()->all(), 'GF_ID','GF_NM');
	}
	public function aryStt(){ 
		return ArrayHelper::map(Status::find()->all(), 'KAR_STS_NM','KAR_STS_NM');
	}
	public function arySttId(){ 
		return ArrayHelper::map(Status::find()->all(), 'KAR_STS_ID','KAR_STS_NM');
	}
	public function aryTimeTable(){ 
		return ArrayHelper::map(Timetable::find()->all(), 'TT_GRP_NM','TT_GRP_NM');
	}
	public function aryTimeTableId(){ 
		return ArrayHelper::map(Timetable::find()->all(), 'TT_GRP_ID','TT_GRP_NM');
	}
	public function arySchool(){ 
		return ArrayHelper::map(Pendidikan::find()->all(), 'PEN_ID','PEN_NM');
	}
	
	/**
     * Before Action Index
	 * @author ptrnov  <piter@lukison.com>
	 * @since 1.1
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
			'aryDeptId'=>$this->aryDeptId(),
			'aryCbgId'=>$this->aryCbgId(),
			'aryCbg'=>$this->aryCbg(),
			'aryGfId'=>$this->aryGfId(),
			'arySttId'=>$this->arySttId(),
			'aryTimeTableId'=>$this->aryTimeTableId(),			
        ]);
    }

    /**
	 * ACTION VIEW -> $id=PrimaryKey
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
		 // if(Yii::$app->request->isAjax){
			 // $modelVal->load(Yii::$app->request->post());
			 // return Json::encode(\yii\widgets\ActiveForm::validate($modelVal));
		 // };
		
		//if ($model->load(\Yii::$app->request->post())){
		if ($model->load(Yii::$app->request->post())){
			$upload_file = $model->uploadImage();
			$data_base64 = $upload_file != ''? $this->contentBase64(file_get_contents($upload_file->tempName)): ''; 
			//print_r($data_base64);
			if ($data_base64!=''){
				$model->IMG64 = $data_base64;
			};
			//$model->save(false);
			if($model->save(false)){
				//$model->refresh();
				
				return $this->redirect(['/master/employe/']);
				 //Yii::$app->session->setFlash('kv-detail-success', 'Success Message');
			};
		}else{
			return $this->renderAjax('view', [
				'model' => $model,
				'aryCbgId'=>$this->aryCbgId(),
				'aryDeptId'=>$this->aryDeptId(),
				'arySchool'=>$this->arySchool(),
				'aryGfId'=>$this->aryGfId(),
				'arySttId'=>$this->arySttId(),
				'aryTimeTableId'=>$this->aryTimeTableId(),
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
