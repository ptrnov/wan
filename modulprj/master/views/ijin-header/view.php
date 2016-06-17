<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinHeader */

$this->title = $model->IJN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ijin Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-header-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IJN_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IJN_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IJN_ID',
            'IIJN_NM',
            'IJIN_KET',
        ],
    ]) ?>

</div>
