<?php

namespace modulprj\master\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use modulprj\master\models\TimetableNormal;
use modulprj\master\models\TimetableNormalSearch;
use modulprj\master\models\TimetableOvertimeSearch;
use modulprj\master\models\TimetableGroup;
use modulprj\master\models\TimetableGroupSearch;
use modulprj\master\models\TimetableLevelSearch;
use modulprj\master\models\TimetableOtSttSearch;
use modulprj\master\models\TimetableKategori;
use modulprj\master\models\TimetableKategoriSearch;
use modulprj\master\models\FormulaOvertimeSearch;

/*Day of Week*/
	
/**
 * TimetableNormalController implements the CRUD actions for TimetableNormal model.
 */
class TimetableNormalController extends Controller
{
	public function aryTtGrp(){ 
		return ArrayHelper::map(TimetableGroup::find()->all(), 'TT_GRP_ID','TT_GRP_NM');
	}
	public function aryTtKtg(){ 
		return ArrayHelper::map(TimetableKategori::find()->all(), 'TT_TYPE_KTG','TT_TYPE');
	}
	
	public function aryTtKtgOvertime(){ 
		return ArrayHelper::map(TimetableKategori::find()->where('TT_TYPE_KTG<>1')->all(), 'TT_TYPE_KTG','TT_TYPE');
	}
	
	/*Day of week Mysql*/
	private function aryDayOfWeek(){ 
		$dayOfWeek= [
			['id' => 1, 'DESCRIP' => 'Minggu'],
			['id' => 2, 'DESCRIP' => 'Senin'],
			['id' => 3, 'DESCRIP' => 'Selasa'],
			['id' => 4, 'DESCRIP' => 'Rabu'],
			['id' => 5, 'DESCRIP' => 'Kamis'],
			['id' => 6, 'DESCRIP' => 'Jumat'],
			['id' => 7, 'DESCRIP' => 'Sabtu']
		];
		return ArrayHelper::map($dayOfWeek, 'id', 'DESCRIP');
	}
	
	/*Status Disable/Enable*/
	private function aryStt(){ 
		$stts= [
			['ID' => 0, 'STT' => 'Disable'],
			['ID' => 1, 'STT' => 'Enable'],
			['ID' => 2, 'STT' => 'Delete']
		];
		return ArrayHelper::map($stts, 'ID', 'STT');
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
     * Lists all TimetableNormal models.
     * @return mixed
     */
    public function actionIndex()
    {
		/*Time Table Normal*/
        $searchModel = new TimetableNormalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		/*Time Table Overtime*/
		$searchModelOt = new TimetableOvertimeSearch();
        $dataProviderOt = $searchModelOt->search(Yii::$app->request->queryParams);
		
		/*Option Group*/
		$searchModelGrp = new TimetableGroupSearch();
        $dataProviderGrp = $searchModelGrp->search(Yii::$app->request->queryParams);
		/*Option Level*/
		$searchModelLvl = new TimetableLevelSearch();
        $dataProviderLvl = $searchModelLvl->search(Yii::$app->request->queryParams);
		/*Option Status*/
		$searchModelStt = new TimetableOtSttSearch();
        $dataProviderStt = $searchModelStt->search(Yii::$app->request->queryParams);
		/*Option Kategori*/
		$searchModelKtg = new TimetableKategoriSearch();
        $dataProviderKtg = $searchModelKtg->search(Yii::$app->request->queryParams);
		/*Option FORMULA*/
		$searchModelFormula = new FormulaOvertimeSearch();
        $dataProviderFormula = $searchModelFormula->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'searchModelOt'=>$searchModelOt,
			'dataProviderOt'=>$dataProviderOt,
			/*Option*/
			'searchModelGrp'=>$searchModelGrp,
			'dataProviderGrp'=>$dataProviderGrp,
			'searchModelLvl'=>$searchModelLvl,
			'dataProviderLvl'=>$dataProviderLvl,
			'searchModelStt'=>$searchModelStt,
			'dataProviderStt'=>$dataProviderStt,
			'searchModelKtg'=>$searchModelKtg,
			'dataProviderKtg'=>$dataProviderKtg,
			'searchModelFormula'=>$searchModelFormula,
			'dataProviderFormula'=>$dataProviderFormula,
        ]);
    }

    /**
     * Displays a single TimetableNormal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$searchModel = new TimetableOvertimeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
			'arrayDayOfWeek'=>$this->aryDayOfWeek(),
			'aryStt'=>$this->aryStt(),
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new TimetableNormal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TimetableNormal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
				'aryTtGrp'=>$this->aryTtGrp(),
				'aryTtKtg'=>$this->aryTtKtg(),
				'arrayDayOfWeek'=>$this->aryDayOfWeek(),
				'aryStt'=>$this->aryStt(),
            ]);
        }
    }

	/**
     * Creates a new TimetableNormal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateOvertime()
    {
        $model = new TimetableNormal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->renderAjax('_formOvertime', [
                'model' => $model,
				'aryTtGrp'=>$this->aryTtGrp(),
				'aryTtKtg'=>$this->aryTtKtgOvertime(),
				'arrayDayOfWeek'=>$this->aryDayOfWeek(),
				'aryStt'=>$this->aryStt(),
            ]);
        }
    }
	
    /**
     * Updates an existing TimetableNormal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TT_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TimetableNormal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TimetableNormal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TimetableNormal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TimetableNormal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
