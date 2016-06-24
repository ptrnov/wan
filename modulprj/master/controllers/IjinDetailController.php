<?php

namespace modulprj\master\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Response;
use yii\web\Request;

use modulprj\master\models\IjinDetail;
use modulprj\master\models\IjinDetailSearch;
use modulprj\master\models\IjinHeaderSearch;
use modulprj\master\models\IjinHeader;
use modulprj\master\models\Cbg;
use modulprj\master\models\Karyawan;

class IjinDetailController extends Controller
{
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
     * ACTION INDEX
     */
	/* -- Created By ptr.nov --*/
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
	
	public function aryCbg(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM');
	}
	public function aryKaryawan(){ 
		return ArrayHelper::map(Karyawan::find()->all(), 'KAR_ID','KAR_NM');
	}
	public function aryIjinHeader(){ 
		return ArrayHelper::map(IjinHeader::find()->all(), 'IJN_ID','IIJN_NM');
	}
	
    /**
     * Lists all IjinDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
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
		
        $searchModelDetail = new IjinDetailSearch($cari);
        $dataProviderDetail = $searchModelDetail->search(Yii::$app->request->queryParams);
		
		$searchModelHeader = new IjinHeaderSearch();
        $dataProviderHeader = $searchModelHeader->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModelDetail' => $searchModelDetail,
            'dataProviderDetail' => $dataProviderDetail,
			'searchModelHeader'=>$searchModelHeader,
			'dataProviderHeader'=>$dataProviderHeader,
			'aryKaryawan'=>$this->aryKaryawan(),
			'aryIjinHeader'=>$this->aryIjinHeader(),
        ]);
    }

    /**
     * Displays a single IjinDetail model.
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
     * Creates a new IjinDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IjinDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->KAR_ID]);
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
				'aryCbg'=>$this->aryCbg(),
				'aryKaryawan'=>$this->aryKaryawan(),
				'aryIjinHeader'=>$this->aryIjinHeader(),
            ]);
        }
    }

	/**
     * DepDrop CABANG | KARYAWAN
     * @author ptrnov  <piter@lukison.com>
     * @since 1.1
     */
	public function actionCabangEmploye() {
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$cab_id = $_POST['depdrop_parents'];
			if ($cab_id != null) {
				//$corp_id = $parents[0];
				$model = Karyawan::find()->asArray()->where(['CAB_ID'=>$cab_id])->all();
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
     * Updates an existing IjinDetail model.
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
     * Deletes an existing IjinDetail model.
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
     * Finds the IjinDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IjinDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IjinDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
