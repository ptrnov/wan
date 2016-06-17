<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinDetail */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Ijin Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'KAR_ID',
            'IJN_SDATE',
            'IJN_EDATE',
            'IJN_ID',
            'IJN_NOTE:ntext',
        ],
    ]) ?>

</div>
