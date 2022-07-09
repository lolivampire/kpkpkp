<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<style>
			.modalBackground {
    background-color:white;
    filter:alpha(opacity=100);
    opacity:7;
}
.modalPopup {
    background-color:#ffffdd;
    border-width:3px;
    border-style:solid;
    border-color:Gray;
    padding:3px;
    width:250px;
}
		</style>
	</head>
	<body>
<?php

include 'config/koneksi.php';
include 'config/library.php';
include 'config/functions.php';



$fun = new Functions;

if (isset($_POST['kelasPilih'])) {
	$pilihanKelas = $_POST['kelasPilih'];

?>
	

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
							<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Rincian
							</button>
							<!-- Button trigger modal edit data -->
							<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editDataGuru" id="btnUpdateData">
								Edit
							</button>
							<a href="#" class="btn btn-danger" id="btnHapusData">Hapus</a>
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
							<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Rincian
							</button>
							<!-- Button trigger modal edit data -->
							<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editDataGuru" id="btnUpdateData">
								Edit
							</button>
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
<!-- modal edit data -->
	<!-- Modal -->
	<div class="modal fade modalBackground" id="editDataGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">ID User</span>
							<input type="text" class="form-control" placeholder=" Masukkan ID User" aria-label="ID User" aria-describedby="basic-addon1" id="idUser">
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">Password</span>
							<input type="text" class="form-control" placeholder=" Masukkan Password" aria-label="Password" aria-describedby="basic-addon1" id="pass">
						</div>

						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Masukkan Email" aria-label="Email" aria-describedby="basic-addon2" id="email">
							<span class="input-group-text" id="basic-addon2">@gmail.com</span>
						</div>

						<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="role" disabled>
							<option selected value="0">Role</option>
							<option value="1">Admin</option>
							<option value="2">Guru</option>
							<option value="3">Siswa</option>
						</select>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">NAMA LENGKAP</span>
							<input type="text" class="form-control" placeholder=" Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon1" id="namalengkap">
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">Tanggal Lahir</span>
							<input type="date" name="admission_date" id="tgl_lahir" class="form-control">
						</div>
						<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="jeniskelamin">
							<option selected value="0">Jenis Kelamin</option>
							<option value="1">Laki-laki</option>
							<option value="2">Perempuan</option>
						</select>
						<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="kelas">
							<option selected value="0">Kelas</option>
							<?php
							$result = $fun->getKelas();
							while ($row = $result->fetch_assoc()) { ?>
								<option value="<?php echo $row['id_kelas'] ?>"> <?php echo $row['nama'] ?> </option>
							<?php } ?>
						</select>
						<div class="input-group mb-3" id="absen">
							<span class="input-group-text" id="basic-addon1">Absen</span>
							<input type="number" class="form-control" placeholder=" Masukkan Absen" aria-label="Absen" aria-describedby="basic-addon1" id="absenSiswa">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" id="btn_update_data">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Modal -->
	<!-- end of modal edit data -->
</body>

	</html>