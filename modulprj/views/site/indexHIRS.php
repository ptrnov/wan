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
							'content' => '<span class="fa fa-sticky-note-o fa-lg"></span>'. '   '.'Department & Greading',
							'url' => '/master/dept',
							'badge' => ''
						],										
						[
							'content' =>'<span class="fa fa-user-plus fa-lg"></span>'. '   '. 'Finger Maintain',
							'url' => '/master/absen-maintain',
							
						],										
						[
							'content' =>'<span class="fa fa-user-plus fa-lg"></span>'. '   '. ' WorkTime & Formula',
							'url' => '/master/timetable-normal',
							
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
				'heading' => '<b>PERSENSI</b>',
				'postBody' => Html::listGroup([														
						[
							'content' =>'<span class="fa fa-tags fa-lg"></span>'. '   '. 'Exception',
							'url' => '/master/ijin-header',
							'badge' => ''
						],	
						[
							'content' =>'<span class="fa fa-tags fa-lg"></span>'. '   '. 'Log Absensi',
							'url' => '/master/absen-log/',
							'badge' => ''
						],	
						
						[
							'content' => '<span class="fa fa-upload fa-lg"></span>'. '   '.'Daily Absensi',
							'url' => '/master/absen-daily',
							'badge' => ''
						],
						[
							'content' => '<span class="fa fa-book fa-lg"></span>'. '   '.'Daily Overtime',
							'url' => '/master/absen-ot',
							'badge' => ''
						],	
						/* [
							'content' => '<span class="fa fa-book fa-lg"></span>'. '   '.'Exception',
							'url' => '#',
							'badge' => ''
						],	 */							

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
							'content' => '<span class="fa fa-calculator fa-lg"></span>'. '   '.'Holiday',
							'url' => '/master/hari-libur',
							'badge' => ''
						],
						[
							'content' => '<span class="fa fa-exchange fa-lg"></span>'. '   '.'Profile',
							'url' => '#',
							'badge' => ''
						],
					]),
			],
			Html::TYPE_DANGER
		);
	?>
	
</div>				
			
			