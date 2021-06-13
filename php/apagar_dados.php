<?php

#banco de dados
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "estacionamento-sam";

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn -> connect_error){
	echo "Erro na conexão";
}

mysqli_select_db($conn, $dbname);

$sql = "DELETE FROM proprietario";
$sql1 = "DELETE FROM veiculo";
$sql2 = "ALTER TABLE proprietario AUTO_INCREMENT = 0";
$sql3 = "ALTER TABLE veiculo AUTO_INCREMENT = 0";

$result = $conn -> query($sql);
$result0 = $conn -> query($sql1);
$result1 = $conn -> query($sql2);
$result2 = $conn -> query($sql3);

/*
if (($result === true) and ($result0 === true)){
	echo "Deletado com sucesso";

	$criar_tabela_1 = "CREATE TABLE proprietario (proprietario_id int auto_increment PRIMARY KEY, nome varchar(60) NOT NULL, rg varchar(13) NOT NULL, endereco varchar(180) NOT NULL)";

	$criar_tabela_2 = "CREATE TABLE veiculo (veiculo_id int NOT NULL AUTO_INCREMENT, proprietarios_id int, veiculo_proprietario varchar(180) NOT NULL, modelo varchar(100) NOT NULL, marca varchar(100) NOT NULL, placa varchar(8) NOT NULL, PRIMARY KEY (veiculo_id), FOREIGN KEY (proprietarios_id) REFERENCES proprietario(proprietario_id))";

	$result1 = $conn -> query($criar_tabela_1);

	if (!$result1){
		echo "Erro ao criar tabela: " . mysqli_error($result2);
	}

	$result2 = $conn -> query($criar_tabela_2);

	if (!$result2){
		echo "Erro ao criar tabela: " . mysqli_error($result2);
	}
	echo "Tabela um criada com sucesso.";
}
*/

$conn -> close();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="0; acessar_dados.php">
</head>
<body>

</body>
</html>
