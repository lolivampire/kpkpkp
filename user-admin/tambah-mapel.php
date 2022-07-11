<?php

include_once "../config/koneksi.php";
include_once "../config/library.php";
require_once "../config/functions.php";

$fun = new Functions();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Mata Pelajaran</title>
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
                    <h2 class="fs-2 m-0">Halaman Tambah Mata Pelajaran</h2>
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
                    <div class="d-flex mb-3">
                        <div class="">
                            <a href="../user-admin/kbm.php" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                    <div class="col mt-1">
                        <!-- Form tambah mata pelajaran -->
                        <div>
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    Add Data Mata Pelajaran
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="input1" placeholder="ID Mapel">
                                                    <label for="input1">ID Mapel</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="input2" placeholder="Nama Mapel">
                                                    <label for="input2">Nama Mapel</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mt-3">
                                            <textarea class="form-control" placeholder="Maukkan deskripsi mapel" id="input3" style="height: 50px"></textarea>
                                            <label for="input3">Deskripsi</label>
                                        </div>
                                        <div class="form-floating mt-3">
                                            <input type="text" class="form-control" id="input4" placeholder="KKM">
                                            <label for="input4">KKM</label>
                                        </div>
                                        <a id="btnTambahMapel" class="btn btn-primary mt-3 float-end">Tambah Data</a>
                                    </form>
                                </div>
                            </div>
                            <!-- tabel mata pelajaran -->
                            <div class="card text-center mt-3">
                                <div class="card-header">
                                    Tabel Mata Pelajaran
                                </div>
                                <div class="card-body">
                                    <table class="table bg-white rounded shadow-lg  table-hover" id='tabel_kbm'>
                                        <caption>Tabel Mata pelajaran</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col-auto">ID Mapel</th>
                                                <th scope="col-auto">Nama Mapel</th>
                                                <th scope="col-auto">Deskripsi</th>
                                                <th scope="col-auto">KKM</th>
                                                <th scope="col-auto">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $result = $fun->getDataMapel();
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) { ?>
                                                    <tr>
                                                        <th scope="row" id="rowMapel"><?= $row["id_mapel"]; ?></th>
                                                        <td> <?= $row["nama"]; ?> </td>
                                                        <td> <?= $row["deskripsi"]; ?> </td>
                                                        <td> <?= $row["kkm"]; ?> </td>
                                                        <td>
                                                            <a class="btn btn-danger" id="btnHapusData">Hapus</a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer text-muted">
                                    Last update 2 days ago
                                </div>
                            </div>
                        </div>
                        <!-- END Content here -->
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

    // tambah mata pelajaran
    $('#btnTambahMapel').click(function() {
        var idMapel = $('#input1').val();
        var namaMapel = $('#input2').val();
        var deskripsi = $('#input3').val();
        var kkm = $('#input4').val();
        // alert(idMapel + namaMapel + deskripsi + kkm);

        if (idMapel != '' && namaMapel != '' && deskripsi != '' && kkm != '') {
            $.ajax({
                method: 'POST',
                url: '../config/controller.php',
                data: {
                    addDataMapel: 'addMapel',
                    idMapel: idMapel,
                    namaMapel: namaMapel,
                    deskripsi: deskripsi,
                    kkm: kkm
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

    // HAPUS DATA
    $('#tabel_kbm').on('click', '#btnHapusData', function() {
        var row = $(this).closest("tr");
        var id = row.find("#rowMapel").text();

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
                        id: id,
                        MapelDeleted: 'MapelDeleted'
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