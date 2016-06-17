<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollLoanHeader */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Loan Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-loan-header-view">

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
            'TGL',
            'PNJ_NM',
            'PNJ_PAY_REGULASI',
            'PNJ_PAY_MONTH',
            'PNJ_PAY',
            'STT',
            'KET',
        ],
    ]) ?>

</div>
