<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "estacionamento-sam";

$nome = $_POST['nome'];
$rg = $_POST['rg'];
$endereco = $_POST['endereco'];

$veiculo_modelo = $_POST['modelo'];
$veiculo_marca = $_POST['marca'];
$veiculo_placa = $_POST['placa'];

date_default_timezone_set('America/Sao_Paulo');

$hora_entrada = date('Y-m-d H:i:s');

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn -> connect_error){
	echo "Erro!";
}

/*
CREATE TABLE proprietario (proprietario_id int auto_increment PRIMARY KEY, nome varchar(60) NOT NULL, rg varchar(13) NOT NULL, endereco varchar(180) NOT NULL);

CREATE TABLE veiculo (veiculo_id int NOT NULL AUTO_INCREMENT, proprietario_id int, veiculo_proprietario varchar(180) NOT NULL, modelo varchar(100) NOT NULL, marca varchar(100) NOT NULL, placa varchar(8) NOT NULL, data datetime, PRIMARY KEY (veiculo_id), FOREIGN KEY (proprietario_id) REFERENCES proprietario(proprietario_id));
*/

$proprietario_sql = "INSERT INTO proprietario (nome, rg, endereco) VALUES('$nome', '$rg', '$endereco')";

$veiculo_sql = "INSERT INTO veiculo (veiculo_proprietario, modelo, marca, placa, data) VALUES('$nome', '$veiculo_modelo', '$veiculo_marca', '$veiculo_placa', '$hora_entrada')";

if (($conn->query($proprietario_sql)=== true) and ($conn->query($veiculo_sql) === true)){
	echo "Sucesso ao cadastrar.";
} else {
	echo "Erro ao cadastrar: " . mysqli_error($conn);
}

$conn -> close();

?>
