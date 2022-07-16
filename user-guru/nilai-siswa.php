<?php
session_start();
include_once "../config/koneksi.php";
include_once "../config/library.php";
require_once "../config/functions.php";
require_once "../config/functions2.php";

$fun = new Functions();
$funs = new FunctionsDua();

$kbm = $_GET["id_kbm"];
$tahun = $_GET["tahun_ajaran"];
$kelas = $_GET["id_kelas"];
echo ($kbm);
echo (', ');
echo ($tahun);
echo (', ');
echo ($kelas);

if (isset($_SESSION["login"]) && isset($_SESSION["login-guru"])) {
    $idU = $_SESSION["idu"];
} else {
    header('Location: ../login.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TITLE</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><em class="fas fa-user-secret me-2"></em>SIPN</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-tachometer-alt me-2"></em>Dashboard</a>
                <a href="nilai.php" class="list-group-item list-group-item-action bg-transparent second-text active"><em class="fas fa-project-diagram me-2"></em>Penilaian</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-project-diagram me-2"></em>Remidial</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <em class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></em>
                    <h2 class="fs-2 m-0">HALAMAN PENGOLAHAN NILAI</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <em class="fas fa-user me-2"></em>
                                <?php
                                $result = $fun->getDataUserAll($idU);
                                $displayName = $result->fetch_assoc();
                                echo "$displayName[nama]";
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- PREVIEW CARD -->
            <div class="container-fluid px-4">
                <div class="row my-3">
                    <h3 class="fs-4 mb-3">PILIHAN SISWA</h3>
                    <div class="d-flex mb-3">
                        <div class="">
                            <a href="..\user-guru\nilai-mapel.php?tahun_ajaran=<?= $tahun; ?>&id_kelas=<?= $kelas ?>" class="btn btn-success">Kembali</a>
                        </div>
                        <div class="">
                            <a class="btn btn-warning mx-2" href="..\user-guru\tambah-nilai.php?tahun_ajaran=<?= $tahun; ?>&id_kelas=<?= $kelas ?>&id_kbm=<?= $kbm ?>">Tambah Nilai</a>
                        </div>
                    </div>
                    <div class="col mt-1">
                        <div class="card shadow-lg">
                            <h5 class="card-header">MATA PELAJARAN</h5>
                            <div class="card-body">
                                <!-- tabel -->
                                <table class="table bg-white rounded shadow-lg  table-hover" id='tabel_nilai'>
                                    <thead>
                                        <tr>
                                            <th scope="col-auto" hidden>ID</th>
                                            <th scope="col-auto" hidden>ID Mapel</th>
                                            <th scope="col-auto">Nama Siswa</th>
                                            <th scope="col-auto">Mata Pelajaran</th>
                                            <th scope="col-auto">KKM</th>
                                            <th scope="col-auto">Rata-rata</th>
                                            <th scope="col-atuo">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $funs->getSiswaUG($kbm, $idU);
                                        if ($result && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) { ?>
                                                <tr>
                                                    <th scope="row" id="rowMapel" hidden><?= $row["id_kbm"]; ?></th>
                                                    <td hidden> <?= $row["id_mapel"]; ?></td>
                                                    <td> <?= $row["nama"]; ?></td>
                                                    <td> <?= $row["nama_mapel"]; ?></td>
                                                    <td> <?= $row["kkm"]; ?></td>
                                                    <td> <?= $row["rata_rata_nilai"]; ?></td>
                                                    <td>
                                                        <a href="..\user-guru\nilai-siswa-detail.php?tahun_ajaran=<?= $tahun; ?>&id_kelas=<?= $kelas ?>&id_kbm=<?= $kbm ?>&id_user=<?= $row["userID"]; ?>&id_mapel=<?= $row["id_mapel"] ?>" class="btn btn-danger" id="btnHapusData">➜</a>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                                <!-- END tabel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>

</html>