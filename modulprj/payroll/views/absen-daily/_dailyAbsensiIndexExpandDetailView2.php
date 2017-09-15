<?php
use kartik\helpers\Html;
?>

<div class="col-xs-12 col-sm-12 col-lg-12" style="font-family: tahoma ;font-size: 7pt;">
	<div class="row">
		<div class="col-md-3" style="width:180px;">
			<div class="row">
				<dl>	
					<table style="width:180px">
					  <tr>
						<th style="width:130px">Pagi</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($model[0]['SUB_PAY_PAGI'],2) ?></th>
					  </tr>
					   <tr>
						<th style="width:130px">Lembur</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($model[0]['SUB_PAY_OT'],2) ?></th>
					  </tr>
					  <tr>
						<th style="width:130px">Uang Makan Malam</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($model[0]['SUB_PAY_OT'],2) ?></th>
					  </tr>
					  <tr>
						<th style="width:130px">Total Upah / Minggu</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right"><b><?=number_format($model[0]['TTL_PAY'],2) ?></b></th>
					  </tr>
					</table>
				</dl>				
			</div>
		</div>
		<div  class="col-md-3" style="padding-left:50px;width:140px;">
				<dl>	
					<table style="width:140px">
					  <tr>
						<th style="width:80px">Pinjaman</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($model[0]['TTL_PINJAMAN'],2) ?></th>
					  </tr>
					   <tr>
						<th style="width:80px">PPh</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($model[0]['TTL_PPH'],2) ?></th>
					  </tr>
					  <tr>
						<th style="width:80px">Jamsostek</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($model[0]['TTL_JAMSOSTEK'],2) ?></th>
					  </tr>
					  <tr>
						<th style="width:80px">Potongan</th>
						<th style="width:10px">:</th>
						<th style="width:50px;text-align:right"><?=number_format($model[0]['TTL_POTONGAN'],2) ?></th>
					  </tr>
					</table>
				</dl>		
		</div>
		<div class="col-md-3" style="padding-left:150px;padding-top:2px;width:150px;">
			<table>
			  <tr>
				<th style="border: 1px solid #dddddd;font-family: tahoma ;font-size: 7pt;">
					<dl>			
						<dt style="text-align:center;width:150px;"><b>Upah Diterima</b></dt>				
						<dt style="text-align:center;width:150px; float:left;color:red"><h6><b><?=number_format($model[0]['TTL_PAY'],2) ?></b></h6></dt>
					</dl>
				</th>
			  </tr>
			</table>
		</div>
		<div class="col-md-3" style="padding-left:150px;float:left">
			<dl>			
				<dt style="text-align:center">Mengetahui</dt>				
				
			</dl>
		</div>
		<div class="col-md-3" style="padding-left:150px;float:left">
			<dl>			
				<dt style="text-align:center">Menerima</dt>				
				
			</dl>
		</div>
	</div>
</div>

