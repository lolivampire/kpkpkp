<?php

include_once "koneksi.php";

class Functions
{
	function getUserData($id)
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses ='$id' ORDER BY us.id_user ASC";
		$result = $conn->query($sql);
		return $result;
	}

	function getId($id)
	{
		global $conn;
		$sql = "SELECT id_user FROM user_sistem WHERE id_user='$id' LIMIT 1";
		$result = $conn->query($sql);
		return $result;
	}

	function getAllUser()
	{
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user  ORDER BY us.id_user ASC";
		return $sql;
	}

	function getSiswaKelas($id)
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 3 AND du.id_kelas = '$id'  ORDER BY us.id_user ASC";
		$result = $conn->query($sql);
		return $result;
	}

	function getUserAdmin()
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 1 ORDER BY us.id_user ASC";
		$result = $conn->query($sql);
		return $result;
	}

	function getUserGuru()
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 2  ORDER BY us.id_user ASC";
		$result = $conn->query($sql);
		return $result;
	}

	function getUserGurubyKelas($idKelas)
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 2 AND du.id_kelas = '$idKelas' ORDER BY us.id_user ASC";
		$result = $conn->query($sql);
		return $result;
	}

	function getUserSiswa()
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 3  ORDER BY us.id_user ASC";
		$result = $conn->query($sql);
		return $result;
	}

	function getKelas()
	{
		global $conn;
		$sql = "SELECT id_kelas, nama FROM kelas";
		$result = $conn->query($sql);
		return $result;
	}

	function getKelasbyId($id_kelas)
	{
		global $conn;
		$sql = "SELECT id_kelas FROM detail_user WHERE id_kelas = '$id_kelas'";
		$result = $conn->query($sql);
		$kelas = $result->fetch_assoc();
		return $kelas;
	}

	function simpanUser($id, $pass, $email, $role)
	{
		global $conn;
		$sql = "INSERT INTO user_sistem VALUE ('$id','$pass','$email','$role',NOW())";
		$result = $conn->query($sql);
		return $result;
	}

	function simpanUserSiswa($id, $nama, $jk, $tgl, $kelas, $absen)
	{
		global $conn;
		$sql = "INSERT INTO detail_user (`id_user`,`nama`,`jk`,`tgl_lahir`,`id_kelas`,`absen`) VALUE ('$id','$nama','$jk','$tgl','$kelas','$absen')";
		$result = $conn->query($sql);
		return $result;
	}

	function simpanUserGuru($id, $nama, $jk, $tgl, $kelas)
	{
		global $conn;
		$sql = "INSERT INTO detail_user (`id_user`,`nama`,`jk`,`tgl_lahir`,`id_kelas`) VALUE ('$id','$nama','$jk','$tgl','$kelas')";
		$result = $conn->query($sql);
		return $result;
	}

	function simpanUserAdmin($id, $nama, $jk, $tgl)
	{
		global $conn;
		$sql = "INSERT INTO detail_user (`id_user`,`nama`,`jk`,`tgl_lahir`) VALUE ('$id','$nama','$jk','$tgl')";
		$result = $conn->query($sql);
		return $result;
	}

	function fullemail($email)
	{
		return $email . '@gmail.com';
	}

	function jenisKelamin($id)
	{
		if ($id == 1) {
			return 'LK';
		} else {
			return 'PR';
		}
	}

	function jenisKelaminOrigin($id)
	{
		if ($id == 'LK') {
			return 1;
		} else {
			return 2;
		}
	}

	function updateDataUser($id, $pass, $email, $role)
	{
		global $conn;
		$sql = "UPDATE user_sistem SET password='$pass',email='$email',hak_akses='$role' WHERE id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}

	function updateDataDetailUserAdmin($id, $nama, $jk, $tgl)
	{
		global $conn;
		$sql = "UPDATE detail_user SET nama='$nama',jk='$jk',tgl_lahir='$tgl'  WHERE id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}
	function updateDataDetailUserGuru($id, $nama, $jk, $tgl, $kelas)
	{
		global $conn;
		$sql = "UPDATE detail_user SET nama='$nama',jk='$jk',tgl_lahir='$tgl',id_kelas='$kelas' WHERE id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}
	function updateDataDetailUserSiswa($id, $nama, $jk, $tgl, $kelas, $absen)
	{
		global $conn;
		$sql = "UPDATE detail_user SET nama='$nama',jk='$jk',tgl_lahir='$tgl',id_kelas='$kelas',absen='$absen'  WHERE id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}

	function getDataUserAll($id)
	{
		global $conn;
		$sql = "SELECT * FROM user_sistem, detail_user WHERE user_sistem.id_user = detail_user.id_user and user_sistem.id_user = '$id'";
		$result = $conn->query($sql);
		return $result;
	}

	function getDataGuru($id)
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, us.password AS Pass, us.email, us.hak_akses,du.nama, du.tgl_lahir, du.jk, du.id_kelas FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 2 AND us.id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}
	function getDataSiswa($id)
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, us.password AS Pass, us.email, us.hak_akses,du.nama, du.tgl_lahir, du.jk, du.id_kelas, du.absen FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 3 AND us.id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}

	function getMapel()
	{
		global $conn;
		$sql = "SELECT km.`id_kbm` AS id_kbm, km.id_kelas AS kelas, mp.`nama` AS nama_mapel, du.`nama` AS nama_pengampu, km.tahun_ajaran FROM kbm km, detail_user du, kelas ks, mata_pelajaran mp WHERE du.`id_user` = km.`id_user` AND km.`id_kelas` = ks.`id_kelas` AND mp.`id_mapel` = km.`id_mapel`";
		$result = $conn->query($sql);
		return $result;
	}

	function hapusData($id)
	{
		global $conn;
		$sql = "DELETE FROM user_sistem WHERE id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}
	function hapusDataDetail($id)
	{
		global $conn;
		$sql = "DELETE FROM detail_user WHERE id_user='$id'";
		$result = $conn->query($sql);
		return $result;
	}
	function getDataMapel()
	{
		global $conn;
		$sql = "SELECT * FROM mata_pelajaran";
		$result = $conn->query($sql);
		return $result;
	}
	function getNamaGuru()
	{
		global $conn;
		$sql = "SELECT us.id_user AS id, du.nama AS nama_guru FROM detail_user du, user_sistem us WHERE du.`id_user` = us.`id_user` AND us.hak_akses = '2'";
		$result = $conn->query($sql);
		return $result;
	}
	function addDataKBM($idKelas, $idGuru, $idMapel)
	{
		global $conn;
		$sql = "INSERT INTO kbm VALUE ('$idKelas','$idGuru','$idMapel')";
		$result = $conn->query($sql);
		return $result;
	}
}
