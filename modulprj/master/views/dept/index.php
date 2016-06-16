<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\bootstrap\Modal;
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
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
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
<?php
	/* GRADING */
	$this->registerJs("
		 $('#create-grading-id').on('show.bs.modal', function (event) {
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
        'id' => 'create-grading-id',
       'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">GRADING INPUT</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	/* GROUP FUNCTION */
	$this->registerJs("
		 $('#create-gf-id').on('show.bs.modal', function (event) {
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
        'id' => 'create-gf-id',
       'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">GROUP FUNCTION INPUT</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	/* DEPARTMENT  */
	$this->registerJs("
		 $('#create-dept-id').on('show.bs.modal', function (event) {
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
        'id' => 'create-dept-id',
       'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">DEPARTMENT INPUT</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
?>
