<?php

#banco de dados
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "estacionamento-sam";

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn -> connect_error){
	echo "Erro na conexão: " . mysqli_error($conn);
}

mysqli_select_db($conn, $dbname);

$username = $_POST["user"];
$password = $_POST["pass"];

$sql = "SELECT * FROM membro WHERE usuario='$username' AND senha='$password'";

$result = $conn -> query($sql);

if ($result -> num_rows <= 0){
	echo "<script language='javascript' type='text/javascript'>alert('Usuário e/ou senha incorretos.');window.loaction.href='../admin.html';</script>";
	die();
} else {
	setcookie("username", $username);
	header("Location:index.php");
}


?>
