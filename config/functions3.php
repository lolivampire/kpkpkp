<?php
include_once "koneksi.php";

class FunctionsSiswa
{
    function siswaGetNilai($id)
    {
        global $conn;
        $sql = "SELECT detail_user.`id_user`, kelas.`nama`, kbm.`id_kbm` , kbm.`tahun_ajaran` FROM detail_user, kelas, kbm  WHERE detail_user.`id_kelas` = kelas.`id_kelas` AND kelas.`id_kelas` = kbm.`id_kelas` AND detail_user.`id_user` = '$id' GROUP BY tahun_ajaran";
        $result = $conn->query($sql);
        return $result;
    }
    function siswaGetKelas($tahun, $id)
    {
        global $conn;
        $sql = "SELECT kbm.`id_kelas`, kelas.nama, COUNT(kbm.`id_mapel`) AS jumlah_pelajaran, kbm.`tahun_ajaran` FROM  kbm, detail_user, kelas, user_sistem WHERE kbm.`id_kelas` = kelas.`id_kelas` AND kelas.`id_kelas` = detail_user.`id_kelas` AND user_sistem.`id_user` = detail_user.`id_user` AND user_sistem.`hak_akses`='3' AND kbm.`tahun_ajaran`='$tahun' AND detail_user.`id_user`='$id' GROUP BY kbm.id_kelas";
        $result = $conn->query($sql);
        return $result;
    }
    function siswaGetMapel($tahun, $kelas, $user)
    {
        global $conn;
        $sql = "SELECT kbm.`id_kbm`, kelas.`nama` AS kelas, mata_pelajaran.`id_mapel`, mata_pelajaran.`nama` AS nama_mapel, nilai.`id_user`, kbm.`tahun_ajaran` FROM kelas, mata_pelajaran, nilai, kbm WHERE kelas.`id_kelas` = kbm.`id_kelas`AND kbm.`id_mapel` = mata_pelajaran.`id_mapel` AND kbm.`id_kbm` = nilai.`id_kbm` AND kbm.`tahun_ajaran` = '$tahun' AND kbm.`id_kelas` = '$kelas' AND nilai.`id_user`='$user' GROUP BY kbm.`id_mapel`";
        $result = $conn->query($sql);
        return $result;
    }
    function siswaGetJumlahNilai($kbm, $id)
    {
        global $conn;
        $sql = "SELECT km.id_kbm, mp.id_mapel, du.id_user AS userID, du.nama, ks.nama AS nama_kelas , mp.nama AS nama_mapel, mp.kkm, AVG(nl.poin) AS rata_rata_nilai FROM kelas ks, nilai nl, user_sistem us,kbm km, mata_pelajaran mp, jenis_nilai jn, detail_user du WHERE km.id_kelas = ks.id_kelas AND du.id_user = us.id_user AND mp.id_mapel = km.id_mapel AND nl.id_kbm = km.id_kbm AND jn.id_jenis = nl.id_jenis AND nl.id_user = us.id_user AND km.`id_kbm`='$kbm' AND du.`id_user`='$id' GROUP BY us.id_user";
        $result = $conn->query($sql);
        return $result;
    }
}
