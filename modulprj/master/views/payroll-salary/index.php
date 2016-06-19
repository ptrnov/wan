<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\widget\Pjax;
use yii\helpers\Url;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 


	$itemSalary=$this->render('_salary',[
		'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
	]);
	// $timetableOvertime=$this->render('_salaryChart',[
		// 'dataProviderOt' => $dataProviderOt,
        // 'searchModelOt' => $searchModelOt,
	// ]);
		
	$items=[
		[
			'label'=>'<i class="fa fa-money fa-lg"></i> List Salary','content'=>$itemSalary,
		],
		[
			'label'=>'<i class="fa fa-area-chart fa-lg"></i> Chart ','content'=>'',
		],       
	];

	$tabSalary= TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		'bordered'=>true,
		'encodeLabels'=>false,
	]);	

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<?=$tabSalary?>
	</div>
</div>
