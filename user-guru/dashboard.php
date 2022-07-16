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
    <title>Halaman Dashboard Guru</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><em class="fas fa-user-secret me-2"></em>SIPN</div>
            <div class="list-group list-group-flush my-3">
                <a href="../user-guru/dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><em class="fas fa-tachometer-alt me-2"></em>Dashboard</a>
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
                    <h2 class="fs-2 m-0">DASHBOARD GURU</h2>
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
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded shadow-lg">
                            <div>
                                <?php
                                $result = mysqli_query($conn, "SELECT COUNT(user_sistem.`id_user`) AS jumlah_user FROM user_sistem");
                                $data = mysqli_fetch_assoc($result);
                                ?>
                                <h3 class="fs-2"><?= $data["jumlah_user"]; ?></h3>
                                <p class="fs-5">User Terdaftar</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded shadow-lg">
                            <div>
                                <?php
                                $result = mysqli_query($conn, "SELECT COUNT(kelas.`id_kelas`) AS jumlah_kelas FROM kelas");
                                $data = mysqli_fetch_assoc($result);
                                ?>
                                <h3 class="fs-2"><?= $data["jumlah_kelas"]; ?></h3>
                                <p class="fs-5">Kelas Terdaftar</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded shadow-lg">
                            <div>
                                <?php
                                $result = mysqli_query($conn, "SELECT COUNT(kbm.`id_kbm`) AS jumlah_mapel FROM kbm");
                                $data = mysqli_fetch_assoc($result);
                                ?>
                                <h3 class="fs-2"><?= $data["jumlah_mapel"]; ?></h3>
                                <p class="fs-5">Mata Pelajaran Terdaftar</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded shadow-lg">
                            <div>
                                <?php
                                $result = mysqli_query($conn, "SELECT COUNT(nilai.`id_nilai`) AS jumlah_nilai FROM nilai");
                                $data = mysqli_fetch_assoc($result);
                                ?>
                                <h3 class="fs-2"><?= $data["jumlah_nilai"]; ?></h3>
                                <p class="fs-5">Nilai Masuk</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- PREVIEW CARD -->
                <div class="card mb-3 shadow-lg mt-3">
                    <div class="card-body">

                        <h3 class="card-title mt-3 text-center fw-bolder">SISTEM PENGOLAHAN NILAI SD MUHAMMADIYAH 1 TEMANGGUNG</h3>

                        <br>
                        <table style="undefined;table-layout: fixed; width: 623px" class="m-2 fs-4" aria-describedby="info">
                            <colgroup>
                                <col style="width: 128px">
                                <col style="width: 20px">
                                <col style="width: 475px">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">
                                        Telpon</td>
                                    <td>:</td>
                                    <td>+62293492635 </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Facebook</td>
                                    <td>:</td>
                                    <td>SD Muhammadiyah 1 Temanggung</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Instagram</td>
                                    <td>:</td>
                                    <td>@sdmuhammadiyahtmg</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Email</td>
                                    <td>:</td>
                                    <td>admin@sdmuhtemanggung.sch.id</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Visi</td>
                                    <td>:</td>
                                    <td>“Sukses dalam prestasi teladan dalam iman dan akhlak.</td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="fw-bold">Misi</td>
                                    <td>:</td>
                                    <td>1. Menyelenggarakan pembelajaran dan pengembangan pendidikan Islam guna membangun kompetensi dan keunggulan siswa di bidang ilmu-ilmu dasar ke-Islaman, Ilmu pengetahuan, Teknologi dan Seni dan Budaya. Selanjutnya,</td>
                                </tr>
                                <tr>
                                    <td>:</td>
                                    <td>2. Menyelenggarakan dan mengembangkan KEJUJURAN, KEDISIPLINAN dan TIDAK EGOIS pada diri siswa. Kemudian,</td>
                                </tr>
                                <tr>
                                    <td>:</td>
                                    <td>3. Menyelenggarakan dan mengembangkan siswa melalui sistem pembelajaran aktif, inivatif, kreatif, efektif dan menyenangkan.</td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="card-text mt-5"><small class="text-muted">2022 allright reserved</small></p>

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