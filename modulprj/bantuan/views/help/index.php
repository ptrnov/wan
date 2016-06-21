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
			'label' => 'EMPLOYEE DATA',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>EMPLOYEE DATA</b></div>',
			'icon' => 'play-circle',
			'content' => 'www',
			'items' => [
				['url' => '#sec-1-1', 'label' =>'PENJELASAN','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $penjelasan],
				['url' => '#sec-1-2', 'label' => 'DOWNLOAD APLIKASI','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $linkDownload],
				['url' => '#sec-1-3', 'label' => 'CARA INSTALL','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $installapp]
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
			'label' => 'EMPLOYEE DATA',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>EMPLOYEE DATA</b></div>',
			'icon' => 'play-circle',
			'content' => 'www',
			'items' => [
				['url' => '#sec-1-4', 'label' =>'PENJELASAN','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $penjelasan],
				['url' => '#sec-1-5', 'label' => 'DOWNLOAD APLIKASI','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $linkDownload],
				['url' => '#sec-1-6', 'label' => 'CARA INSTALL','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $installapp]
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
			'url' => '#sec-2',
			'label' => 'EMPLOYEE DATA',
			'header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:16pt;text-align:left;color:red"><b>EMPLOYEE DATA</b></div>',
			'icon' => 'play-circle',
			'content' => 'www',
			'items' => [
				['url' => '#sec-2-7', 'label' =>'PENJELASAN','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $penjelasan],
				['url' => '#sec-2-8', 'label' => 'DOWNLOAD APLIKASI','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $linkDownload],
				['url' => '#sec-2-9', 'label' => 'CARA INSTALL','header'=>'<div class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:10pt;text-align:left;"><b>PENJELASAN</b></div>', 'content' => $installapp]
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
			<h4 class="text-center"><b>HIRS TUTORIAL</b></h4>
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