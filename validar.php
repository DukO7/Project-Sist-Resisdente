<?php 
$user2="usuario2";
$pass2="pass2";
$user1="usuario1";
$pass1="pass1";

$user=$_POST["user"];
$pass=$_POST["pass"];
if ($user===$user1 && $pass===$pass1 ) {
	session_start();
	$_SESSION["user"] = $user;
	header("location:ModuloP11.php");
}
if ($user===$user2 && $pass===$pass2) {
	session_start();
	$_SESSION["user"] = $user;
	header("location:ModuloP2.php");
}else{
echo "<script>alert('Error al Iniciar Sesion')";
}


 ?>