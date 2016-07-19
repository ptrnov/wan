<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollSalary */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Payroll Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php
		$info=DetailView::widget([
			'model' => $model,
			'attributes' => [            
				'KAR_ID',
				'empNm',
				'cabNm',
				'depNm',
				'codeGolongan',
				'gradingNm',
				'gfNm',
				'stsKerjaNm',
			],
		]);
		
		$salary=DetailView::widget([
			'model' => $model,
			'attributes' => [            
				'PAY_DAY',
				'PAY_MONTH',
				'PAY_TUNJANGAN',
				'PAY_TRANPORT',
				'PAY_EAT',
				'BONUS',
				'PAY_ENTERTAIN',
				'STATUS_ACTIVE',
			],
		]);
	?>


<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="row" >
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<?=$info?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<?=$salary?>
		</div>
	</div>
</div>