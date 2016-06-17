<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableOtStt */

$this->title = 'Create Timetable Ot Stt';
$this->params['breadcrumbs'][] = ['label' => 'Timetable Ot Stts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-ot-stt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
