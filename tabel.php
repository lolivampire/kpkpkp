<?php

include 'config/koneksi.php';
include 'config/library.php';
include 'config/functions.php';



$fun = new Functions;

if (isset($_POST['kelasPilih'])) {
	$pilihanKelas = $_POST['kelasPilih'];

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../style.css" />
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<title>Tabel Guru & Siswa</title>
	</head>

	<!-- table guru -->
	<table class="table bg-white rounded shadow-sm table-hover">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nama</th>
				<th scope="col">Email</th>
				<th scope="col">Password</th>
				<th scope="col">Hak Akses</th>
				<th scope="col">Date Created</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($pilihanKelas != '0') {
				$sql1 = $fun->getUserGurubyKelas($pilihanKelas);
				while ($roww = $sql1->fetch_assoc()) {
			?>
					<tr>
						<th scope="row"> <?= $roww["ID"]; ?> </th>
						<td> <?= $roww["nama"]; ?> </td>
						<td> <?= $roww["email"]; ?> </td>
						<td> <?= $roww["Pass"]; ?> </td>
						<td> <?php if ($roww["hak_akses"] == 2) {
									echo "Guru";
								}; ?> </td>
						<td> <?= $roww["date_created"]; ?> </td>
						<td>
							<!-- Button trigger modal -->
							<a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Rincian
							</a>
							<!-- a trigger modal edit data -->
							<a class="btn btn-info" href="update-data.php?id=<?= $roww["ID"]; ?>">
								Edit
							</a>
							<a href="#" class="btn btn-danger">Hapus</a>
						<td>
					</tr>
				<?php
				}
			} else {
				$sql1 = $fun->getUserGuru();
				while ($roww = $sql1->fetch_assoc()) {
				?>
					<tr>
						<th scope="row"> <?= $roww["ID"]; ?> </th>
						<td> <?= $roww["nama"]; ?> </td>
						<td> <?= $roww["email"]; ?> </td>
						<td> <?= $roww["Pass"]; ?> </td>
						<td> <?php if ($roww["hak_akses"] == 2) {
									echo "Guru";
								}; ?> </td>
						<td> <?= $roww["date_created"]; ?> </td>
						<td>
							<!-- Button trigger modal -->
							<a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Rincian
							</a>
							<!-- a trigger modal edit data -->
							<a class="btn btn-info" href="update-data.php?id=<?= $roww["ID"]; ?>">
								Edit
							</a>
							<a href="#" class="btn btn-danger">Hapus</a>
						<td>
					</tr>
			<?php
				}
			}
			?>
		</tbody>
	</table>



	<!-- ================================================================ TABEL SISWA ===================================================================-->

<?php }

if (isset($_POST['SiswakelasPilih'])) {
	$pilihKelasSiswa = $_POST['SiswakelasPilih'];

?>

	<head>
		<link rel="stylesheet" href="../style.css" />
	</head>

	<!-- table siswa -->
	<table class="table bg-white rounded shadow-sm table-hover">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nama</th>
				<th scope="col">Email</th>
				<th scope="col">Password</th>
				<th scope="col">Hak Akses</th>
				<th scope="col">Date Created</th>
				<th scope="col">Action</th>
			</tr>
		</thead>

		<?php
		if ($pilihKelasSiswa != '0') {

			$sql1 = $fun->getSiswaKelas($pilihKelasSiswa);
			while ($roww = $sql1->fetch_assoc()) {
		?>

				<tr>
					<th scope="row"> <?= $roww["ID"]; ?> </th>
					<td> <?= $roww["nama"]; ?> </td>
					<td> <?= $roww["email"]; ?> </td>
					<td> <?= $roww["Pass"]; ?> </td>
					<td> <?php if ($roww["hak_akses"] == 3) {
								echo "Siswa";
							}; ?> </td>
					<td> <?= $roww["date_created"]; ?> </td>
					<td>
						<a href="#" class="btn btn-warning">Rincian</a>
						<a href="#" class="btn btn-primary">Edit</a>
						<a href="#" class="btn btn-danger">Hapus</a>
					<td>
				</tr>
			<?php
			}
		} else {
			$sql1 = $fun->getUserSiswa();
			while ($roww = $sql1->fetch_assoc()) {
			?>
				<tr>
					<th scope="row"> <?= $roww["ID"]; ?> </th>
					<td> <?= $roww["nama"]; ?> </td>
					<td> <?= $roww["email"]; ?> </td>
					<td> <?= $roww["Pass"]; ?> </td>
					<td> <?php if ($roww["hak_akses"] == 3) {
								echo "Siswa";
							}; ?> </td>
					<td> <?= $roww["date_created"]; ?> </td>
					<td>
						<a href="#" class="btn btn-warning">Rincian</a>
						<a href="#" class="btn btn-primary">Edit</a>
						<a href="#" class="btn btn-danger">Hapus</a>
					<td>
				</tr>
		<?php
			}
		}
		?>

	</table>

<?php
}
?>

	</html>