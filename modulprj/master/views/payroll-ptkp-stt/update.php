<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollPtkpStt */

$this->title = 'Update Payroll Ptkp Stt: ' . $model->STT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Ptkp Stts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->STT_ID, 'url' => ['view', 'id' => $model->STT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-ptkp-stt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
