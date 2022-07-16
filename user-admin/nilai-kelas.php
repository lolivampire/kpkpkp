<?php

include_once "../config/koneksi.php";
include_once "../config/library.php";
require_once "../config/functions.php";
require_once "../config/functions2.php";

$funs = new FunctionsDua();
$tahun = $_GET["tahun_ajaran"];
// $hasil = $funs->getKelasFromTahun($tahun);
// if ($hasil) {
//     echo ('success');
// } else {
//     echo ('failed');
// }
// var_dump($tahun);

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
                <a href="../user-admin/dashboard-admin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-tachometer-alt me-2"></em>Dashboard</a>
                <a href="../user-admin/user.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-project-diagram me-2"></em>User Admin</a>
                <a href="../user-admin/user-guru.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-project-diagram me-2"></em>User Guru</a>
                <a href="../user-admin/user-siswa.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-project-diagram me-2"></em>User Siswa</a>
                <a href="../user-admin/kbm.php" class="list-group-item list-group-item-action bg-transparent second-text active"><em class="fas fa-chart-line me-2"></em>Mapel</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-paperclip me-2"></em>Nilai</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><em class="fas fa-power-off me-2"></em>Logout</a>
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
                                <em class="fas fa-user me-2"></em>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- PREVIEW CARD -->
            <div class="container-fluid px-4">
                <div class="row my-3">
                    <h3 class="fs-4 mb-3">PILIHAN KELAS</h3>
                    <div class="d-flex mb-3">
                        <div class="">
                            <a href="..\user-admin\nilai.php" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                    <div class="col mt-1">
                        <!-- tabel -->
                        <div class="card shadow-lg">
                            <h5 class="card-header">KELAS</h5>
                            <div class="card-body">
                                <table class="table bg-white rounded shadow-lg  table-hover" id='tabel_nilai'>
                                    <thead>
                                        <tr>
                                            <th scope="col-auto" hidden>ID Kelas</th>
                                            <th scope="col-auto">Kelas</th>
                                            <th scope="col-auto">Jumlah Mata Pelajaran</th>
                                            <th scope="col-auto">Tahun Ajaran</th>
                                            <th scope="col-atuo">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $funs->getKelasFromTahun($tahun);
                                        if ($result && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) { ?>
                                                <tr>
                                                    <th scope="row" id="rowKelas" hidden><?= $row["id_kelas"]; ?></th>
                                                    <td> <?= $row["nama"]; ?></td>
                                                    <td> <?= $row["jumlah_pelajaran"]; ?></td>
                                                    <td> <?= $row["tahun_ajaran"]; ?></td>
                                                    <td>
                                                        <a href="..\user-admin\nilai-mapel.php?tahun_ajaran=<?= $tahun; ?>&id_kelas=<?= $row["id_kelas"]; ?>" class="btn btn-danger" id="btnHapusData"> -></a>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- END tabel -->
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