<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableKategori */

$this->title = 'Update Timetable Kategori: ' . $model->TT_TYPE_KTG;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TT_TYPE_KTG, 'url' => ['view', 'id' => $model->TT_TYPE_KTG]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-kategori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
