<?php

include 'config/koneksi.php';
include 'config/library.php';
include 'config/functions.php';

$fun = new Functions;

if (isset($_POST['kelasPilih'])) {
	$pilihanKelas = $_POST['kelasPilih'];

?>

	<head>
		<link rel="stylesheet" href="../style.css" />
	</head>

	<table class="table bg-white rounded shadow-sm table-hover">
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
						<a href="#" class="btn btn-warning">Rincian</a>
						<a href="#" class="btn btn-primary">Edit</a>
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

<?php }

if (isset($_POST['SiswakelasPilih'])) {
	$pilihKelasSiswa = $_POST['SiswakelasPilih'];

?>

	<head>
		<link rel="stylesheet" href="../style.css" />
	</head>

	<table class="table bg-white rounded shadow-sm table-hover">
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