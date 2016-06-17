<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinHeader */

$this->title = 'Update Ijin Header: ' . $model->IJN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ijin Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IJN_ID, 'url' => ['view', 'id' => $model->IJN_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ijin-header-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
