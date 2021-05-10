<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<title>Regisztráció</title>
	<?php
include('fuggvenyek.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];
	regisztracio($user, $pass);
	if (!bejelentkezes2($user)==true) {
		echo "Sikertelen regisztráció";
	} else {
		echo "Sikeres regisztráció";
	}
}

if (isset($_POST['vissza'])) {
	header("Location:kezdo.php");
  exit();
}
?>
</head>
<body>
	<form action="regisztracio.php" method="POST">
		<input type="text" name="username" placeholder="Felhasználónév" aria-label="Felhasználónév">
		<input type="text" name="password" placeholder="Jelszó" aria-label="Jelszó">
		<input type="submit" value="Regisztráció">
	</form>
	<form action="regisztracio.php" method="POST">
		 <input type="submit" name="vissza" value="Vissza">
	</form>
</body>
</html>
