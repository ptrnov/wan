<?php
use yii\helpers\Html;
?>
<div style="font-family: verdana, arial, sans-serif ;font-size: 9pt"> 
	Kepangkatan terdiri Group Function atau leveling dan Grading atau Golongan dalam setiap department yang bertujuan untuk mengklasifikasi karyawan dalam prosess struktur organisasi perusahaan
	dan dalam penentuan tunjangan, benefit, jaminan sosial dan lain lain sesuai kebutuhan KPI.
	<br><br>
	<b>Tampilan Kepangkatan:</b>
	<br>
		1. <b>Tampilan Department</b>, Adalah Tampilan form Department, add Department dan Edit Department.
		<br>
		2. <b>Tampilan Group Function/Level</b>, Adalah Tampilan form Group Function/Level, add Level dan Edit Level.
		<br>
		3. <b>Tampilan Grading/Golongan</b>, Adalah Tampilan form Grading/Golongan, add Grading dan Edit Grading.
		<br>
		1a. <b>Add Dept</b>, Adalah tombol penambahan data Department.
		<br>
		1b. <b>Add level</b>,  Adalah tombol penambahan data Group Function/Level.
		<br>
		1c. <b>Add Grading</b>,  Adalah tombol penambahan data Grading/Golongan.
		<br>
		2a. <b>View/Edit Dept</b>, Adalah view dan editing data Department.
		<br>
		2b. <b>View/Edit level</b>, Adalah view dan editing data Group Function/Level.
		<br>
		2c. <b>View/Edit Grading</b>, Adalah view dan editing data Grading/Golongan.
		<br>
	<br>
	<?php echo Html::img('@web/upload/help/kepangkatan/k1.png',  ['class' => 'pnjg', 'style'=>'width:800px;height:350px;']); ?>
	<br><br>
	<b>Tombol Department:</b>
	<br>
		1a. <b>Department INPUT </b>, Adalah TITLE tombil penambahan data Department.
		<br>
		1a-1. <b>ID Department</b>, readonly hanya bisa di lihat, tidak untuk di ubah.
		<br>
		1a-2. <b>Nama Department</b>, Dapat di ubah sesuai nama department yang di inginkan.
		<br>
		<?php echo Html::img('@web/upload/help/kepangkatan/k1a.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
		<br><br>
		2. <b>View/Edit Dept</b>, Adalah detail view dan editing.
		<br>
		1a-1. <b>Tombil Edit/View</b>, tombol untuk memulai editing/cancel editing.
		<br>
		1a-2. <b>Save</b>, Untuk menyimpan data yang sudah di edit.
		<br>
		1a-3. <b>Save</b>, Nama department yang akan di Edit.
		<br>
		<?php echo Html::img('@web/upload/help/kepangkatan/k1b.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
		<?php echo Html::img('@web/upload/help/kepangkatan/k1c.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
	<br><br>
	<b>Tombol Group Function/Level:</b>
	<br>
		2a. <b>Level INPUT </b>, Adalah TITLE tombil penambahan data Level.
		<br>
		2a-1. <b>ID Level</b>, readonly hanya bisa di lihat, tidak untuk di ubah.
		<br>
		2a-2. <b>Nama Level</b>, Dapat di ubah sesuai nama Level yang di inginkan.
		<br>
		<?php echo Html::img('@web/upload/help/kepangkatan/k2a.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
		<br><br>
		2. <b>View/Edit Level</b>, Adalah detail view dan editing.
		<br>
		2a-1. <b>Tombil Edit/View</b>, tombol untuk memulai editing/cancel editing.
		<br>
		2a-2. <b>Save</b>, Untuk menyimpan data yang sudah di edit.
		<br>
		2a-3. <b>Save</b>, Nama Level yang akan di Edit.
		<br>
		<?php echo Html::img('@web/upload/help/kepangkatan/k2b.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
		<?php echo Html::img('@web/upload/help/kepangkatan/k2c.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
	<br><br>
	<b>Tombol Grading/Golongan:</b>
	<br>
		3a. <b>Grading INPUT </b>, Adalah TITLE tombil penambahan data Grading.
		<br>
		3a-1. <b>ID Grading</b>, readonly hanya bisa di lihat, tidak untuk di ubah.
		<br>
		3a-2. <b>Nama Grading</b>, Dapat di ubah sesuai nama Grading yang di inginkan.
		<br>
		<?php echo Html::img('@web/upload/help/kepangkatan/k3a.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
		<br><br>
		2. <b>View/Edit Grading</b>, Adalah detail view dan editing.
		<br>
		3a-1. <b>Tombil Edit/View</b>, tombol untuk memulai editing/cancel editing.
		<br>
		3a-2. <b>Save</b>, Untuk menyimpan data yang sudah di edit.
		<br>
		3a-3. <b>Save</b>, Nama Grading yang akan di Edit.
		<br>
		<?php echo Html::img('@web/upload/help/kepangkatan/k3b.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
		<?php echo Html::img('@web/upload/help/kepangkatan/k3c.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
	<br>
</div>