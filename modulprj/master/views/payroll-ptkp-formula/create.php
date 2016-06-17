<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollPtkpFormula */

$this->title = 'Create Payroll Ptkp Formula';
$this->params['breadcrumbs'][] = ['label' => 'Payroll Ptkp Formulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-ptkp-formula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
