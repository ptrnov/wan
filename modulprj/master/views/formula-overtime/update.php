<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\FormulaOvertime */

$this->title = 'Update Formula Overtime: ' . $model->FOT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Formula Overtimes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FOT_ID, 'url' => ['view', 'id' => $model->FOT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formula-overtime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
