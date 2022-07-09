<?php
include_once "koneksi.php";

class FunctionsDua
{
    function addDataKBM($idKelas, $idGuru, $idMapel)
    {
        global $conn;
        $sql = "INSERT INTO kbm VALUE ('','$idKelas','$idGuru','$idMapel')";
        return $conn->query($sql);
    }
}
