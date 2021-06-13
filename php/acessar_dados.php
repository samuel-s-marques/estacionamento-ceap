<?php

#error_reporting(E_ERROR);

#banco de dados
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "estacionamento-sam";

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn->connect_error){
	echo "Erro na conexão: " . mysqli_error($conn);
}

mysqli_select_db($conn, $dbname);

$sql = "SELECT proprietario.proprietario_id, proprietario.nome, proprietario.rg, proprietario.endereco, veiculo.modelo, veiculo.marca, veiculo.placa, veiculo.data FROM proprietario INNER JOIN veiculo ON proprietario.proprietario_id=veiculo_id";

$result = $conn -> query($sql);

$login_cookie = $_COOKIE['username'];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Dados cadastrados</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
	#perfil:hover {
		font-weight: 500;
	}

</style>

<body>
	<?php
		if (isset($login_cookie)){
				echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">

				<span class="navbar-brand">Estacionamento CEAP</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Ativar navegação">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="../index.php">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="../php/cadastrar_dados.php">Cadastrar dados</a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="../php/acessar_dados.php">Acessar dados <span class="mr-only">(atual)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="../php/atualizar_dados.php">Atualizar dados</a>
						</li>
					</ul>

				<form class="form-inline my-2 my-lg-0">
					<a id="perfil" href="perfil.php"><span class="navbar-text">Bem-vindo, ' . $login_cookie . '!</span></a>
				</form>

				</div>
			</nav>

			<div class="container">
				<br>
				<center><h2>CEAP - Tabela de dados</h2></center>
				<br>

				<table id="table0" class="table table-hover">
					<thead class="grey lighten-2">
						<tr>
							<th scope="col">#</th>
							<th scope="col">NOME</th>
							<th scope="col">RG</th>
							<th scope="col">ENDEREÇO</th>
							<th scope="col">MODELO VEÍCULO</th>
							<th scope="col">MARCA VEÍCULO</th>
							<th scope="col">PLACA VEÍCULO</th>
							<th scope="col">HORÁRIO ENTRADA</th>
						</tr>
					</thead>
					<tbody id="tbody0">';
					while($row = mysqli_fetch_array($result)){
						echo '
						<tr>
							<th scope="row" id="id_proprietario">' . $row["proprietario_id"] . '</th>' . '
							<td>' . $row["nome"] . '</td>' . '
							<td>' . $row["rg"] . '</td>' . '
							<td>' . $row["endereco"] . '</td>' . '
							<td>' . $row["modelo"] . '</td>' . '
							<td>' . $row["marca"] . '</td>' . '
							<td>' . $row["placa"] . '</td>' . '
							<td>' . $row["data"] . '</td>' . '
						</tr>
						';} echo '
					
					</tbody>
				</table>
			</div>
			<center>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_apagar">Limpar todos os dados</button>
				<a href="atualizar_dados.php"><button type="button" class="btn btn-default" id="editar_dados">Editar dados</button></a>
			</center>
			</form>
			<div class="modal fade" id="modal_apagar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<div class="modal-title">
								<h4 class="modal-title">Apagar dados</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						</div>

						<div class="modal-body">
							Deseja mesmo apagar todos os dados?
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<a href="apagar_dados.php"><button class="btn btn-danger" action="apagar_dados.php">Apagar</button></a>
						</div>
					</div>
				</div>
			</div>

			<script type="text/javascript" src="../public/js/editarlinhas.js"></script>';
		} else {
			echo '
			<script>
				window.location = "../html/error404.html";
			</script>';
			}
	?>
</body>
</html>
