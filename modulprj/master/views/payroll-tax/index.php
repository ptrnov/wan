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


	$itemPph21=$this->render('_pph21',[
		'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
	]);
	$timePtkp=$this->render('_ptkp',[
		'dataProviderPtkp' => $dataProviderPtkp,
        'searchModelPtkp' => $searchModelPtkp,
	]);
	$timeStatus=$this->render('_status',[
		'dataProviderStt' => $dataProviderStt,
        'searchModelStt' => $searchModelStt,
	]);
		
	$items=[
		[
			'label'=>'<i class="fa fa-money fa-lg"></i> PPH21','content'=>$itemPph21,
		],
		[
			'label'=>'<i class="fa fa-area-chart fa-lg"></i> PTKP ','content'=>$timePtkp,
		],   
		[
			'label'=>'<i class="fa fa-area-chart fa-lg"></i> OPTION TAX ','content'=>$timeStatus,
		],		
	];

	$tabTax= TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		'bordered'=>true,
		'encodeLabels'=>false,
	]);	

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<?=$tabTax?>
	</div>
</div>
