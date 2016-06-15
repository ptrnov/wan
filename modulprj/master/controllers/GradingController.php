<?php

namespace modulprj\master\controllers;

use Yii;
use modulprj\master\models\Grading;
use modulprj\master\models\GradingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GradingController implements the CRUD actions for Grading model.
 */
class GradingController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Grading models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GradingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Grading model.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return mixed
     */
    public function actionView($ID, $JOBGRADE_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $JOBGRADE_ID),
        ]);
    }

    /**
     * Creates a new Grading model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Grading();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Grading model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return mixed
     */
    public function actionUpdate($ID, $JOBGRADE_ID)
    {
        $model = $this->findModel($ID, $JOBGRADE_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Grading model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return mixed
     */
    public function actionDelete($ID, $JOBGRADE_ID)
    {
        $this->findModel($ID, $JOBGRADE_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grading model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param string $JOBGRADE_ID
     * @return Grading the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $JOBGRADE_ID)
    {
        if (($model = Grading::findOne(['ID' => $ID, 'JOBGRADE_ID' => $JOBGRADE_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
