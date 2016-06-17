<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollAsuransi */

$this->title = 'Update Payroll Asuransi: ' . $model->KAR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Asuransis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KAR_ID, 'url' => ['view', 'id' => $model->KAR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-asuransi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
