<?php
use yii\helpers\Html;
?>
<div style="font-family: verdana, arial, sans-serif ;font-size: 9pt"> 
	Employee Data, merupakan komponen mendasar dalam aplikasi Attendance dan payroll, sehingga data karyawan disebut menjadi data master yang tidak bisa di ubah-ubah tanpa adanya request yang jelas.
	Ada beberapa aplikasi membolehkan penggunaan metode Export/Import untuk data karyawan, dengan alasan memudahkan penginputan data, akan tetapi
	banyak dari prosess Export/Import data karyawan tidak semua bisa berhasil terinput secara detail, sehingga menganggu prosess modul modul lainya.
	Alasan dari semua ini karena data karyawan memiliki hubungan sangan banyak dengan: JobsFunction/leveling, grading/golongan, department, komponen pengajian,
	komponen jamsostek, asuransi, jaminan sosial dan pajak.
	Untuk itu dalam program ini tidak di sarankan mengunakan metode Import Data karyawan secara langsung, melainkan harus di inputkan secara satu persatu dan secara rinci.
	<br><br>
	<b>Tombol Fungsi :</b>
	<br>
		1. <b>TAB Employee Active</b>, Adalah tab main menu Employe yang masih aktif.
		<br>
		2. <b>TAB Employe Resign</b>, Adalah tab main menu Employe Resign, merupakan data karyawan yang sudah keluar.
		<br>
		3. <b>Tombol Create</b>, Adalah tab main menu Chart Employe, grafik analiza employee data.
		<br>
		4. <b>Tombol Refresh</b>, Adalah tab main menu Chart Employe, grafik analiza employee data.
		<br>
		5. <b>Tombol  Export</b>, Adalah tab main menu Chart Employe, grafik analiza employee data.
		<br>
		6. <b>Tombol  Action View/Edit</b>, Adalah tab main menu Chart Employe, grafik analiza employee data.
		<br>
	<br>
	<?php echo Html::img('@web/upload/help/employee/emp1.png',  ['class' => 'pnjg', 'style'=>'width:800px;height:450px;']); ?>
	<br><br>
	<b>Tombol Create :</b>
	<br>
		1. <b>Cabang</b>, Pilih cabang tempat karyawan di daftarkan.
		<br>
		2. <b>Employe Name</b>, masukan Nama Karyawan lengkap,nama depan, nama tengah atau nama belakanag.
		<br>
		3. <b>Photo</b>, masukan photo karyawan dengan memilih browser path, tempat photo berada.
		<br>
		3. <b>Save</b>, Tombol menyimpan data karyawan.
	<br>
	<?php echo Html::img('@web/upload/help/employee/emp-add.png',  ['class' => 'pnjg', 'style'=>'width:350px;height:200px;']); ?>
	<br><br>
	<b>Tombol Action View/Edit :</b>
	<br>
		1. <b>Tombol Edit Data</b>, Pilih Tombol edit untuk update data karyawan.
	<br>
	<?php echo Html::img('@web/upload/help/employee/emp-viewEdit.png',  ['class' => 'pnjg', 'style'=>'width:700px;height:500px;']); ?>
	<br><br>
</div>