
<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '30122002');
define('DB', 'projetor');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

?>