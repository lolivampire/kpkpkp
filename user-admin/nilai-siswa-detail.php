<?php

include_once "../config/koneksi.php";
include_once "../config/library.php";
require_once "../config/functions.php";
require_once "../config/functions2.php";

$funs = new FunctionsDua();
$fun = new Functions();

$kbm = $_GET["id_kbm"];
$id = $_GET["id_user"];
$kelas = $_GET["id_kelas"];
$tahun = $_GET["tahun_ajaran"];
$mapel = $_GET["id_mapel"];
echo ($kbm);
echo (", ");
echo ($id);
echo (", ");
echo ($kelas);
echo (", ");
echo ($tahun);
echo (", ");
echo ($mapel);

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
                <a href="../user-admin/nilai.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-paperclip me-2"></em>Nilai</a>
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
                    <h3 class="fs-4 mb-3">DETAIL NILAI SISWA</h3>
                    <div class="d-flex mb-3">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <a href="..\user-admin\nilai-siswa.php?tahun_ajaran=<?= $tahun; ?>&id_kelas=<?= $kelas ?>&id_kbm=<?= $kbm ?>" class="btn btn-success">Kembali</a>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-warning" href="..\user-admin\tambah-nilai.php?tahun_ajaran=<?= $tahun; ?>&id_kelas=<?= $kelas ?>&id_kbm=<?= $kbm ?>&id_user=<?= $id; ?>&id_mapel=<?= $mapel ?>">TAMBAH NILAI</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-1">
                        <div class="card shadow-lg">
                            <h5 class="card-header">DETAIL SISWA</h5>
                            <div class="card-body">
                                <?php
                                $result = $fun->getDataSiswa($id);
                                $row = $result->fetch_assoc();

                                ?>
                                <p class="text-start">NAMA LENGKAP : <?php echo $row["nama"]; ?></p>
                                <p class="text-start"> KELAS : <?php echo $kelas ?></p>

                            </div>
                        </div>
                        <div class="card shadow-lg my-3">
                            <h5 class="card-header">NILAI</h5>
                            <div class="card-body">
                                <!-- tabel -->
                                <table class="table bg-white rounded shadow-lg  table-hover" id='tabel_nilai'>
                                    <thead>
                                        <tr>
                                            <th scope="col-auto" hidden>ID</th>
                                            <th scope="col-auto" hidden>ID KBM</th>
                                            <th scope="col-auto">Nama Siswa</th>
                                            <th scope="col-auto">Mata Pelajaran</th>
                                            <th scope="col-auto">Jenis Nilai</th>
                                            <th scope="col-auto">KKM</th>
                                            <th scope="col-atuo">Poin</th>
                                            <th scope="col-atuo">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $funs->getNilaiSiswaFromDetail($id, $kbm);
                                        if ($result && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) { ?>
                                                <tr>
                                                    <th scope="row" id="rowNilai" hidden><?= $row["id_nilai"]; ?></th>
                                                    <td hidden> <?= $row["id_kbm"]; ?></td>
                                                    <td> <?= $row["nama"]; ?></td>
                                                    <td> <?= $row["nama_mapel"]; ?></td>
                                                    <td> <?= $row["nama_jenis"]; ?></td>
                                                    <td> <?= $row["kkm"]; ?></td>
                                                    <td> <?= $row["poin"]; ?></td>
                                                    <td>
                                                        <a class="btn btn-danger" id="btnHapusData">Hapus</a>
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

    $('#tabel_nilai').on('click', '#btnHapusData', function() {
        var row = $(this).closest("tr");
        var idNilai = row.find("#rowNilai").text();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    url: '../config/controller.php',
                    data: {
                        idNilai: idNilai,
                        NilaiDeleted: 'NilaiDeleted'
                    },
                    success: function(data) {
                        if (data == 'success') {
                            swal("Success", "Data Berhasil Dihapus", "success");
                            location.reload();
                        } else {
                            swal("Failed", "Data gagal Dihapus");
                        }
                    },
                    cache: false,
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
</script>

</html>