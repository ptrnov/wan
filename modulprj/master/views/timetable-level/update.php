<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableLevel */

$this->title = 'Update Timetable Level: ' . $model->LVL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LVL_ID, 'url' => ['view', 'id' => $model->LVL_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
