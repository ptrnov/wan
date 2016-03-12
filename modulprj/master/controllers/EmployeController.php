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
	use modulprj\master\models\Karyawan;			/* TABLE CLASS JOIN */
	use modulprj\master\models\KaryawanSearch;	    /* TABLE CLASS SEARCH */
    use common\components\GcodeComponent;
    use yii\helpers\Json;
	use yii\web\UploadedFile;



/**
 * HRD | CONTROLLER EMPLOYE .
 */
class EmployeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['Employe','Karyawan']),
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
		/*	variable content View Side Menu Author: -Eka- */
		//set menu side menu index - Array Jeson Decode
       // $side_menu=M1000::find()->findMenu('sss_berita_acara')->one()->jval;
        //$side_menu=json_decode($side_menu,true);

		/*	variable content View Employe Author: -ptr.nov- */
        $searchModel = new KaryawanSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		//variable content View Additional Author: -ptr.nov-
        $searchModel1 = new KaryawanSearch();
        $dataProvider1 = $searchModel1->searchresign(Yii::$app->request->queryParams);

		//SHOW ARRAY YII Author: -Devandro-
		//print_r($dataProvider->getModels());
		
		//SHOW ARRAY JESON Author: -ptr.nov-
		//echo  \yii\helpers\Json::encode($dataProvider->getModels());
        
		return $this->render('index', [
			//'side_menu'=>$side_menu,			/* Content variable Array -SideMenu- */
            'searchModel' => $searchModel, 		/* Content variable Array -Filter Search- */
            'dataProvider' => $dataProvider,	/* Content variable Array -Class Table Join- */
            'searchModel1' => $searchModel1,  /* Content variable Array Aditional -Class Table Join- */
            'dataProvider1' => $dataProvider1,  /* Content variable Array Aditional -Class Table Join- */
        ]);
    }

    /**
	 * ACTION VIEW -> $id=PrimaryKey
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);;
		if ($model->load(Yii::$app->request->post())){
			$upload_file=$model->uploadFile();
			var_dump($model->validate());
			if($model->validate()){
				if($model->save()) {
					if ($upload_file !== false) {
						$path=$model->getUploadedFile();
                        //print_r($path);
						//$upload_file->saveAs($path);
                        $path1=str_replace('****','',$path);
                        $upload_file->saveAs($path1);
					}
					return $this->redirect(['view', 'id' => $model->KAR_ID]);
				} 
			}
		}
        return $this->render('view', [
            'model' => $model,
        ]);


    }

    /**
     * ACTION CREATE note | $id=PrimaryKey -> TRIGER FROM VIEW  -ptr.nov-
     */
    public function actionCreate()
    {
                $EMP_ID='DDPX';
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
        $generate_key_emp= Yii::$app->ambilkonci->getKey_Employe('HO');
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
       // print_r($EMP_ID);

    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }








    /**
     * ACTION UPDATE -> $id=PrimaryKey
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KAR_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

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
	
}
