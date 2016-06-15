<?php
use kartik\helpers\Html;
/* use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\FileInput;
use kartik\builder\FormGrid;
use kartik\tabs\TabsX; */
use yii\helpers\Url;
?>
<div class="col-xs-12 col-sm-6 col-dm-4  col-lg-4">
	<?php
		echo Html::panel([
				'id'=>'widget',
				'heading' => '<b>DATA MANAGE</b>',
				'postBody' => Html::listGroup([
						[
							'content' =>'<span class="fa fa-tags fa-lg"></span>'. '   '. 'Employee',
							'url' => '/master/employe',
							'badge' => ''
						],										
						[
							'content' => '<span class="fa fa-sticky-note-o fa-lg"></span>'. '   '.'Department',
							'url' => '/master/dept',
							'badge' => ''
						],										
						[
							'content' =>'<span class="fa fa-user-plus fa-lg"></span>'. '   '. 'Greading',
							'url' => '#',
							
						],
						[
							'content' =>'<span class="fa fa-user-plus fa-lg"></span>'. '   '. 'Salary',
							'url' => '#',
							
						],
					]),
			],
			Html::TYPE_DANGER
		);
	?>
</div>
<div class="col-xs-12 col-sm-6 col-dm-4  col-lg-4" >
	
	<?php
		echo Html::panel([
				'id'=>'task',
				'heading' => '<b>PROCESSING</b>',
				'postBody' => Html::listGroup([														
						[
							'content' =>'<span class="fa fa-tags fa-lg"></span>'. '   '. 'Closed Absensi',
							'url' => '/master/employe',
							'badge' => ''
						],						
						[
							'content' => '<span class="fa fa-book fa-lg"></span>'. '   '.'Closed Exception',
							'url' => '#',
							'badge' => ''
						],	
						[
							'content' => '<span class="fa fa-book fa-lg"></span>'. '   '.'Closed Overtime',
							'url' => '#',
							'badge' => ''
						],							
						[
							'content' => '<span class="fa fa-book fa-lg"></span>'. '   '.'Closed Loan',
							'url' => '#',
							'badge' => ''
						],	
					]),
			],
			Html::TYPE_DANGER
		);
	?>
</div>
<div class="col-xs-12 col-sm-6 col-dm-4  col-lg-4" >
<?php
		echo Html::panel([
				'id'=>'approval',
				'heading' => '<b>REPORTING</b>',
				'postBody' => Html::listGroup([
						[
							'content' => '<span class="fa fa-sitemap fa-lg"></span>'. '   '.'Struktur Organization ',
							'url' => '#'
						],		
						[
							'content' => '<span class="fa fa-exchange fa-lg"></span>'. '   '.'Social Card Formula',
							'url' => '#',
							'badge' => ''
						],
						[
							'content' => '<span class="fa fa-exchange fa-lg"></span>'. '   '.'Taxs Formula',
							'url' => '#',
							'badge' => ''
						],
						[
							'content' => '<span class="fa fa-calculator fa-lg"></span>'. '   '.'Payroll',
							'url' => '#',
							'badge' => ''
						],
					]),
			],
			Html::TYPE_DANGER
		);
	?>
	
</div>				
			
			