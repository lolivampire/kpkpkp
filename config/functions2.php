<?php
include_once "koneksi.php";

class FunctionsDua
{
    function addDataKBM($idKelas, $idMapel, $idGuru, $tahun)
    {
        global $conn;
        $sql = "INSERT INTO kbm (id_kelas,id_mapel,id_user,tahun_ajaran) VALUE ('$idKelas','$idMapel','$idGuru','$tahun')";
        $result = $conn->query($sql);
        return $result;
    }
    function hapusKBM($id)
    {
        global $conn;
        $sql = "DELETE FROM kbm WHERE id_kbm='$id'";
        $result = $conn->query($sql);
        return $result;
    }
    function tambahMapel($idMapel, $namaMapel, $deskripsi, $kkm)
    {
        global $conn;
        $sql = "INSERT INTO mata_pelajaran (id_mapel,nama,deskripsi,kkm) VALUE ('$idMapel','$namaMapel','$deskripsi','$kkm')";
        $result = $conn->query($sql);
        return $result;
    }
    function hapusMapel($id)
    {
        global $conn;
        $sql = "DELETE FROM mata_pelajaran WHERE id_mapel='$id'";
        $result = $conn->query($sql);
        return $result;
    }
    function getTahunPelajaran()
    {
        global $conn;
        $sql = "SELECT kbm.`tahun_ajaran` FROM kbm GROUP BY kbm.`tahun_ajaran`;";
        $result = $conn->query($sql);
        return $result;
    }
    function getKelasFromTahun($tahun)
    {
        global $conn;
        $sql = "SELECT kbm.`id_kelas`, kelas.nama, COUNT(kbm.`id_mapel`) AS jumlah_pelajaran, kbm.`tahun_ajaran` FROM  kbm, detail_user, kelas, user_sistem WHERE kbm.`id_kelas` = kelas.`id_kelas` AND kelas.`id_kelas` = detail_user.`id_kelas` AND user_sistem.`id_user` = detail_user.`id_user` AND user_sistem.`hak_akses`='2' AND kbm.`tahun_ajaran`='$tahun' GROUP BY kbm.id_kelas;";
        $result = $conn->query($sql);
        return $result;
    }
    function getMapelFromKelas($tahun, $kelas)
    {
        global $conn;
        $sql = "SELECT km.`id_kbm` AS id_kbm, ks.nama AS kelas, mp.`nama` AS nama_mapel, du.`nama` AS nama_pengampu, km.tahun_ajaran FROM kbm km, detail_user du, kelas ks, mata_pelajaran mp WHERE du.`id_user` = km.`id_user` AND km.`id_kelas` = ks.`id_kelas` AND mp.`id_mapel` = km.`id_mapel` AND km.`tahun_ajaran`='$tahun' AND km.`id_kelas`='$kelas'";
        $result = $conn->query($sql);
        return $result;
    }
    function getSiswaFromMapel($kbm)
    {
        global $conn;
        $sql = "SELECT km.id_kbm, mp.id_mapel, du.id_user as userID, du.nama, mp.nama AS nama_mapel, mp.kkm, AVG(nl.poin) AS rata_rata_nilai FROM nilai nl, user_sistem us,kbm km, mata_pelajaran mp, jenis_nilai jn, detail_user du WHERE du.id_user = us.id_user AND mp.id_mapel = km.id_mapel AND nl.id_kbm = km.id_kbm AND jn.id_jenis = nl.id_jenis AND nl.id_user = us.id_user AND km.`id_kbm`='$kbm' GROUP BY us.id_user";
        $result = $conn->query($sql);
        return $result;
    }

    function getNilaiSiswaFromDetail($id, $kbm)
    {
        global $conn;
        $sql = "SELECT  nl.id_nilai, km.id_kbm, du.nama, mp.nama AS nama_mapel, jn.nama_jenis, mp.kkm, nl.poin FROM nilai nl, user_sistem us,kbm km, mata_pelajaran mp, jenis_nilai jn, detail_user du WHERE du.id_user = us.id_user AND mp.id_mapel = km.id_mapel AND nl.id_kbm = km.id_kbm AND jn.id_jenis = nl.id_jenis AND nl.id_user = us.id_user AND us.id_user = '$id' AND km.`id_kbm`='$kbm'";
        $result = $conn->query($sql);
        return $result;
    }
    function deleteNilai($id)
    {
        global $conn;
        $sql = "DELETE FROM nilai WHERE id_nilai='$id';";
        $result = $conn->query($sql);
        return $result;
    }
    function getJenisNilai()
    {
        global $conn;
        $sql = "SELECT id_jenis, nama_jenis FROM jenis_nilai";
        $result = $conn->query($sql);
        return $result;
    }
    function getMapel($mapel)
    {
        global $conn;
        $sql = "SELECT id_mapel, nama as namaMapel from mata_pelajaran WHERE id_mapel='$mapel'";
        $result = $conn->query($sql);
        return $result;
    }
    function insertNilai($user, $kbm, $jenis, $poin)
    {
        global $conn;
        $sql = "INSERT INTO nilai (id_user,id_kbm,id_jenis,poin) VALUE ('$user','$kbm','$jenis',$poin)";
        $result = $conn->query($sql);
        return $result;
    }
}
