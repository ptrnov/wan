<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollLoanHeader */

$this->title = 'Create Payroll Loan Header';
$this->params['breadcrumbs'][] = ['label' => 'Payroll Loan Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-loan-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
