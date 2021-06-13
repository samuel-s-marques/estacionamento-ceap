<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "estacionamento-sam";

$nome = $_POST['nome'];
$propr_id = $_POST['propr_id'];
$rg = $_POST['rg'];
$endereco = $_POST['endereco'];

$veiculo_modelo = $_POST['modelo'];
$veiculo_marca = $_POST['marca'];
$veiculo_placa = $_POST['placa'];

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn -> connect_error){
	echo "Erro!";
}

/*
CREATE TABLE proprietario (proprietario_id int auto_increment PRIMARY KEY, nome varchar(60) NOT NULL, rg varchar(13) NOT NULL, endereco varchar(180) NOT NULL);

CREATE TABLE veiculo (veiculo_id int NOT NULL AUTO_INCREMENT, proprietario_id int, veiculo_proprietario varchar(180) NOT NULL, modelo varchar(100) NOT NULL, marca varchar(100) NOT NULL, placa varchar(8) NOT NULL, data datetime, PRIMARY KEY (veiculo_id), FOREIGN KEY (proprietario_id) REFERENCES proprietario(proprietario_id));
*/

$proprietario_sql = "UPDATE proprietario SET nome='$nome', rg='$rg', endereco='$endereco' WHERE proprietario_id=$propr_id";

$veiculo_sql = "UPDATE veiculo SET veiculo_proprietario='$nome', modelo='$veiculo_modelo', marca='$veiculo_marca', placa='$veiculo_marca'";

if (($conn->query($proprietario_sql)=== true) and ($conn->query($veiculo_sql) === true)){
	echo "Sucesso ao editar.";
} else {
	echo "Erro ao editar: " . mysqli_error($conn);
}

$conn -> close();

?>
