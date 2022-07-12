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
}
