<?php

use yii\helpers\Html;


//$this->title = Yii::t('app', 'Create Maxiprodak');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employe'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?php echo Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
        //'kar_newkey' => $gkey_emp
    ]) ?>


