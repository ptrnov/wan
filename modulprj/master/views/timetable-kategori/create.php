<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableKategori */

$this->title = 'Create Timetable Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Timetable Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-kategori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
