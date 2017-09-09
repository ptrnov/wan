<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\absensi\models\AbsenImport */

$this->title = 'Update Absen Import: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Absen Imports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absen-import-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
