<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\pjax;
$this->title = 'lukisongroup';


use kartik\affix\Affix;
	$content ='Progress';
	$items = [
		[
			'url' => '#sec-1',
			'label' => 'MANUAL BOOKS',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>MANUAL BOOKS</b></div>',
			'icon' => 'play-circle',
			'content' => 'Manual Books, HIRS ver 1.1 meliputi Attendance dan payroll. 
					Attendance tersebut sudah dalam konsep online performance, 
					yang mana ketika karyawan absen dimanapun data absensi tersebut akan terintegerasi pada server pusat. 
					karyawan dapat melakukan absen di manapun, head office atau branch apabila sudah di daftarkan oleh admin',
			'options'=>[
				'style'=>[
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'10pt',
					'text-align'=>'left',
				],
			],			
		],
		[
			'url' => '#sec-1',
			'label' => 'ATTENDANCE',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>ATTENDANCE</b></div>',
			'icon' => 'play-circle',
			'content' => 'Employee Data, merupakan komponen mendasar dalam aplikasi Attendance dan payroll, sehingga data karyawan disebut data master yang tidak bisa di ubah-ubah tanpa adanya request yang jelas.',
			'items' => [
				[
					'url' => '#sec-1-1', 'label' =>'EMPLOYEE DATA',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;color:blue"><b>EMPLOYEE DATA</b></div>', 
					'content' => $employePenjelasan
				],
				[
					'url' => '#sec-1-2', 'label' =>'FINGER MAINTAIN',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;color:blue"><b>FINGER MAINTAIN</b></div>', 
					'content' => $fingerMaintainPenjelasan
				],
			],
			'options'=>[
				'style'=>[
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'10pt',
					'text-align'=>'left',
				],
			],			
		],
		/*MODUL FINGER MAINTAIN*/
		[
			'url' => '#sec-1',
			'label' => 'FINGER MAINTAIN',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>FINGER MAINTAIN</b></div>',
			'icon' => 'play-circle',
			'content' => 'Syncronkan data finger dengan data karyawan, agar mendapatkan log absensi yang valid.',
			'items' => [
				[
					'url' => '#sec-1-2', 'label' =>'PENJELASAN',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 
					'content' => $fingerMaintainPenjelasan
				],
			],
			'options'=>[
				'style'=>[
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'10pt',
					'text-align'=>'left',
				],
			],			
		],			
		[
			'url' => '#sec-1',
			'label' => 'TIME TABLE',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>TIME TABLE ATTENDANCE</b></div>',
			'icon' => 'play-circle',
			'content' => 'TIME TABLE, merupakan rule atau aturan pada attencance. Setiap Employee melakukan finger In atau out pada mesin absensi, data tersebut akan langsung masuk ke server dan dideteksi oleh time table, dan di kelompokan sesuai kereteria yang sudah di tetapkan.',
			'items' => [
				[
					'url' => '#sec-1-3', 'label' =>'PENJELASAN',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 
					'content' => $timetablePenjelasan
				],
			],
			'options'=>[
				'style'=>[
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'10pt',
					'text-align'=>'left',
				],
			],			
		],
		[
			'url' => '#sec-1',
			'label' => 'EXCEPTION',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>EXCEPTION</b></div>',
			'icon' => 'play-circle',
			'content' => 'Exception, merupakan modul pengambilan ijin/sakit/cuti oleh karyawan.',
			'items' => [
				[
					'url' => '#sec-1-4', 'label' =>'PENJELASAN',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 
					'content' => $exceptionPenjelasan
				],
			],
			'options'=>[
				'style'=>[
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'10pt',
					'text-align'=>'left',
				],
			],			
		],		
		
	];
	
?>


<div class="content">	
	<div class="row">
		<div>
			<!--<h4 class="text-center"><b>HUMAN RESOURCE INFORMATION SYSTEM DOCUMENTATION, HRIS ver 1.1</b></h4>!-->
			<h4 class="text-center"><b>MANUAL BOOKS</b></h4>
		</div>
		<hr style="height:10px;margin-top: 1px; margin-bottom: 1px;color:#94cdf0">
		<div class="col-md-12">						
			<div  class="col-md-3 col-lg-3">					
				<?= Affix::widget([
						'items' => $items, 
						'type' => 'menu'
					]);?>			
			</div>
			<div class="col-xs-12 col-lg-8" style="font-family: verdana, arial, sans-serif ;font-size: 9pt";>
					<?= Affix::widget([
						'items' => $items, 
							'type' => 'body'
					]);?>
			</div>
		</div>	
	</div>				 				
</div>
