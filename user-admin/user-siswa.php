<?php
session_start();
require_once "../config/koneksi.php";
require_once "../config/functions.php";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <title>Master User Siswa</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">

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
                    <em class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></em>
                    <h2 class="fs-2 m-0">Master User Siswa</h2>
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


                <div class="d-flex mb-3">
                    <div class="p-2">
                        <select class="form-select" aria-label="Default select example" id="pilih_kelas">
                            <option selected value="0">Semua Kelas</option>
                            <?php
                            $resultPilihan = $fun->getKelas();
                            while ($row = $resultPilihan->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id_kelas'] ?>"> <?php echo $row['nama'] ?> </option>
                                <?php } ?>>
                        </select>
                    </div>
                    <div class="ms-auto p-2">
                        <a href="tambah-data-user.php" class="btn btn-success float-start">Tambah Data</a>
                    </div>
                </div>
                <div class="row my-3">
                    <h3 class="fs-4 mb-3">User</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover" id='tabel_user'>
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">ID</th>
                                    <th scope="col" width="20%">Nama</th>
                                    <th scope="col" width="10%">Email</th>
                                    <th scope="col" width="10%">Password</th>
                                    <th scope="col" width="10%">Hak Akses</th>
                                    <th scope="col" width="20%">Date Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };

        $(document).ready(function() {

            $('#pilih_kelas').change(function() {
                $(this).find('option:selected').each(function() {
                    var kelas = $(this).attr('value');
                    $.ajax({
                        type: 'POST',
                        url: '../tabel.php',
                        data: 'SiswakelasPilih=' + kelas,
                        success: function(data) {
                            $('#tabel_user').html(data);
                        }
                    });

                });
            }).change();

        });
    </script>
</body>
</body>

</html>