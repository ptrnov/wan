<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\GradingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Gradings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grading-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Grading'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'GF_ID',
            'JOBGRADE_ID',
            'JOBGRADE_NM',
            'JOBGRADE_DCRP:ntext',
            // 'JOBGRADE_STS',
            // 'CREATED_BY',
            // 'UPDATED_BY',
            // 'UPDATED_TIME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
