<?php
use kartik\helpers\Html;
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
use yii\web\JsExpression;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);

$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 


	$liburDetail=$this->render('_holiday',[
		'searchModel' => $searchModel,
		'dataProvider' => $dataProvider,
	]);
	$liburCalender=$this->render('_holidayCalender',[
		'searchModel' => $searchModel,
		'dataProvider' => $dataProvider,
	]);
		
?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<div  class="col-lg-6">
			<?=$liburDetail?>
		</div>
		<div  class="col-lg-6">
			<?=$liburCalender?>
		</div>
	</div>
</div>
