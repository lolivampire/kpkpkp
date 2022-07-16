<?php

include_once "config/koneksi.php";
include_once "config/library.php";
require_once "config/functions.php";
require_once "config/functions2.php";

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $cek = mysqli_query($conn, "SELECT * FROM user_sistem WHERE id_user = '$username'");

  if (mysqli_num_rows($cek) === 1) {

    $row = mysqli_fetch_assoc($cek);

    if ($password == $row["password"]) {
      header("Location: index.php");
      exit;
    }
  }
}



?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-login container">\

  <div class="dash">
    <div class="dashtop">
      <p>SISTEM INFORMASI PENGOLAHAN NILAI<br>SD MUHAMMADIYAH 1 TEMANGGGUNG</p>
    </div>
    <div class="dashbot">
      <h1 class="jud">Masuk Sekarang!</h1>
      <form method="post">
        <div class="mb-3 email-input">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Masukkan username dengan benar, perhatikan besar kecilnya huruf.</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label margin-top-sm">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <!-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div> -->
        <button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
      </form>
    </div>
  </div>
</body>

</html>