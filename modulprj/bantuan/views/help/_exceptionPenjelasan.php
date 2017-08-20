<?php
use yii\helpers\Html;
?>
<div style="font-family: verdana, arial, sans-serif ;font-size: 9pt"> 
	Exception Modul merupakan modul pengambilan ijin/sakit/cuti yang diperuntukan/digunakan oleh karyawan.
	<br><br>
	<b>Exception List Fungsi :</b>
	<br>
		1. <b>Exception List</b>, Adalah Tab menu master data ijin/exception.
		<br>
		2. <b>Add Exception</b>, Adalah pengambilan ijin yang di gunakan karyawan.
		<br>
		3. <b>Refresh</b>, Adalah menampilkan semua list master data ijin/exception.
		<br>
		4. <b>Export</b>, Adalah master data ijin/exception ke Excel .
		<br>
		5. <b>Tombol Action View</b>, Adalah tombol untuk menampilkan dan editor .
		<br>
	<br>
	<?php echo Html::img('@web/upload/help/exception/hd1.png',  ['class' => 'pnjg', 'style'=>'width:800px;height:350px;']); ?>
	<br><br>
	<b>Tombol Function :</b>
	<br>
		a. <b>Add Exception</b>, Adalah tombol untuk melakukan penambahan  list master data ijin/exception .
		<br>
		<?php echo Html::img('@web/upload/help/exception/hd2.png',  ['class' => 'pnjg', 'style'=>'width:500px;height:250px;']); ?>
		<br></br>
		b. <b>View</b>, Adalah menampilkan.
		<br>
		<?php echo Html::img('@web/upload/help/exception/hd3.png',  ['class' => 'pnjg', 'style'=>'width:500px;height:250px;']); ?>
		<br>
		b1. <b>Tombol Edting</b>, Tekan tombol Editing untuk update data master.
		<br>
		<br></br>
		c. <b>View Editor</b>, Adalah update list master data ijin/exception.
		<br>
		<?php echo Html::img('@web/upload/help/exception/hd4.png',  ['class' => 'pnjg', 'style'=>'width:500px;height:250px;']); ?>
		<br>
		c1. <b>Tombol View</b>, Tekan menampilkan kembali list master data ijin/exception jika mengagalkan update data.
		<br>
		c2. <b>Tombol Save</b>, menyimpan data update dati list master data ijin/exception yang sudah di edit.
		<br>
		c3. <b>Input Data</b>, Masukan Nama Exception/ijin yang akan di update.
		<br>
		c4. <b>input Description</b>, Masukan catatan dari Exception/ijin yang akan di update.
		<br>
	<br><br>
</div>