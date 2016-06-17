<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollLoanDetail */

$this->title = 'Update Payroll Loan Detail: ' . $model->KAR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Loan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KAR_ID, 'url' => ['view', 'id' => $model->KAR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-loan-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
