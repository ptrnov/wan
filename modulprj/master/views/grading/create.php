<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\Grading */

$this->title = Yii::t('app', 'Create Grading');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gradings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grading-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
