<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsosFormula */

$this->title = $model->SOS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Jamsos Formulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-jamsos-formula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SOS_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SOS_ID], [
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
            'SOS_ID',
            'DATA_UPAH',
            'JML_SOS',
            'JKK',
            'JKM',
            'JPK',
            'JHT_TK',
            'JHT',
            'SOS_TTL',
            'PERSEN_JKK',
            'PERSEN_JKM',
            'PERSEN_JPK',
            'PERSEN_JHT_TK',
            'PERSEN_JHT',
        ],
    ]) ?>

</div>
