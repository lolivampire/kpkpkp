<?php
session_start();
include_once "config/koneksi.php";

// echo $_SESSION['idu'];
// echo "+";
// echo $_SESSION['role'];


// cek login
if (!isset($_SESSION["login"])) {
    header("Location : login.php");
}
// cek hak akses user yang login
if ($_SESSION['role'] == 1) {
    $_SESSION["login-admin"] = true;
    header("Location : /user-admin/dashboard-admin.php");
} else {
    $_SESSION["login-guru"] = true;
    header("Location : /user-guru/dashboard.php");
}
