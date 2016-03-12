<?php
/* @var $this yii\web\View */
use kartik\helpers\Html;
use yii\bootstrap\Carousel;

$this->title = 'My Yii Application';
?>

<!-- CROUSEL Author: -ptr.nov- !-->
			<?php
					echo Carousel::widget([
					  'items' => [
						 // equivalent to the above
						  [
							'content' => '<img src="'.Yii::getAlias('@path_carousel') . '/Cover.jpg" style="width:100%; height:100%"/>',
							'options' =>[ 'style' =>'width: 100%; height: 300px;'],
						  ],
						[
							'content' => '<img src="'.Yii::getAlias('@path_carousel') . '/carousel2.jpg" style="width:100%; height:100%"/>',
							'options' =>[ 'style' =>'width: 100% ; height: 300px;'],
						  ],
						  
						  // the item contains both the image and the caption
						  [
							  'content' => '<img src="'.Yii::getAlias('@path_carousel') . '/carousel3.jpg" style="width:100%;height:100%"/>',
							  //'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
							 'options' =>[ 'style' =>'width: 100%; height: 300px;'],
							
						  ],
					  ],
					   //'options' =>[ 'style' =>'width: 100%!important; height: 300px;'],
					]);
				?>


<div class="content">
			<div class="content">					
				
				 <div class="row">
					<div class="col-md-12">						
						<h4 class="page-head-line">HIRS PT. Wanindo Prima</h4>
						<p>
							Human Resource Information System, PT. Wanindo Prima meenunjang sistem HRD dalam penanganan Absensi dan Payroll sehingga dapat memudakan, input data, monitoring
							dan analisa akan setiap prosess yang berkaitan dengan karyawan PT. Wanindo Prima.
						</p>
				</div>
				</div>
				 <!--<div class="row">
					<div class="col-md-12">
						<h4 class="page-head-line">CONTACT</h4>	!-->				
						<?php
							/* echo Html::well(Html::address(
							'Ruko De Mansion Blok C No.12',
							 ['Jl. Jalur Sutera, Alam Sutera, Serpong','Tangerang Selatan.'],
							 ['Tel ' => '(021) 3044-85-98/99'],
							 ['Fax ' => '(021) 3044 85 97'],
							 ['Website : ' => 'www.lukison.com', 'Email' => 'info@lukison.com']
							), Html::SIZE_TINY); */
						?>		
					<!--</div>
				</div>!-->				
			</div>				
		</div>
</div>

