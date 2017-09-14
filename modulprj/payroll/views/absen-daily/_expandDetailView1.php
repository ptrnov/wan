<?php
use kartik\helpers\Html;
?>

<div class="col-md-4" style="font-family: tahoma ;font-size: 6pt;">
	<dl>			
		<dt style="width:100px; float:left;">NAMA</dt>
		<dd>: <?=$model[0]->KAR_NM ?></dd>
		<dt style="width:100px; float:left;">Divisi</dt>
		<dd>: <?=$model[0]->DEP_NM ?></dd>
		<dt style="width:100px; float:left;">PERIODE</dt>
		<dd>: <?=$model[0]->IN_TGL ?>  s/d  <?=$model[0]->OUT_TGL ?></dd>
	</dl>
</div>

