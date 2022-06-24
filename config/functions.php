<?php

include_once "../config/koneksi.php";

class Functions
{
	function getUserData($id)
	{

		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses ='$id' ORDER BY us.id_user ASC";
		return $sql;
	}

	function getAllUser()
	{
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user  ORDER BY us.id_user ASC";
		return $sql;
	}

	function getSiswaKelas($id)
	{
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND du.id_kelas = '$id'  ORDER BY us.id_user ASC";
		return $sql;
	}

	function getUserAdmin()
	{
		global $conn;
		$sql = "SELECT us.id_user AS ID, du.nama, us.email, us.password AS Pass, us.hak_akses, us.date_created FROM user_sistem us, detail_user du WHERE us.id_user=du.id_user AND us.hak_akses = 1  ORDER BY us.id_user ASC";
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
		return $email.'@gmail.com';
	}

	function jenisKelamin($id)
	{
		if ($id == 1) {
			return 'LK';
		} else {
			return 'PR';
		}
		
	}
}
