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
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
	
use modulprj\master\models\IjinDetail;
use modulprj\master\models\IjinDetailSearch;
use modulprj\master\models\IjinHeaderSearch;
use modulprj\master\models\IjinHeader;
use modulprj\master\models\Cbg;
use modulprj\master\models\Karyawan;
use modulprj\master\models\Dept;

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
	
	public function aryCbg(){ 
		return ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM');
	}
	public function aryDep(){ 
		return ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');
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
		
		$tab=Yii::$app->getRequest()->getQueryParam('tab');
		
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
			'aryCbg'=>$this->aryCbg(),
			'aryDep'=>$this->aryDep(),
			'tab'=>$tab
        ]);
    }

    /**
     * Displays a single IjinDetail model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
     
		if ($model->load(Yii::$app->request->post())){
			//$model->save(false);
			if($model->save()){
				//$model->refresh();
				
				return $this->redirect(['/master/ijin-detail/']);
				 //Yii::$app->session->setFlash('kv-detail-success', 'Success Message');
			};
		}else{
			return $this->renderAjax('_view', [
				'model' => $model,
				'aryIjinHeader'=>$this->aryIjinHeader(),
			]);
		}
    }
	
	/**
     * View Editing IjinHeader.
     * @param string $id
     * @return mixed
     */
    public function actionViewHeader($id)
    {
		$model = IjinHeader::findOne($id);
     
		if ($model->load(Yii::$app->request->post())){
			//$model->save(false);
			if($model->save()){
				//$model->refresh();
				
				return $this->redirect(['/master/ijin-detail/index?tab=1']);
				 //Yii::$app->session->setFlash('kv-detail-success', 'Success Message');
			};
		}else{
			return $this->renderAjax('_viewHeader', [
				'model' => $model,
			]);
		}
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
				'aryDep'=>$this->aryDep(),
				'aryKaryawan'=>$this->aryKaryawan(),
				'aryIjinHeader'=>$this->aryIjinHeader(),
            ]);
        }
    }

	public function actionCreateHeader(){
		$model = new  IjinHeader();
		if ($model->load(Yii::$app->request->post())){
			$result = \Yii::$app->request->post();	
			$model->IIJN_NM = strtoupper($result['IjinHeader']['IIJN_NM']);
			if($model->save()){
				return $this->redirect(['/master/ijin-detail','tab'=>1]);
			};
		}else{	
			return $this->renderAjax('_formHeader',['model'=>$model]);
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
