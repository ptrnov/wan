<?php

namespace lukisongroup\controllers\master;

use Yii;
use app\models\master\Unitbarang;
use app\models\master\UnitbarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnitbarangController implements the CRUD actions for Unitbarang model.
 */
class UnitbarangController extends Controller
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
     * Lists all Unitbarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnitbarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unitbarang model.
     * @param string $id
     * @param string $kd_unit
     * @return mixed
     */
    public function actionView($ID, $KD_UNIT)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $KD_UNIT),
        ]);
    }

    /**
     * Creates a new Unitbarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Unitbarang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'KD_UNIT' => $model->KD_UNIT]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Unitbarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $kd_unit
     * @return mixed
     */
    public function actionUpdate($ID, $KD_UNIT)
    {
        $model = $this->findModel($ID, $KD_UNIT);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'KD_UNIT' => $model->KD_UNIT]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Unitbarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $kd_unit
     * @return mixed
     */
    public function actionDelete($ID, $KD_UNIT)
    {
        $this->findModel($ID, $KD_UNIT)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Unitbarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $kd_unit
     * @return Unitbarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $KD_UNIT)
    {
        if (($model = Unitbarang::findOne(['ID' => $ID, 'KD_UNIT' => $KD_UNIT])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
