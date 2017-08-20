<?php
use yii\helpers\Html;
?>
<div style="font-family: verdana, arial, sans-serif ;font-size: 9pt"> 
	TIME TABLE, merupakan rule atau aturan pada attencance. Setiap Employee melakukan finger In atau out pada mesin absensi, 
	data tersebut akan langsung masuk ke server dan dideteksi oleh time table, dan di kelompokan sesuai kereteria yang sudah di tetapkan.
	Finger Maintain merupakan modul syncronize Finger Machine dengan Aplikasi Attendance. Untuk mendapatkan log yang online dan tepat waktu, 
	pada saat registrasi karyawan pada mesin Finger haruslah mencantumkan nama karyawan secara Jelas dan lengkap.
	Jika nama karyawan pada mesin finger sudah di input, maka akan muncul pada modul Finger Maintain, yang selanjutnya kita tambahkan nama Karyawan 
	untuk mengidentifikasi bahwa nama finger dan nama karyawan adalah benar.
	
	Untuk satu mesin finger, satu nama karyawan, dan bisa di tambahkan pada mesin finger lain untuk karyawan yang sama.
	<br><br>
	<b>Toolbar Fungsi :</b>
	<br>
		1. <b>Gridview warna Biru</b>, Adalah data Nama finger dari mesin finger secara otomatis apabila sudah terkoneksi.
		<br>
		2. <b>Gridview warna Hijau</b>, Adalah data Karyawan yang sudah di daftarkan sesuai nama pada finger print.
		<br>
		3. <b>Tombol Action</b>, Adalah Form penambahan data karyawan pada finger print, atau untuk menghapus karyawan pada finger print.
		<br>
		4. <b>Contoh1</b>, Adalah Nama karyawan yang sudah di syncronkan pada finger print.
		<br>
		5. <b>contoh2</b>, Adalah finger print yang belum di daftarkan/syncronkan untuk Nama karyawan.
		<br>
	<br>
	<?php echo Html::img('@web/upload/help/fingerMaintain/1a.png',  ['class' => 'pnjg', 'style'=>'width:800px;height:350px;']); ?>
	<br><br>
	<b>Tombol Action :</b>
	<br>
		1. <b>Employee To Finger</b>, Adalah Form penambahan Karyawan untuk finger print.
		<br>
		2. <b>Delete </b>, Adalah menghapus Karyawan pada finger print.
		<br></br>
	<?php echo Html::img('@web/upload/help/fingerMaintain/2a.png',  ['class' => 'pnjg', 'style'=>'width:500px;height:250px;']); ?>
	<br><br>
	<b>Form Employee To Finger :</b>
	<br>
		1. <b>Branch</b>, Adalah untuk memilih cabang untuk karyawan yang akan di setting.
		<br>
		2. <b>Depaertment </b>, Adalah untuk memilih untuk karyawan yang akan di setting.
		</br>
		3. <b>Change Employee </b>, menampilkan semua list data karyawan sesuai cabang dan department.
		</br>
		4. <b>List view Employe Finger </b>, menampilkan data finger print yang sudah di registerkan untuk karyawan.
		<br></br>
	<?php echo Html::img('@web/upload/help/fingerMaintain/3a.png',  ['class' => 'pnjg', 'style'=>'width:500px;height:450px;']); ?>
	
	
	
</div>