<?php
use kartik\helpers\Html;
$imgStr=Yii::$app->arrayBantuan->gambar1();
//print_r($imgStr);

?>

<div class="col-md-12" style="font-family: tahoma ;font-size: 6pt;">
		<dl style="width:300px; padding-top:20px;float:left;">
				<table style="width:300px">
					<tr>
						<th style="width:130px">NAMA</th>
						<th style="width:10px">:</th>
						<th style="width:150px;text-align:left;font-weight: normal;"><?=$model[0]['KAR_NM'];?></th>
						</tr>
					<tr>
						<th style="width:130px">Divisi</th>
						<th style="width:10px">:</th>
						<th style="width:150px;text-align:left;font-weight: normal;"><?=$model[0]['DEP_NM']?></th>
					</tr>
					<tr>
						<th style="width:130px">PERIODE</th>
						<th style="width:10px">:</th>
						<th style="width:150px;text-align:left;font-weight: normal;">
							<?=$model[0]['TGL_STARTING'] ?>  s/d  <?=$model[0]['TGL_CLOSING'] ?>
						</th>
					</tr>
				</table>
		</dl>
		<dl style="float:right;">
			<table style="width:300px">			
				<tr>
					<th style="text-align:left;padding-left:300px;width:50px;text-align:right;font-weight: normal;">
						<?=Html::img($imgStr,['width'=>'140','height'=>'60']);?>
					</th>
				</tr>			
			</table>
		</dl>

</div>

