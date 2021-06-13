<?php

$login_cookie = $_COOKIE['username'];

if (isset($login_cookie)){
	unset($login_cookie);
} else {
	return false;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="0; ../index.php">
</head>
<body>

</body>
</html>
