<?php
/*
 * By ptr.nov
 * Load Config CSS/JS
 */
/* YII CLASS */
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
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 




		Modal::begin([
			'id' => 'modal-view',
			'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-user"></div><div><h5 class="modal-title"><b>VIEW EMPLOYEE</b></h5></div>',
			'size' => Modal::SIZE_LARGE,
			'headerOptions'=>[
					'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
			],
		]);
		echo "<div id='modalContent'></div>";
		Modal::end();	







	/* echo Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]);
	*/
	
	$empActive=$this->render('_employeActive',[
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
	
	$empResign=$this->render('_employeResign',[
		'dataProvider1' => $dataProvider1,
		'searchModel1' => $searchModel1,
		'aryDeptId'=>$aryDeptId,
		'aryCbgId'=>$aryCbgId,
		'aryCbg'=>$aryCbg,
		'aryGfId'=>$aryGfId,
		'aryGradingId'=>$aryGradingId,			
		'arySttId'=>$arySttId,
		'aryTimeTableId'=>$aryTimeTableId,
	]); 
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Active','content'=>$empActive,//$tab_employe_active,
			//'active'=>true,

		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Resign','content'=>$empResign,
		],
        /*
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Test Affix','content'=>$KiriMenu.$affk,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Alrt','content'=>$strRat,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> RATING','content'=>$strRat,//$sortImg,// ,
		],
		*/
	];

	$tabEmploye= TabsX::widget([
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
		<?=$tabEmploye?>
	</div>
</div>
<?php
	/*
	 * CREATE EMPLOYEE JS
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#modal-create').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var modal = $(this)
			var title = button.data('title')
			var href = button.attr('href')
			//modal.find('.modal-title').html(title)
			modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
			$.post(href)
				.done(function( data ) {
					modal.find('.modal-body').html(data)
				});
			})
	",$this::POS_READY);
    Modal::begin([
        'id' => 'modal-create',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">Create Employee</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
?>


