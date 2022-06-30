<?php

require_once "../config/koneksi.php";
require_once "../config/functions.php";
include_once "../config/library.php";

$fun = new Functions();

$id = $_GET["id"];
$getData = $fun->getDataGuru($id);
$row = $getData->fetch_assoc();
var_dump($row);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>SIPN</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="../user-admin/user.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-project-diagram me-2"></i>User Admin</a>
                <a href="../user-admin/user-guru.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>User Guru</a>
                <a href="../user-admin/user-siswa.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>User Siswa</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-chart-line me-2"></i>Mapel</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Nilai</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Halaman Update Data</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
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
                <a href="user-guru.php" class="btn btn-warning">Kembali</a>
                <div class="row my-3">
                    <h3 class="fs-4 mb-3">User</h3>
                    <div id="notif"></div>
                    <div class="col">
                        <form>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">ID User</span>
                                <input type="text" class="form-control" placeholder=" Masukkan ID User" aria-label="ID User" aria-describedby="basic-addon1" id="idUser" value="<?= $row["ID"] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="text" class="form-control" placeholder=" Masukkan Password" aria-label="Password" aria-describedby="basic-addon1" id="pass" value="<?= $row["Pass"] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukkan Email" aria-label="Email" aria-describedby="basic-addon2" id="email" value="<?= $row["email"] ?>">
                                <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="role">
                                <option selected value="<?= $row["hak_akses"] ?>">Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Guru</option>
                                <option value="3">Siswa</option>
                            </select>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">NAMA LENGKAP</span>
                                <input type="text" class="form-control" placeholder=" Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1" id="namalengkap" value="<?= $row["nama"] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Tanggal Lahir</span>
                                <input type="date" name="admission_date" id="tgl_lahir" class="form-control" value="<?= $row["tgl_lahir"] ?>">
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="jeniskelamin">
                                <option selected value="<?= $row["jk"] ?>">Jenis Kelamin</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="kelas">
                                <option selected value="<?= $row["id_kelas"] ?>">Kelas</option>
                                <?php
                                $result = $fun->getKelas();
                                while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_kelas'] ?>"> <?php echo $row['nama'] ?> </option>
                                <?php } ?>
                            </select>
                        </form>
                        <button type="button" class="btn btn-success" id="simpan">Simpan</button>
                        <button type="button" class="btn btn-info">Reset</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
</body>

</html>