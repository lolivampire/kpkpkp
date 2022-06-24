<?php

	require_once "../config/functions.php";
	$fun = new Functions();

	if (isset($_POST['simpanUser'])) {
		if ($_POST['simpanUser'] == 'add') {
			$id = $_POST['id'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
			$role = $_POST['role'];
			$nama = $_POST['nama'];
			$jk = $_POST['jk'];
			$kelas = $_POST['kelas'] ?? null;
			$absen = $_POST['absen'] ?? null;

			$result = $fun->simpanUser($id,$pass,$email,$role);
			if ($role == 1) {
				$result_det = $fun->simpanUserAdmin($nama,$jk);
				if ($result && $result_det) {
					echo "success";
				} else {
					echo "failed";
				}
			} elseif ($role == 2) {
				$result_det = $fun->simpanUserGuru($nama,$jk,$kelas);
				if ($result && $result_det) {
					echo "success";
				} else {
					echo "failed";
				}
			} elseif ($role == 3) {
				$result_det = $fun->simpanUserSiswa($nama,$jk,$kelas,$absen);
				if ($result && $result_det) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}

?>