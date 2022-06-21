<?php 

include 'koneksi.php';
include 'config/functions.php';

	if (isset($_POST['tampilData'])) {
		$role = $_POST['pilihRole'];
		if ($_POST['tampilData'] == 'tampil') {
			echo 'A';			
		} elseif ($_POST['tampilData'] == 'siswa' ) {
			$kelas = $_POST['pilihKelas'];
			echo $kelas;
		}
	}


?>
