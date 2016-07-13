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
					karyawan dapat melakukan absen di manapun, head office atau branch apabila sudah di daftarkan oleh admin.
					Summary/ringkasan data dari absensi yang meliputi absensi keluar/masuk,lemburan,ijin/sakit/cuti, akan otomatis masuk pada penghitungan payroll, 
					dalam prosess di berlakukan sesi closing absensi yang selanjutnya mejadi data fix untuk perhitungan pada payroll',
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
			'content' => 'ATTENDANCE atau absensi merupakan nilai log dari setiap karyawan yang sudah ditetapkan aturan main pada perusahaan, sehingga mendapatkan log keluar/masuk, 
						 log ijin/cuti/sakit, yang mana data ini diambil dari mesin absensi yang sudah terintegerasi/online dari setiap cabang atau kantor pusat,
						 demikian ini mencegah manipulasi data yang umumnya dapat dilakukan secara sistem manual.',
			'items' => [
				/*MODUL EMPLOYEE*/
				[
					'url' => '#sec-1-1', 'label' =>'EMPLOYEE DATA',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:12pt;text-align:left;color:blue"><b>EMPLOYEE DATA</b></div>', 
					'content' => $employePenjelasan
				],
				/*MODUL FINGER MAINTAIN*/
				[
					'url' => '#sec-1-2', 'label' =>'FINGER MAINTAIN',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:12pt;text-align:left;color:blue"><b>FINGER MAINTAIN</b></div>', 
					'content' => $fingerMaintainPenjelasan
				],
				/*MODUL TIME TABLE*/
				[
					'url' => '#sec-1-3', 'label' =>'TIME TABLE',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:12pt;text-align:left;color:blue"><b>TIME TABLE</b></div>', 
					'content' => $timetablePenjelasan
				],
				/*MODUL EXCEPTION*/
				[
					'url' => '#sec-1-4', 'label' =>'EXCEPTION',
					'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:12pt;text-align:left;color:blue"><b>EXCEPTION</b></div>', 
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
		[
			'url' => '#sec-1',
			'label' => 'PAYROLL',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>PAYROLL</b></div>',
			'icon' => 'play-circle',
			'content' => 'Payroll adalah sebuah cara menghitung gaji karyawan.
					payroll memiliki banyak komponen dalam penghitungan pengajian karyawan. dalam program ini,komponen attendance/absensi sudah secara otomatis terintegerasi jika sudah dilakuan closing.
					sehingga untuk komponen attendance/absensi sudah tidak memusingkan dalam prosess perhitungan pengajian.
					komponen lainya yaitu komponen tunjangan,kesehatan,jamsostek,pajak/pph21,dan pinjaman.
			',
			'items' => [

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
