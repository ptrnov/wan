<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollPtkpFormula */

$this->title = 'Update Payroll Ptkp Formula: ' . $model->NO;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Ptkp Formulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NO, 'url' => ['view', 'id' => $model->NO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-ptkp-formula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
