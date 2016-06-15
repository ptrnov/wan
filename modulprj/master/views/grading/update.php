<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\Grading */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Grading',
]) . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gradings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'JOBGRADE_ID' => $model->JOBGRADE_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="grading-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
