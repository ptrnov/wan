<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollAsuransiFormula */

$this->title = 'Update Payroll Asuransi Formula: ' . $model->ASR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Asuransi Formulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ASR_ID, 'url' => ['view', 'id' => $model->ASR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-asuransi-formula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
