<?php
session_start();
require_once "../config/koneksi.php";
require_once "../config/functions.php";
include_once "../config/library.php";

$fun = new Functions();

if (isset($_SESSION["login"]) && isset($_SESSION["login-admin"])) {
    $idU = $_SESSION["idu"];
} else {
    header('Location: ../login.php');
    exit;
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>Master User Admin</title>
    <script>

    </script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>SIPN</div>
            <div class="list-group list-group-flush my-3">
                <a href="../user-admin/dashboard-admin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="../user-admin/user.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>User Admin</a>
                <a href="../user-admin/user-guru.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-project-diagram me-2"></i>User Guru</a>
                <a href="../user-admin/user-siswa.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>User Siswa</a>
                <a href="../user-admin/kbm.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-chart-line me-2"></i>Mapel</a>
                <a href="../user-admin/nilai.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Nilai</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Master User</h2>
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

                <!-- PREVIEW CARD -->
                <a href="user.php" class="btn btn-warning">Kembali</a>
                <div class="row my-3">
                    <h3 class="fs-4 mb-3">User</h3>
                    <div id="notif"></div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Form Tambah User
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">ID User</span>
                                        <input type="text" class="form-control" placeholder=" Masukkan ID User" aria-label="ID User" aria-describedby="basic-addon1" id="idUser">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Password</span>
                                        <input type="text" class="form-control" placeholder=" Masukkan Password" aria-label="Password" aria-describedby="basic-addon1" id="pass">
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukkan Email" aria-label="Email" aria-describedby="basic-addon2" id="email">
                                        <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                    </div>

                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="role">
                                        <option selected value="0">Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Guru</option>
                                        <option value="3">Siswa</option>
                                    </select>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">NAMA LENGKAP</span>
                                        <input type="text" class="form-control" placeholder=" Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1" id="namalengkap">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Tanggal Lahir</span>
                                        <input type="date" name="admission_date" id="tgl_lahir" class="form-control">
                                    </div>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="jeniskelamin">
                                        <option selected value="0">Jenis Kelamin</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>

                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="kelas">
                                        <option selected value="0">Kelas</option>
                                        <?php
                                        $result = $fun->getKelas();
                                        while ($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id_kelas'] ?>"> <?php echo $row['nama'] ?> </option>
                                        <?php } ?>
                                    </select>
                                    <div class="input-group mb-3" id="absen">
                                        <span class="input-group-text" id="basic-addon1">Absen</span>
                                        <input type="number" class="form-control" placeholder=" Masukkan Absen" aria-label="Absen" aria-describedby="basic-addon1" id="absenSiswa">
                                    </div>
                                    <button type="button" class="btn btn-success" id="simpan">Simpan</button>
                                    <button type="button" class="btn btn-info">Reset</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };

        function simpan(id, pass, email, role, nama, tgl, jk, kelas, absen) {
            $.ajax({
                method: 'POST',
                url: '../config/controller.php',
                data: {
                    simpanUser: 'add',
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
                        // swal("Success", "Data Berhasil Ditambahkan!", "success");
                        alert('Data Berhasil Ditambahkan!');
                        $('#idUser').val('');
                        $('#pass').val('');
                        $('#email').val('');
                        $('#role').val(0);
                        $('#namalengkap').val('');
                        $('#tgl_lahir').val('');
                        $('#jeniskelamin').val(0);
                        $('#kelas').val(0);
                        $('#absenSiswa').val('');
                    } else {
                        swal("Failed", "Data gagal ditambahkan!");
                    }
                },
                cache: false,
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        }

        $(document).ready(function() {
            $('#absen').hide();
            $('#kelas').hide();
            $('#role').change(function() {
                if ($(this).val() == 3) {
                    $('#absen').show();
                    $('#kelas').show();
                } else if ($(this).val() == 2) {
                    $('#kelas').show();
                    $('#absen').hide();
                } else {
                    $('#absen').hide();
                    $('#kelas').hide();
                }
            });
            $('#simpan').click(function() {
                var id = $('#idUser').val();
                var pass = $('#pass').val();
                var email = $('#email').val();
                var role = $('#role').val();
                var nama = $('#namalengkap').val();
                var tgl = $('#tgl_lahir').val();
                var jk = $('#jeniskelamin').val();
                var kelas = $('#kelas').val();
                var absen = $('#absenSiswa').val();

                if (role != 0 && (id != '' || pass != '' || email != '' || nama != '' || tgl != '' || jk != 0)) {
                    if (role == 2 && kelas != 0) {
                        simpan(id, pass, email, role, nama, tgl, jk, kelas, absen);
                    } else if (role == 3 && kelas != 0 && absen != '') {
                        simpan(id, pass, email, role, nama, tgl, jk, kelas, absen);

                    } else {
                        simpan(id, pass, email, role, nama, tgl, jk, kelas, absen);
                    }
                } else {
                    alert('Masukkan Data');
                }
            });

        });
    </script>
</body>

</html>