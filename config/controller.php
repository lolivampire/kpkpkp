<?php

require_once "../config/functions.php";
require_once "../config/functions2.php";
$fun = new Functions();
$funs = new FunctionsDua();

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
			$result = $fun->updateDataUser($id, $pass, $email, $role);
			$result_det = $fun->updateDataDetailUserAdmin($id, $nama, $fun->jenisKelamin($jk), $tgl);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 2) {
			$kelas = $_POST['kelas'];
			$result = $fun->updateDataUser($id, $pass, $email, $role);
			$result_det = $fun->updateDataDetailUserGuru($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 3) {
			$kelas = $_POST['kelas'];
			$absen = $_POST['absen'];
			$result = $fun->updateDataUser($id, $pass, $email, $role);
			$result_det = $fun->updateDataDetailUserSiswa($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas, $absen);
			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
}

if (isset($_POST['updateGuru'])) {
	if ($_POST['updateGuru'] == 'update') {
		$id = $_POST['id'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$tgl = $_POST['tgl'];
		$kelas = $_POST['kelas'];


		if ($role == 1) {
			$result = $fun->updateDataUser($id, $pass, $email, $role);
			$result_det = $fun->updateDataDetailUserAdmin($id, $nama, $fun->jenisKelamin($jk), $tgl);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 2) {
			$kelas = $_POST['kelas'];
			$result = $fun->updateDataUser($id, $pass, $email, $role);
			$result_det = $fun->updateDataDetailUserGuru($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas);

			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		} elseif ($role == 3) {
			$kelas = $_POST['kelas'];
			$absen = $_POST['absen'];
			$result = $fun->updateDataUser($id, $pass, $email, $role);
			$result_det = $fun->updateDataDetailUserSiswa($id, $nama, $fun->jenisKelamin($jk), $tgl, $kelas, $absen);
			if ($result && $result_det) {
				echo "success";
			} else {
				echo "failed";
			}
		}
	}
}

if (isset($_POST['DataSelected'])) {
	$id = $_POST['idAdmin'];
	$view = $fun->getDataUserAll($id);
	$result = $view->fetch_assoc();
	echo $result['id_user'] . '?' . $result['password'] . '?' . $result['email'] . '?' . $result['hak_akses'] . '?' . $result['nama'] . '?' . $result['tgl_lahir'] . '?' . $fun->jenisKelaminOrigin($result['jk']);
}

if (isset($_POST['DataDeleted'])) {
	$id = $_POST['idUser'];
	$viewdet = $fun->hapusDataDetail($id);
	$view = $fun->hapusData($id);
	if ($view && $viewdet) {
		echo "success";
	} else {
		echo "failed";
	}
}

if (isset($_POST['dataKBM'])) {
	if ($_POST['dataKBM'] == 'tambahKBM') {
		$idKelas = $_POST['idKelas'];
		$idGuru = $_POST['idGuru'];
		$idMapel = $_POST['idMapel'];
		$idMapel = $_POST['idMapel'];
		$tahun = $_POST['tahun'];

		$result = $funs->addDataKBM($idKelas, $idMapel, $idGuru, $tahun);
		if ($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
}

if (isset($_POST['KBMdeleted'])) {
	$id = $_POST['idKBM'];
	$del = $funs->hapusKBM($id);
	if ($del) {
		echo "success";
	} else {
		echo "failed";
	}
}

if (isset($_POST['addDataMapel'])) {
	if ($_POST['addDataMapel'] == 'addMapel') {
		$idMapel = $_POST['idMapel'];
		$namaMapel = $_POST['namaMapel'];
		$deskripsi = $_POST['deskripsi'];
		$kkm = $_POST['kkm'];

		$result = $funs->tambahMapel($idMapel, $namaMapel, $deskripsi, $kkm);
		if ($result) {
			echo "success";
		} else {
			echo "failed";
		}
	}
}

if (isset($_POST['MapelDeleted'])) {
	$id = $_POST['id'];
	$del = $funs->hapusMapel($id);
	if ($del) {
		echo "success";
	} else {
		echo "failed";
	}
}
