
<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: inicio.php');
	exit();
}
