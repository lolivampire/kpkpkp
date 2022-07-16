<?php
session_start();
include_once "../config/koneksi.php";
include_once "../config/library.php";
require_once "../config/functions2.php";
require_once "../config/functions.php";

$funs = new FunctionsDua();
$fun = new Functions();

if (isset($_SESSION["login"]) && isset($_SESSION["login-guru"])) {
    $idU = $_SESSION["idu"];
} else {
    header('Location: ../login.php');
    exit;
}

if (isset($_GET["id_kbm"])) {
    # code...
    $kbm1 = $_GET["id_kbm"];
}
if (isset($_GET["id_user"])) {
    $id1 = $_GET["id_user"];
}
if (isset($_GET["id_kelas"])) {
    # code...
    $kelas1 = $_GET["id_kelas"];
}
if (isset($_GET["tahun_ajaran"])) {
    $tahun1 = $_GET["tahun_ajaran"];
}
if (isset($_GET["id_mapel"])) {
    $mapel1 = $_GET["id_mapel"];
}

//mengecek apakah tombol sumbit sudah diclick atau belum
if (isset($_POST["btnAdd"])) {
    //ambil data
    $user = $_POST['input1'];
    $kbm = $kbm1;
    $jenis = $_POST["input3"];
    $poin = $_POST["input4"];

    $queryinsertnilai = "INSERT INTO nilai (id_user,id_kbm,id_jenis,poin) VALUE ('$user','$kbm','$jenis',$poin)";


    //mengecek apakah data berhasil ditambahkan
    if ($conn->query($queryinsertnilai) === TRUE) {
        echo "
        <script>
            alert('New record created successfully');           
        </script>
        ";
        $data = array('tahun_ajaran' => $tahun1, 'id_kelas' => $kelas1, 'id_kbm' => $kbm1,);
        header('Location: ..\user-guru\nilai-siswa.php?' . http_build_query($data));
    } else {
        echo "
        <script>
            alert('Failed to add record');
        </script>
        " . $conn->error;
    }
}

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
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-tachometer-alt me-2"></em>Dashboard</a>
                <a href="nilai.php" class="list-group-item list-group-item-action bg-transparent second-text active"><em class="fas fa-project-diagram me-2"></em>Penilaian</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><em class="fas fa-project-diagram me-2"></em>Remidial</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <em class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></em>
                    <h2 class="fs-2 m-0">TAMBAH NILAI SISWA</h2>
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
                <div class="row my-3">
                    <h3 class="fs-4 mb-3">SUB JUDUL HALAMAN</h3>
                    <div class="d-flex mb-3">
                        <div class="">
                            <a href="..\user-guru\nilai-siswa.php?tahun_ajaran=<?= $tahun1; ?>&id_kelas=<?= $kelas1; ?>&id_kbm=<?= $kbm1; ?>" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                    <div class="col mt-1">
                        <div class="card shadow-lg my-3">
                            <h5 class="card-header">NILAI</h5>
                            <div class="card-body">
                                <!-- form -->
                                <form method="post">
                                    <div class="form-floating mb-3">
                                        <?php
                                        $namaSiswa = $fun->getSiswaKelas($kelas1);
                                        $dataNama = $namaSiswa->fetch_assoc();
                                        ?>
                                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="input1" id="input1">
                                            <option selected value="0">Nama</option>
                                            <?php
                                            $namaSiswa = $fun->getSiswaKelas($kelas1);
                                            while ($dataNama = $namaSiswa->fetch_assoc()) { ?>
                                                <option value="<?php echo $dataNama['ID'] ?>"> <?php echo $dataNama["nama"] ?> </option>
                                                }
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <?php
                                        $namaMapel = $funs->getMapelfromKBM($kbm1);
                                        $dataMapel = $namaMapel->fetch_assoc();
                                        ?>
                                        <input type="text" class="form-control" name="input2" id="input2" value="<?= $dataMapel["nama_mapel"] ?>" disabled>
                                        <label for="input2">MATA PELAJARAN</label>
                                    </div>
                                    <div class="form mb-3">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="input3" id="input3">
                                            <option selected value="0">Jenis Nilai</option>
                                            <?php
                                            $result = $funs->getJenisNilai();
                                            while ($row = $result->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id_jenis'] ?>"> <?php echo $row['nama_jenis'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="input4" id="input4" maxlength="3">
                                        <label for="input3">POIN</label>
                                    </div>
                                    <button type="submit" class="btn btn-success" name="btnAdd" id="btnAdd">SIMPAN</button>
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
</script>

</html>