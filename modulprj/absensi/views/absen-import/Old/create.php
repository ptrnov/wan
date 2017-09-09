<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\absensi\models\AbsenImport */

$this->title = 'Create Absen Import';
$this->params['breadcrumbs'][] = ['label' => 'Absen Imports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absen-import-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
