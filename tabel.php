<?php

include 'koneksi.php';
include '../web/config/library.php';
include '../web/config/functions.php';

$fun = new Functions;

if (isset($_POST['rolePilih'])) {
	$pilihan = $_POST['rolePilih'];
	$pilihanKelas = $_POST['kelasPilih'] ?? null;
	global $conn;

?>

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
		if ($pilihan != 0) {
			if ($pilihan != 3) {
				$sql1 = mysqli_query($conn, $fun->getUserData($pilihan));
				while ($roww = mysqli_fetch_array($sql1, MYSQLI_ASSOC)) {
		?>
					<tr>
						<th scope="row"> <?= $roww["ID"]; ?> </th>
						<td> <?= $roww["nama"]; ?> </td>
						<td> <?= $roww["email"]; ?> </td>
						<td> <?= $roww["Pass"]; ?> </td>
						<td> <?php if ($roww["hak_akses"] == 1) {
									echo "Admin";
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
				if ($pilihanKelas != 0) {
					echo $pilihanKelas;
					$sql1 = mysqli_query($conn, $fun->getSiswaKelas($pilihanKelas));
					while ($roww = mysqli_fetch_array($sql1, MYSQLI_ASSOC)) {
					?>

						<tr>
							<th scope="row"> <?= $roww["ID"]; ?> </th>
							<td> <?= $roww["nama"]; ?> </td>
							<td> <?= $roww["email"]; ?> </td>
							<td> <?= $roww["Pass"]; ?> </td>
							<td> <?php if ($roww["hak_akses"] == 1) {
										echo "Admin";
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
					$sql1 = mysqli_query($conn, $fun->getUserData($pilihan));
					while ($roww = mysqli_fetch_array($sql1, MYSQLI_ASSOC)) {
					?>
						<tr>
							<th scope="row"> <?= $roww["ID"]; ?> </th>
							<td> <?= $roww["nama"]; ?> </td>
							<td> <?= $roww["email"]; ?> </td>
							<td> <?= $roww["Pass"]; ?> </td>
							<td> <?php if ($roww["hak_akses"] == 1) {
										echo "Admin";
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
			}
		} else {
			$sql1 = mysqli_query($conn, $fun->getAllUser());
			while ($roww = mysqli_fetch_array($sql1, MYSQLI_ASSOC)) {
				?>

				<tr>
					<th scope="row"> <?= $roww["ID"]; ?> </th>
					<td> <?= $roww["nama"]; ?> </td>
					<td> <?= $roww["email"]; ?> </td>
					<td> <?= $roww["Pass"]; ?> </td>
					<td> <?php if ($roww["hak_akses"] == 1) {
								echo "Admin";
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
<?php } ?>