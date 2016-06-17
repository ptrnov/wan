<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\HariLibur */

$this->title = 'Update Hari Libur: ' . $model->LBR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Hari Liburs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LBR_ID, 'url' => ['view', 'id' => $model->LBR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hari-libur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
