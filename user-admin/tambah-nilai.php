<?php

include_once "../config/koneksi.php";
include_once "../config/library.php";
require_once "../config/functions2.php";
require_once "../config/functions.php";

$funs = new FunctionsDua();
$fun = new Functions();

if (isset($_GET["id_kbm"])) {
    # code...
    $kbm = $_GET["id_kbm"];
}
if (isset($_GET["id_user"])) {
    $id = $_GET["id_user"];
}
if (isset($_GET["id_kelas"])) {
    # code...
    $kelas = $_GET["id_kelas"];
}
if (isset($_GET["tahun_ajaran"])) {
    $tahun = $_GET["tahun_ajaran"];
}
if (isset($_GET["id_mapel"])) {
    $mapel = $_GET["id_mapel"];
}


// $kbm1 = $kbm;
// $id1 = $id;
// $kelas1 = $kelas;
// $tahun1 = $tahun;
// $mapel1 = $mapel;

// echo ($kbm1);
// echo (", ");
// echo ($id1);
// echo (", ");
// echo ($kelas1);
// echo (", ");
// echo ($tahun1);
// echo (", ");
// echo ($mapel1);

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
                    <h3 class="fs-4 mb-3">SUB JUDUL HALAMAN</h3>
                    <div class="d-flex mb-3">
                        <div class="">
                            <a href="..\user-admin\nilai-siswa-detail.php?tahun_ajaran=<?= $tahun1; ?>&id_kelas=<?= $kelas1; ?>&id_kbm=<?= $kbm1; ?>&id_user=<?= $id1; ?>&id_mapel=<?= $mapel1; ?>" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                    <div class="col mt-1">
                        <div class="card shadow-lg my-3">
                            <h5 class="card-header">NILAI</h5>
                            <div class="card-body">
                                <!-- form -->
                                <form>
                                    <input type="text" class="form-control" id="d1" value="<?= $kbm1 ?>" hidden>
                                    <input type="text" class="form-control" id="d2" value="<?= $id1 ?>" hidden>
                                    <input type="text" class="form-control" id="d3" value="<?= $kelas1 ?>" hidden>
                                    <input type="text" class="form-control" id="d4" value="<?= $tahun1 ?>" hidden>
                                    <input type="text" class="form-control" id="d5" value="<?= $mapel1 ?>" hidden>
                                    <div class="form-floating mb-3">
                                        <?php
                                        $namaSiswa = $fun->getDataSiswa($id);
                                        $dataNama = $namaSiswa->fetch_assoc();
                                        ?>
                                        <input type="text" class="form-control" id="input1" value="<?= $dataNama["nama"] ?>" disabled>
                                        <label for="input1">NAMA</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <?php
                                        $namaMapel = $funs->getMapel($mapel);
                                        $dataMapel = $namaMapel->fetch_assoc();
                                        ?>
                                        <input type="text" class="form-control" id="input2" value="<?= $dataMapel["namaMapel"] ?>" disabled>
                                        <label for="input2">MATA PELAJARAN</label>
                                    </div>
                                    <div class="form mb-3">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="input3">
                                            <option selected value="0">Jenis Nilai</option>
                                            <?php
                                            $result = $funs->getJenisNilai();
                                            while ($row = $result->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id_jenis'] ?>"> <?php echo $row['nama_jenis'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="input4">
                                        <label for="input3">POIN</label>
                                    </div>
                                    <button class="btn btn-success" id="btn_simpan">SIMPAN</button>
                                </form>
                                <!-- END form -->
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

    // tambah mata pelajaran
    $('#btn_simpan').click(function() {
        var user = $('#d2').val();
        var kbm = $('#d1').val();
        var jenis = $('#input3').val();
        var poin = $('#input4').val();

        // alert(user + ", " + kbm + ", " + jenis + ", " + poin);

        if (jenis != 0 && poin != '') {
            $.ajax({
                method: 'POST',
                url: '../config/controller.php',
                data: {
                    addDataNilai: 'addNilai',
                    user: user,
                    kbm: kbm,
                    jenis: jenis,
                    poin: poin
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
                        // window.location.href = "..\user-admin\nilai-siswa-detail.php?tahun_ajaran=<?= $tahun1; ?>&id_kelas=<?= $kelas1; ?>&id_kbm=<?= $kbm1; ?>&id_user=<?= $id1; ?>&id_mapel=<?= $mapel1; ?>";
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