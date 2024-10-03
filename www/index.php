<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("bd.php");
	require_once 'bdUsuarios.php';

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  $mysqli = conectarBD();

  session_start();
	$user = [];

	if (isset($_SESSION['nickUsuario'])) {
		$user = getUser($_SESSION['nickUsuario']);
	}

  $actividades = getActividadesIndex($mysqli);
  $info = getInfoIndex($mysqli);
	
	echo $twig->render('index.html', ['actividades'=> $actividades, 'info' => $info, 'infoUser' => $user]);
?>
