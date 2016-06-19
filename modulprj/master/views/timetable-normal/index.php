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


	$timetableNormal=$this->render('_timetableNormal',[
		'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
	]);
	$timetableOvertime=$this->render('_timetableOvertime',[
		'dataProviderOt' => $dataProviderOt,
        'searchModelOt' => $searchModelOt,
	]);
	$timetableOption=$this->render('_timetableOption',[
		'searchModelGrp'=>$searchModelGrp,
		'dataProviderGrp'=>$dataProviderGrp,
		'searchModelLvl'=>$searchModelLvl,
		'dataProviderLvl'=>$dataProviderLvl,
		'searchModelStt'=>$searchModelStt,
		'dataProviderStt'=>$dataProviderStt
	]);
	
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> TimeTabel','content'=>$timetableNormal,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> TimeTabel Overtime','content'=>$timetableOvertime,
		],       
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Option','content'=>$timetableOption,
		]
	];

	$tabTimaTable= TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		//'height'=>'tab-height-xs',
		'bordered'=>true,
		'encodeLabels'=>false,
		//'align'=>TabsX::ALIGN_LEFT,

	]);	

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<?=$tabTimaTable?>
	</div>
</div>
