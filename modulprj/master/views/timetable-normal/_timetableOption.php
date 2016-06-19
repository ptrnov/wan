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

	$timetableGroup=$this->render('_timetableOptionGroup',[
		'searchModelGrp'=>$searchModelGrp,
		'dataProviderGrp'=>$dataProviderGrp,		
	]);
	 $timetableLevel=$this->render('_timetableOptionLevel',[
		'searchModelLvl'=>$searchModelLvl,
		'dataProviderLvl'=>$dataProviderLvl,
	]);
	$timetableStatus=$this->render('_timetableOptionStatus',[		
		'searchModelStt'=>$searchModelStt,
		'dataProviderStt'=>$dataProviderStt
	]);
	$timetableKategori=$this->render('_timetableOptionKategori',[		
		'searchModelKtg'=>$searchModelKtg,
		'dataProviderKtg'=>$dataProviderKtg,
	]);

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<div  class="col-lg-4"> 
			<?=$timetableGroup?>
		</div>
		<div  class="col-lg-4"> 
			<?=$timetableLevel?>
			<?=$timetableStatus?>
		</div>
		<div  class="col-lg-4"> 
			<?=$timetableKategori?>
			
		</div>
	</div>
</div>
