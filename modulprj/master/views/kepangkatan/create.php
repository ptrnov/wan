<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\Kepangkatan */

$this->title = Yii::t('app', 'Create Kepangkatan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kepangkatans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepangkatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
