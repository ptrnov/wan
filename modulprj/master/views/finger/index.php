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
use yii\web\View;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 

	$this->registerCss("
		.kv-grid-table :link {
			color: #fdfdfd;
		}
		/* mouse over link */
		// a:hover {
			// color: #5a96e7;
		// }
		/* selected link */
		// a:active {
			// color: blue;
		// }
		// .modal-content { 
			// border-radius: 50;
		// }
		.kv-panel {
			//min-height: 340px;
			height: 300px;
		}
		.kv-grid-container{
			min-height:600px
		}
		.tmp-button-delete a:hover {
			color:red;
		}
	");
	$this->registerJs($this->render('modal_finger.js'),View::POS_READY);
	echo $this->render('modal_finger'); //echo difinition

	$emp=$this->render('_employe',[
		'dataProvider' => $dataProvider,
		'searchModel' => $searchModel,
		'aryDeptId'=>$aryDeptId,
		'aryCbgId'=>$aryCbgId,
		'aryCbg'=>$aryCbg,
		'aryGfId'=>$aryGfId,
		'aryGradingId'=>$aryGradingId,			
		'arySttId'=>$arySttId,
		'aryTimeTableId'=>$aryTimeTableId,
	]);
	
	$finger=$this->render('_finger',[
		'searchModelFinfer' => $searchModelFinfer,
		'dataProviderFinger' => $dataProviderFinger,
	]); 
	
?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="col-xs-12 col-sm-6 col-lg-6" style="font-family: tahoma ;font-size: 9pt;">
		<div class="row">		
		<?=$emp?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-lg-6" style="font-family: tahoma ;font-size: 9pt;">
		<div class="row">		
		<?=$finger?>
		</div>
	</div>
</div>



