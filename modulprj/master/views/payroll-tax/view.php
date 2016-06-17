<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollTax */

$this->title = $model->KAR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Taxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-tax-view">

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
            'TTL_UPAH',
            'PTKP_NM',
            'PTKP_VALUE',
            'UPAH_PTKP',
            'TTL_PTKP',
            'PPH21',
        ],
    ]) ?>

</div>
