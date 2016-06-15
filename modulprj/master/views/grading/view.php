<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\Grading */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gradings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grading-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'GF_ID',
            'JOBGRADE_ID',
            'JOBGRADE_NM',
            'JOBGRADE_DCRP:ntext',
            'JOBGRADE_STS',
            'CREATED_BY',
            'UPDATED_BY',
            'UPDATED_TIME',
        ],
    ]) ?>

</div>
