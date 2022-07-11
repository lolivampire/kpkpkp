<?php

include_once "../config/koneksi.php";
include_once "../config/library.php";
require_once "../config/functions.php";
require_once "../config/functions2.php";

$fun = new Functions();
$funs = new FunctionsDua();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/dist/yearpicker.css">
    <script src="/path/to/cdn/jquery.slim.min.js"></script>
    <script src="../config/dist/yearpicker.js" async></script>
    <title>Halaman KBM</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><em class="fas fa-user-secret me-2"></em>SIPN</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-tachometer-alt me-2"></em>Dashboard</a>
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
                    <h2 class="fs-2 m-0">Halaman Tambah Data KBM</h2>
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
                    <h3 class="fs-4 mb-3">Tambahkan data Kegiatan Belajar Mengajar</h3>
                    <div class="d-flex mb-3">
                        <div class="">
                            <a href="../user-admin/kbm.php" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                    <div class="col mt-1">
                        <div class="card">
                            <h5 class="card-header">Featured</h5>
                            <div class="card-body">
                                <div class="p-3 bg-white text-dark">
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="kelas">
                                                <option selected value="0">Kelas</option>
                                                <?php
                                                $result = $fun->getKelas();
                                                while ($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['id_kelas'] ?>"><?php echo $row['nama'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="guru">
                                                <option selected value="0">Guru Pengampu</option>
                                                <?php
                                                $result = $fun->getNamaGuru();
                                                while ($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['nama_guru'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="mapel">
                                                <option selected value="0">Mata Pelajaran</option>
                                                <?php
                                                $result = $fun->getDataMapel();
                                                while ($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['id_mapel'] ?>"><?php echo $row['nama'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="yearpicker form-select mb-3" value="" id="tahun_ajaran" placeholder="Tahun Ajaran">
                                        </div>
                                        <div class="col-auto">
                                            <a id="btnTambahKBM" class="btn btn-primary btn-lg">Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
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
    $('.yearpicker').yearpicker();

    $('.yearpicker').yearpicker({

        // Initial Year
        year: null,

        // Start Year
        startYear: null,

        // End Year
        endYear: null,

        // Element tag
        itemTag: 'li',

        // Default CSS classes
        selectedClass: 'selected',
        disabledClass: 'disabled',
        hideClass: 'hide',

        // Custom template
        template: `<div class="yearpicker-container">
              <div class="yearpicker-header">
                  <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                  <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                  <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
              </div>
              <div class="yearpicker-body">
                  <ul class="yearpicker-year" data-view="years">
                  </ul>
              </div>
          </div>
  `,

    });
    $('.yearpicker').yearpicker({

        onShow: null,
        onHide: null,
        onChange: function(value) {}

    });

    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };

    $('#btnTambahKBM').click(function() {
        var idKelas = $('#kelas').val();
        var idGuru = $('#guru').val();
        var idMapel = $('#mapel').val();
        var tahun = $('#tahun_ajaran').val();
        // alert(idKelas);

        if (idKelas != 0 && idGuru != 0 && idMapel != 0) {
            $.ajax({
                method: 'POST',
                url: '../config/controller.php',
                data: {
                    dataKBM: 'tambahKBM',
                    idKelas: idKelas,
                    idMapel: idMapel,
                    idGuru: idGuru,
                    tahun: tahun
                },
                success: function(data) {
                    if (data == 'success') {
                        // Swal.fire({
                        //     title: 'Data berhasil ditambahkan',
                        //     confirmButtonText: 'Kembali'
                        // }).then((result) => {
                        //     window.location.href = "kbm.php";
                        // });
                        alert('success');
                    } else {
                        // swal("Failed", "Data gagal ditambahkan!");
                        alert('failed');
                    }
                },
                cache: false,
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        } else {
            // swal("Failed", "Masukkan Data");
            alert('MASUKKAN DATA');
        }
    });
</script>

</html>