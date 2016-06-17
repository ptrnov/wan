<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\FormulaOvertime */

$this->title = $model->FOT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Formula Overtimes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formula-overtime-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->FOT_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->FOT_ID], [
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
            'FOT_ID',
            'TT_GRP_ID',
            'FOT_NM',
            'FOT_JAM1',
            'FOT_JAM2',
            'FOT_PERSEN',
        ],
    ]) ?>

</div>
