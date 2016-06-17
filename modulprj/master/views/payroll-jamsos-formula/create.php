<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsosFormula */

$this->title = 'Create Payroll Jamsos Formula';
$this->params['breadcrumbs'][] = ['label' => 'Payroll Jamsos Formulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-jamsos-formula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
