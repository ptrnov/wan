<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinDetail */

$this->title = 'Create Ijin Detail';
$this->params['breadcrumbs'][] = ['label' => 'Ijin Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
