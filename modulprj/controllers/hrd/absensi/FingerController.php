<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\controllers\hrd\absensi;

/* VARIABLE BASE YII2 Author: -YII2- */
	use modulprj\models\hrd\Karyawan;
    use Yii;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;
	use yii\filters\VerbFilter;
/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
	use modulprj\models\hrd\Finger;			/* TABLE CLASS JOIN */
	use modulprj\models\hrd\FingerSearch;		/* TABLE CLASS SEARCH */
    use yii\helpers\Json;
/**
 * HRD | CONTROLLER EMPLOYE .
 */
class FingerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['Finger']),
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
		/*	variable content View Employe Author: -ptr.nov- */
        $searchModel_Finger = new FingerSearch();
		$dataProvider_Finger = $searchModel_Finger->search(Yii::$app->request->queryParams);

        /*SHOW ARRAY JESON Author: -ptr.nov-*/
        //echo  \yii\helpers\Json::encode($dataProvider->getModels());
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $NO_URUT = Yii::$app->request->post('editableKey');
            $model = Finger::findOne($NO_URUT);
            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Finger']);
            $post['Finger'] = $posted;
            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model
                $model->save();
                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';
                // specific use case where you need to validate a specific
                // editable column posted when you have more than one
                // EditableColumn in the grid view. We evaluate here a
                // check to see if buy_amount was posted for the Book model
                if (isset($posted['FingerPrintID'])) {
                    // $output =  Yii::$app->formatter->asDecimal($model->EMP_NM, 2);
                    $output =$model->FingerPrintID;
                }
                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                //   $output =  ''; // process as you need
                // }
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }

		return $this->render('index', [
			'searchModel_Finger'=>$searchModel_Finger,
			'dataProvider_Finger'=>$dataProvider_Finger,
        ]);
    }

    /**
	 * ACTION VIEW -> $id=PrimaryKey
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);;
		if ($model->load(Yii::$app->request->post())){
			if($model->validate()){
				if($model->save()) {
					return $this->redirect(['view', 'id' => $model->NO_URUT]);
				} 
			}
		}else {
            //$model1=Karyawan::find()->where(['KAR_ID'=>$model->KAR_ID])->one();
            $searchModel_Finger = new FingerSearch();
            $dataProvider_Finger = $searchModel_Finger->searchview_emp($model->KAR_ID);
            return $this->render('view', [
                'model' => $model,
                //'model1' =>$model1,
                'searchModel_Finger'=>$searchModel_Finger,
                'dataProvider_Finger'=>$dataProvider_Finger,
            ]);
        }
    }

    /**
     * ACTION CREATE note | $id=PrimaryKey -> TRIGER FROM VIEW  -ptr.nov-
     */
    public function actionCreate()
    {		
        $model = new Finger();
        if ($model->load(Yii::$app->request->post())){
				if($model->validate()){
				if($model->save()) {
					return $this->redirect(['view', 'id' => $model->NO_URUT]);
				} 
			}
		}else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * ACTION UPDATE -> $id=PrimaryKey
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->NO_URUT]);
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
        if (($model = Finger::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
}
