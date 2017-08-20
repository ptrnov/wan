<?php
use yii\helpers\Html;
?>
<div style="font-family: verdana, arial, sans-serif ;font-size: 9pt"> 
	TIME TABLE, merupakan rule atau aturan pada attencance. Setiap Employee melakukan finger In atau out pada mesin absensi, data tersebut akan langsung masuk ke server dan dideteksi oleh time table, dan di kelompokan sesuai kereteria yang sudah di tetapkan.
	Timetable terdiri dari Timetable Normal dan Timetable Overtime. Untuk timetable Normal, berisikan data-data waktu untuk aturan karyawan yang masuk office hour.
	Sedangkan Timetable Overtime mengatur waktu dan pembagian presentase overtime atau lemburan.
	<br><br>
	<?php echo Html::img('@web/upload/help/timetabel/tt1.png',  ['class' => 'pnjg', 'style'=>'width:800px;height:550px;']); ?>
	<b>Tombol Fungsi :</b>
	<br>
		1. <b>TAB Timetable</b>, Adalah tab main menu timetabel, yang mana semua informasi aturan absensi ada di sini.
		<br>
		2. <b>TAB Table Formula</b>, Adalah tab main menu Formua sebagai acuan lembur,yang berisi informasi peresentase nilai lemburan.
		<br>
		3. <b>TAB Option</b>, Adalah tab option pendukung dalam klasifikasi penentuan atuaran timetable untuk absensi.
		<br>
		4. <b>Tombol Add</b>, untuk menambah data Timetabel.<br>
		<?php echo Html::img('@web/upload/help/timetabel/tt1a.png',  ['class' => 'pnjg', 'style'=>'padding-left:20px;width:500px;height:550px;']); ?>
		<br>
		<br>
		5. <b>Tombol Refresh</b>, untuk refresh menu utama.
		<br>
		6. <b>Tombol Export</b>,untuk Export data timetabel to Excel.
		<br>
	<br>
	<?php echo Html::img('@web/upload/help/timetabel/tt2.png',  ['class' => 'pnjg', 'style'=>'width:800px;height:350px;']); ?>
	<br><b>Tombol Fungsi Action:</b>
	<br><br>
		1. <b>Action View</b>, Adalah untuk menampilkan data secara detail dari Timetabel dan bisa dilakuna Editing.
		<?php echo Html::img('@web/upload/help/timetabel/tt3.png',  ['class' => 'pnjg', 'style'=>'padding-left:20px;width:800px;height:550px;']); ?>
		<br><br>
		2. <b>Action SetOvertime</b>, Adalah penambahan aturan lemburan.<br>
		<?php echo Html::img('@web/upload/help/timetabel/tt4.png',  ['class' => 'pnjg', 'style'=>'padding-left:20px;width:500px;height:550px;']); ?>
		<br>
	<br>
	</br>
</div>