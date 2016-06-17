<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsosFormula */

$this->title = 'Update Payroll Jamsos Formula: ' . $model->SOS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Jamsos Formulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SOS_ID, 'url' => ['view', 'id' => $model->SOS_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payroll-jamsos-formula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
