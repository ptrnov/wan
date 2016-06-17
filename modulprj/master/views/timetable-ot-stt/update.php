<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableOtStt */

$this->title = 'Update Timetable Ot Stt: ' . $model->STT_OT_DPN;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Ot Stts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->STT_OT_DPN, 'url' => ['view', 'id' => $model->STT_OT_DPN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-ot-stt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
