<?php 
function bejelentkezes($user, $pass){
	$link = @mysqli_connect('localhost', 'root', '', 'user'); 
	$querry='SELECT Username, Password FROM `testuser` WHERE `Username` LIKE "'.$user.'" AND `Password` LIKE "'.$pass.'"';
	$result = mysqli_query($link, $querry);
		if(mysqli_num_rows($result)==1){ 
			return true;
			return $user;
		} else {
			return false;
		}
		
mysqli_close($link);
}
function bejelentkezes2($user){
	$link = @mysqli_connect('localhost', 'root', '', 'user'); 
	$querry='SELECT Username, Password FROM `testuser` WHERE `Username` LIKE "'.$user.'"';
	$result = mysqli_query($link, $querry);
		if(mysqli_num_rows($result)==1){ 
			return true;  
		} 
		else { 
			return false; 
		}
mysqli_close($link);
}

function regisztracio($user, $pass) {
	if (!bejelentkezes2($user)) {
		$conn = @mysqli_connect('localhost', 'root', '', 'user');
		$query = 'INSERT INTO `testuser` SET Username="'.$user.'", Password="'.$pass.'" ';
		$result = mysqli_query($conn, $query);
	mysqli_close($conn);
	}
}


function torles1($torlendo) {
$conn = @mysqli_connect('localhost', 'root', '', 'user');
$query = 'DELETE FROM `testuser` WHERE  Username="'.$torlendo.'"';
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==1){ 
	echo 'Felhasználó törölve'; 
	 } else { 
	 	echo 'Nem sikerült törölni.'; 
	 }
mysqli_close($conn);
}
function komment($user, $comment, $dateto) {
	
		$conn = @mysqli_connect('localhost', 'root', '', 'user');
		$query = 'INSERT INTO `comment` SET Username="'.$user.'", Comment="'.$comment.'", Datewr="'.$dateto.'" ';
		$result = mysqli_query($conn, $query);
		mysqli_close($conn);
	}

function torles ($username){
$conn = @mysqli_connect('localhost', 'root', '', 'user');
$query = 'DELETE FROM `comment` WHERE  Username="'.$username.'"';
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){ 
	header('Location:adatlap.php');
	exit();  
} else { 
	echo 'Hiba történt!'; 
}
mysqli_close($conn);
}
?>