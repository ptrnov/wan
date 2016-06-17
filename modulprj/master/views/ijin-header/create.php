<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinHeader */

$this->title = 'Create Ijin Header';
$this->params['breadcrumbs'][] = ['label' => 'Ijin Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
