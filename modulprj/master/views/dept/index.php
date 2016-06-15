<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use modulprj\assets\AppAsset; 
AppAsset::register($this);

$this->mddPage = 'hrd';
$this->title = Yii::t('app', 'Department');
$this->params['breadcrumbs'][] = $this->title;

	$rnDept=$this->render('_indexDept', [
		/*	Department */
		'searchModel_Dept'=>$searchModel_Dept,
		'dataProvider_Dept'=>$dataProvider_Dept,
	]);
	
	$rnKepangkatan=$this->render('_indexKepangkatan', [
		/*	Department */
		'searchModel_Gf'=>$searchModel_Gf,
		'dataProvider_Gf'=>$dataProvider_Gf,
	]);
	
	$rnGrading=$this->render('_indexGrading', [
		/*	Department */
		'searchModel_Grading'=>$searchModel_Grading,
		'dataProvider_Grading'=>$dataProvider_Grading,
	]);

?>
<div class="container-fluid">
	<div class="raw">
		<div class="col-xs-12 col-sm-4 col-dm-4 col-lg-4">	
				<?=$rnDept?>		
		</div>
		<div class="col-xs-12 col-sm-4 col-dm-4 col-lg-4">		
				<?=$rnKepangkatan?>			
		</div>
		<div class="col-xs-12 col-sm-4 col-dm-4 col-lg-4">
			
				<?=$rnGrading?>
			
		</div>
	</div>
</div>

