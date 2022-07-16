<?php
session_start();
include_once "config/koneksi.php";

// echo $_SESSION['idu'];
// echo "+";
// echo $_SESSION['role'];


// cek login
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
// cek hak akses user yang login
if ($_SESSION['role'] == 1) {
    //set session admin
    $_SESSION["login-admin"] = true;
    header("location: user-admin/dashboard-admin.php");
} else if ($_SESSION['role'] == 2) {
    $_SESSION["login-guru"] = true;
    header("location: user-guru/dashboard.php");
} else {
    echo "login sebagai siswa";
}
