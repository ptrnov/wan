<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsos */

$this->title = $model->KAR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Jamsos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-jamsos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->KAR_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->KAR_ID], [
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
            'KAR_ID',
            'sDate',
            'eDate',
            'SOS_ID',
            'DATA UPAH',
            'JKK',
            'JKM',
            'JPK',
            'JHT_TK',
            'JHT',
            'SOS_TTL',
            'PERSEN_JKK',
            'PERSEN_JKM',
            'PERSEN_JPK',
            'PERSEN_JHT_TK',
            'PERSEN_JHT',
        ],
    ]) ?>

</div>
