<?php

	require_once "../config/functions.php";
	$fun = new Functions();

	if (isset($_POST['simpanUser'])) {
		if ($_POST['simpanUser'] == 'add') {
			$id = $_POST['id'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
			$role = $_POST['role'];
			if ($role == 1) {
				$result = $fun->simpanUser($id,$pass,$email,$role);
				if ($result) {
					echo "success";
				}
			}
		}
	}

?>