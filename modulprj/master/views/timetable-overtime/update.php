<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableOvertime */

$this->title = 'Update Timetable Overtime: ' . $model->TT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Overtimes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TT_ID, 'url' => ['view', 'id' => $model->TT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-overtime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
