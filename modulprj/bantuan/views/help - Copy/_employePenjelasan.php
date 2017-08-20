<?php
use yii\helpers\Html;
?>
<div style="font-family: verdana, arial, sans-serif ;font-size: 9pt"> 
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
		3. <b>TAB Chart</b>, Adalah tab main menu Chart Employe, grafik analiza employee data.
		<br>
	<br>
	<?php echo Html::img('@web/upload/help/employee/emp1.png',  ['class' => 'pnjg', 'style'=>'width:800px;height:450px;']); ?>
	
</div>