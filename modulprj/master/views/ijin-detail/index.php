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


	$ijinDetail=$this->render('_ijinDetail',[
		'searchModelDetail' => $searchModelDetail,
		'dataProviderDetail' => $dataProviderDetail,
	]);
	$ijinHeader=$this->render('_ijinHeader',[
		'searchModelHeader'=>$searchModelHeader,
		'dataProviderHeader'=>$dataProviderHeader,
	]);
		
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employee Exception','content'=>$ijinDetail,//$tab_employe_active,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Exception List','content'=>$ijinHeader,
		]
	];

	$tabIjin= TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		'bordered'=>true,
		'encodeLabels'=>false,
	]);	

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<?=$tabIjin?>
	</div>
</div>
