<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableNormal */

$this->title = 'Update Timetable Normal: ' . $model->TT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Normals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TT_ID, 'url' => ['view', 'id' => $model->TT_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-normal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
