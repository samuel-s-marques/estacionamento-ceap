<?php  

error_reporting(E_ERROR);

$login_cookie = $_COOKIE['username'];

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CEAP | Perfil</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/perfil.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style type="text/css">
	html, body {
		height: 100%;
	}

	body {
		display: -ms-flexbox;
		display: -webkit-box;
		display: flex;

		-ms-flex-align: center;
		-ms-flex-pack: center;
		-webkit-box-align: center;
		-webkit-box-pack: center;

		align-items: center;
		justify-content: center;

		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #f5f5f5;
	}

	img {
		user-drag: none; 
		user-select: none;
		-moz-user-select: none;
		-webkit-user-drag: none;
		-webkit-user-select: none;
		-ms-user-select: none;
		border-radius: 40%;
	}

	.form-logout {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
	}
</style>

<body>
	<div class="form-logout">

	<?php
		if (isset($login_cookie)){
			echo '		<div class="form-group">
			<center>
				<img class="mb-4" src="../public/imgs/profile.png" alt="perfil" width="150" height="140">
				<h2 class="h3 mb-3 font-weight-normal">Bem-vindo, ' . $login_cookie . '</h2>
			</center>

			<div class="form-label-group">
				<span>IP: ' . getUserIpAddr() . '</span>
				<br><br>
			</div>

			<a href="../admin.html"><button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Logout</button></a>
			<br>
			<a href="../index.php"><button class="btn btn-lg btn-primary btn-block text-uppercase">Retornar</button></a>';
		} else {
			echo '		<div class="form-group">
			<center>
				<img class="mb-4" src="../public/imgs/profile.png" alt="perfil" width="150" height="140">
				<h2 class="h3 mb-3 font-weight-normal">Bem-vindo(a), convidado(a)</h2>
			</center>

			<br><br>

			<a href="../admin.html"><button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Login</button></a>
			<br>
			<a href="../index.php"><button class="btn btn-lg btn-primary btn-block text-uppercase">Retornar</button></a>';
		}
	?>
		
	</div>
</body>
</html>
