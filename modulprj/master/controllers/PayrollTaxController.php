<?php

namespace modulprj\master\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use modulprj\master\models\PayrollTax;
use modulprj\master\models\PayrollTaxSearch;
use modulprj\master\models\PayrollPtkpFormulaSearch;
use modulprj\master\models\PayrollPtkpSttSearch;
/**
 * PayrollTaxController implements the CRUD actions for PayrollTax model.
 */
class PayrollTaxController extends Controller
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
     * Lists all PayrollTax models.
     * @return mixed
     */
    public function actionIndex()
    {
		/*PPH21*/
        $searchModel = new PayrollTaxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		/*PTKP*/
		$searchModelPtkp = new PayrollPtkpFormulaSearch();
        $dataProviderPtkp = $searchModelPtkp->search(Yii::$app->request->queryParams);
		/*STATUS*/
     	$searchModelStt = new PayrollPtkpSttSearch();
        $dataProviderStt = $searchModelStt->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'searchModelPtkp'=>$searchModelPtkp,
			'dataProviderPtkp'=>$dataProviderPtkp,
			'searchModelStt'=>$searchModelStt,
			'dataProviderStt'=>$dataProviderStt,
        ]);
    }

    /**
     * Displays a single PayrollTax model.
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
     * Creates a new PayrollTax model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PayrollTax();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KAR_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PayrollTax model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
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
     * Deletes an existing PayrollTax model.
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
     * Finds the PayrollTax model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PayrollTax the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PayrollTax::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
