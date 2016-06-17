<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableGroup */

$this->title = 'Update Timetable Group: ' . $model->TT_GRP_ID;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TT_GRP_ID, 'url' => ['view', 'id' => $model->TT_GRP_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
