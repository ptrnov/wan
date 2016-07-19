<?php

namespace modulprj\master\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use yii\web\Request;
use yii\helpers\Url;

use modulprj\master\models\PayrollSalary;
use modulprj\master\models\PayrollSalarySearch;
use modulprj\master\models\Karyawan;
use modulprj\master\models\Cbg;
use modulprj\master\models\Dept;
/**
 * PayrollSalaryController implements the CRUD actions for PayrollSalary model.
 */
class PayrollSalaryController extends Controller
{
	public function aryCbg(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM');
	}
	public function aryDep(){ 
		return ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');
	}
	public function aryKaryawan(){ 
		return ArrayHelper::map(Karyawan::find()->all(), 'KAR_ID','KAR_NM');
	}
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PayrollSalary models.
     * @return mixed
     */
    public function actionIndex()
    {
		$paramCari=Yii::$app->getRequest()->getQueryParam('id');
		if ($paramCari!=''){
			$cari=['KAR_ID'=>$paramCari];
		}else{
			$cari='';
		};
        $searchModel = new PayrollSalarySearch($cari);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'aryKaryawan'=>$this->aryKaryawan(),
        ]);
    }

	/**
     * DepDrop CABANG | KARYAWAN
     * @author ptrnov  <piter@lukison.com>
     * @since 1.1
     */
	public function actionCabangEmploye() {
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if ($parents != null) {
				$cab_id = $parents[0];
				$dep_id = $parents[1];
				$model = Karyawan::find()->asArray()->where(['CAB_ID'=>$cab_id,'DEP_ID'=>$dep_id])->all();
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
     * Displays a single PayrollSalary model.
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
     * Creates a new PayrollSalary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PayrollSalary();

		if(!$model->load(Yii::$app->request->post())){
			return $this->renderAjax('_form', [
						'model' => $model,
						'aryCbg'=>$this->aryCbg(),
						'aryDep'=>$this->aryDep(),
						'aryKaryawan'=>$this->aryKaryawan(),
					]);
		}else{
			if(Yii::$app->request->isAjax){
					$model->load(Yii::$app->request->post());
					return Json::encode(\yii\widgets\ActiveForm::validate($model));
			}else{
				if ($model->load(Yii::$app->request->post()) && $model->save()) {
					return $this->redirect(['index', 'id' => $model->KAR_ID]);
				}		
			}   
		}
    }

    /**
     * Updates an existing PayrollSalary model.
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
     * Deletes an existing PayrollSalary model.
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
     * Finds the PayrollSalary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PayrollSalary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PayrollSalary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
