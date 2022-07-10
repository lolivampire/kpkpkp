<?php
include_once "koneksi.php";

class FunctionsDua
{
    function addDataKBM($idKelas, $idMapel, $idGuru)
    {
        global $conn;
        $sql = "INSERT INTO kbm (id_kelas,id_mapel,id_user) VALUE ('$idKelas','$idMapel','$idGuru')";
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
}
