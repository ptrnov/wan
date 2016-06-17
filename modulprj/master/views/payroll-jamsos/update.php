<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsos */

$this->title = 'Update Payroll Jamsos: ' . $model->KAR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Jamsos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KAR_ID, 'url' => ['view', 'id' => $model->KAR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-jamsos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
