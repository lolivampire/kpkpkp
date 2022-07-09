<?php

require_once "../config/koneksi.php";
require_once "../config/functions.php";
include_once "../config/library.php";

$fun = new Functions();

$id = $_GET["id"];
$getData = $fun->getDataSiswa($id);
$row = $getData->fetch_assoc();
var_dump($row);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><em class="fas fa-user-secret me-2"></em>SIPN</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-tachometer-alt me-2"></em>Dashboard</a>
                <a href="../user-admin/user.php" class="list-group-item list-group-item-action bg-transparent second-text active"><em class="fas fa-project-diagram me-2"></em>User Admin</a>
                <a href="../user-admin/user-guru.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-project-diagram me-2"></em>User Guru</a>
                <a href="../user-admin/user-siswa.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-project-diagram me-2"></em>User Siswa</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-chart-line me-2"></em>Mapel</a>
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
                    <h2 class="fs-2 m-0">Halaman Update Data Siswa</h2>
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

                <!-- PREVIEW CARD -->
                <a href="user-siswa.php" class="btn btn-warning">Kembali</a>
                <div class="row my-3">
                    <h3 class="fs-4 mb-3">User Siswa</h3>
                    <div id="notif"></div>
                    <div class="col">
                        <form id="form-update" action="" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">ID User</span>
                                <input type="text" class="form-control" placeholder=" Masukkan ID User" aria-label="ID User" aria-describedby="basic-addon1" name="id_user" id="idUser" value="<?= $row["ID"] ?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Absen</span>
                                <input type="text" class="form-control" placeholder=" Masukkan Absen" aria-label="Absen" aria-describedby="basic-addon1" name="absen" id="absen" value="<?= $row["absen"] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="text" class="form-control" placeholder=" Masukkan Password" aria-label="Password" aria-describedby="basic-addon1" id="pass" name="pass" value="<?= $row["Pass"] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukkan Email" aria-label="Email" aria-describedby="basic-addon2" id="email" name="email" value="<?= $row["email"] ?>">
                                <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="role" name="role" disabled>
                                <option value="1" <?php if ($row["hak_akses"] == 1) {
                                                        echo "selected='selected'";
                                                    } ?>>Admin</option>
                                <option value="2" <?php if ($row["hak_akses"] == 2) {
                                                        echo "selected='selected'";
                                                    } ?>>Guru</option>
                                <option value="3" <?php if ($row["hak_akses"] == 3) {
                                                        echo "selected='selected'";
                                                    } ?>>Siswa</option>
                            </select>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">NAMA LENGKAP</span>
                                <input type="text" class="form-control" placeholder=" Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1" id="namalengkap" name="nama" value="<?= $row["nama"] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Tanggal Lahir</span>
                                <input type="date" name="admission_date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="<?= $row["tgl_lahir"] ?>">
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="jeniskelamin" name="jeniskelamin">
                                <option value="1" <?php if ($row["jk"] == "LK") {
                                                        echo "selected='selected'";
                                                    } ?>>Laki-Laki</option>
                                <option value="2" <?php if ($row["jk"] == "PR") {
                                                        echo "selected='selected'";
                                                    } ?>>Perempuan</option>
                            </select>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="kelas" name="kelas">
                                <option selected value="0">Kelas</option>
                                <?php
                                $result = $fun->getKelas();
                                $result_user = $fun->getKelasbyId($row['id_kelas']);
                                while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_kelas'] ?>" <?php if ($row['id_kelas'] == $result_user['id_kelas']) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $row['nama'] ?> </option>
                                <?php } ?>
                            </select>
                            <!-- <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">ID User</span>
                                <input type="text" class="form-control" placeholder=" Masukkan ID User" aria-label="ID User" aria-describedby="basic-addon1" name="id_user" id="idUser" value="<?= $row[5] ?>" disabled>
                            </div> -->
                        </form>
                        <button type="submit" class="btn btn-success" name="btn_update" id="btn_update">Update Data</button>
                        <button type="button" class="btn btn-info">Reset</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
</body>
<script>
    $('#btn_update').click(function() {

        var id = $('#idUser').val();
        var pass = $('#pass').val();
        var email = $('#email').val();
        var role = $('#role').val();
        var nama = $('#namalengkap').val();
        var tgl = $('#tgl_lahir').val();
        var jk = $('#jeniskelamin').val();
        var kelas = $('#kelas').val();
        var absen = $('#absen').val();

        if (role != 0 && (id != '' || pass != '' || email != '' || nama != '' || tgl != '' || jk != 0)) {
            $.ajax({
                url: '../config/controller.php',
                method: 'POST',
                data: {
                    updateUser: 'update',
                    id: id,
                    pass: pass,
                    email: email,
                    role: role,
                    nama: nama,
                    tgl: tgl,
                    jk: jk,
                    kelas: kelas,
                    absen: absen

                },
                success: function(data) {
                    if (data == 'success') {
                        Swal.fire({
                            title: 'Data berhasil diubah',
                            confirmButtonText: 'Kembali'
                        }).then((result) => {
                            window.location.href = "user-siswa.php";
                        });
                    } else {
                        swal("Failed", "Data gagal diperbarui!");
                    }
                },
                cache: false,
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        } else {
            console.log(id + pass + email + role + nama + tgl + jk);
            swal("Failed", "Masukkan Data");
        }
    });
</script>

</html>