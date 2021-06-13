<?php

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
	<title>CEAP | Edição de dados</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
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

				<li class="nav-item">
					<a class="nav-link" href="../php/acessar_dados.php">Acessar dados</a>
				</li>

				<li class="nav-item active">	
					<a class="nav-link" href="../php/atualizar_dados.php">Atualizar dados<span class="mr-only">(atual)</span></a>
				</li>
			</ul>
				<form class="form-inline my-2 my-lg-0">
					<a id="perfil" href="perfil.php"><span class="navbar-text">Bem-vindo, ' . $login_cookie . '!</span></a>
				</form>
		</div>
	</nav>

		<div class="container">
			<iframe name="enviar_form" style="width: 0; height: 0; border: 0; border: none; visibility: hidden;"></iframe>
			<h2>Dados do proprietário</h2>
			<br>

			<form method="post" action="../php/atualiza.php" class="was-validated" target="enviar_form">
				<div class="form-row">
					<div class="col-md-8">
						<label for="nome">Nome:</label>
						<input type="text" class="form-control" id="nome" placeholder="Nome do proprietário do veículo" name="nome" required>
						<div class="invalid-feedback">* é necessário inserir o nome do proprietário do veículo.</div>
					</div>

					<div class="col-md-4">
						<label for="propr_id">ID:</label>
						<input type="text" class="form-control" id="propr_id" placeholder="Código de identificação do dado" name="propr_id" required>
						<div class="invalid-feedback">* é necessário inserir o código de identificação do dado.</div>
					</div>
				</div>

				<div class="form-group">
					<label for="rg">RG:</label>
					<input type="text" class="form-control" id="rg" placeholder="xx.xxx.xxx-x" name="rg" required maxlength="12" onkeypress="formatar(\'##.###.###-#\', this)">
					<div class="invalid-feedback">* é necessário inserir o RG do proprietário.</div>
				</div>

				<div class="form-group">
					<label for="endereco">Endereço</label>
					<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua do proprietário" required>
					<div class="invalid-feedback">* é necessário inserir o endereço.</div>
				</div>

				<h2>Dados do veículo</h2>
				<div class="form-group">
					<label for="modelo">Modelo</label>
					<input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo do veículo" required>
					<div class="invalid-feedback">* é necessário inserir o modelo do veículo.</div>
				</div>

				<div class="form-group">
					<label for="marca">Marca:</label>
					<input type="text" class="form-control" name="marca" id="marca" placeholder="Marca do veículo" required>
					<div class="invalid-feedback">* é necessário inserir a marca do veículo.</div>
				</div>

				<div class="form-group">
					<label for="placa">Placa:</label>
					<input type="text" class="form-control" name="placa" id="placa" placeholder="xxx-XXXX" required maxlength="8" onKeyPress="formatar(\'###-####\', this)">
					<div class="invalid-feedback">* é necessário inserir a placa do veículo.</div>
				</div>

				<center>
					<button type="submit" class="btn btn-primary" onclick="document.getElementById(\'notif\').innerHTML = \'Os dados foram atualizados\'">Atualizar dados</button>
					<br>
					<div id="notif"></div>
				</center>
			</form>
	</div>';
		} else {
			echo '
			<script>
				window.location = "../html/error404.html";
			</script>';
			}
	?>

<script src="../public/js/format.js"></script>
<script src="../public/js/notificacao.js"></script>
</body>
</html>
