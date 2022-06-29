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
		$tgl = $_POST['tgl'];
		if ($role == 1) {
			$result = $fun->simpanUser($id, $pass, $fun->fullemail($email), $role);
			$result_det = $fun->simpanUserAdmin($id, $nama, $fun->jenisKelamin($jk), $tgl);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 2) {
			$kelas = $_POST['kelas'];
			$result = $fun->simpanUser($id, $pass, $fun->fullemail($email), $role);
			$result_det = $fun->simpanUserGuru($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 3) {
			$kelas = $_POST['kelas'];
			$absen = $_POST['absen'];
			$result = $fun->simpanUser($id, $pass, $fun->fullemail($email), $role);
			$result_det = $fun->simpanUserSiswa($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas, $absen);
			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
}

if (isset($_POST['updateUser'])) {
	if ($_POST['updateUser'] == 'update') {
		$id = $_POST['id'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$tgl = $_POST['tgl'];
		if ($role == 1) {
			$result = $fun->updateDataUser($id, $pass, $fun->fullemail($email), $role);
			$result_det = $fun->updateDataDetailUserAdmin($id, $nama, $fun->jenisKelamin($jk), $tgl);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 2) {
			$kelas = $_POST['kelas'];
			$result = $fun->updateDataUser($id, $pass, $fun->fullemail($email), $role);
			$result_det = $fun->updateDataDetailUserGuru($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 3) {
			$kelas = $_POST['kelas'];
			$absen = $_POST['absen'];
			$result = $fun->updateDataUser($id, $pass, $fun->fullemail($email), $role);
			$result_det = $fun->updateDataDetailUserSiswa($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas, $absen);
			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
}
if (isset($_POST('DataSelected'))) {
	$view = getDataUserAll($id);
	echo $view[0] . '?' . $view[1] . '?' . $view[2] . '?' . $view[3] . '?' . $view[4] . '?' . $view[5] . '?' . $view[6] . '?' . $view[7] . '?' . $view[8];
}
