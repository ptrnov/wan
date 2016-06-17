<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollPtkpStt */

$this->title = 'Create Payroll Ptkp Stt';
$this->params['breadcrumbs'][] = ['label' => 'Payroll Ptkp Stts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-ptkp-stt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
