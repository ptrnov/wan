<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\FormulaOvertimeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formula Overtimes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formula-overtime-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Formula Overtime', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'FOT_ID',
            'TT_GRP_ID',
            'FOT_NM',
            'FOT_JAM1',
            'FOT_JAM2',
            // 'FOT_PERSEN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
