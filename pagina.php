<?php
include('conexao.php');
include('verificar_login.php');



// ------------------------  função selecionar projetor  -----------------------------------------|//
$numero_projetor=0;
if(isset($_POST['reservar'])){
      $idmatricula = mysqli_real_escape_string($conexao, $_POST['idmatricula']);
      $numero_projetor = mysqli_real_escape_string($conexao,$_POST['numero_projetor']);

      $sql_code = "SELECT p.numero_projetor FROM projetor p WHERE ativo = 0;";
      $sql_query = $conexao->query($sql_code); 
      $quantidade = $sql_query->num_rows;
    

      if($quantidade == 1) {
          
          $projetor = $sql_query->fetch_assoc();}}
      
          
// -----------------------------------------------------------------------------------------------|--//

  
// -----------------------------  função cancelar reserva  -------------------------------------//
if(isset($_POST['cancelar'])){
  $projetor_R = mysqli_real_escape_string($conexao,$_POST['projetor_R']);

  $sql_code = "SELECT p.numero_projetor FROM projetor p WHERE ativo = 1 ;";
  $sql_query = $conexao->query($sql_code); 
  $quantidade = $sql_query->num_rows;

  if($quantidade == 0) {
      
      $projetor = $sql_query->fetch_assoc();}}

// ------------------------------------------------------------------//
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "./css/bootstrap.css">

    <title>formulario</title>
<!----------------------------------------- estilização ---------------------------->
    <style>
        #estilo{
            margin-top: 10%;
            display: flex;
            padding-left:10%;
            padding-right: 10%;
            margin-left: 8%;
            margin-right: 8%;
            padding-bottom: 100px;
            background-color: rgba(101, 120, 141, 0.688);
            color:rgb(1, 0, 0);
            
           }#hora{
             color:aliceblue;
           }#but{
            text-decoration: none;
            color:aliceblue ;
            
          }  /*cores da barra/cabecalho*/  
        #nav{
            background-color: beige;
            padding-top: 2px;
            padding-bottom: -200px;
            list-style-type: none;
            margin: 1;
            padding: 1;
            overflow: hidden;
            background-color: rgba(26, 15, 4, 0.774);
            border-radius: 1px;
            padding: 10px;
            margin-right: 1px;
            margin-left: 1px;
            font-size: 15px;

          }li {
            float: left;
            
          }li a {
            display: block;
            color: white;
            text-align: left;
            padding: 24px 16px;
            text-decoration: none;
            border-radius: 10px;
          }li a:hover{
            background-color: rgba(8, 6, 4, 0.900);
            color:brown;
          }#sobre{
            margin-left: 85%;
            color:brown;
          }body{
          background-image: url('./fu.png');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;

          }
        </style>
<!---------------------------------------------------------------------------------->
</head>
<body>
<!----------------------------------- BARRA DE NAVEGAÇÃO --------------------------->
<nav> 
  <div id="nav">
      <img id="logo" src="./logo.png"  align="left" width="60">
    
  
      <li id="sobre">
        <a href="logout.php">
            SAIR
        </a>
      </li>
     
    
  </div>
  </nav>
 
<!--------------------------------------------------------------------------------->


<!------------------------------- FORMULARIO -------------------------------------->
<form class="row g-3 "  id="estilo" method="POST" action="pagina.php" required>
 

 
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">DIGITE SEU NOME 
    </label>
    <input type="text" name="idmatricula" class="form-control" id="validationCustom03" placeholder="digite sua matricula" required>
  </div>
  

  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">NUMERO DO PROJETOR</label>
    <select class="form-select" id="validationCustom04" name="numero_projetor" required>
   <option selected disabled value="">NUMERO PROJETOR...</option>
   <!------------------ função de busca de numero de projetores disponiveis ---------------->
  <?php
    
    $consulta =  "SELECT p.numero_projetor FROM projetor p WHERE ativo = 0 ;"; 
    $con = $conexao->query($consulta) or die($conexao->error);
    ?> 
    <?php while($dado = $con->fetch_array()) { ?> 
        <tr>
          <option><?php echo $dado['numero_projetor']; ?></option>
         </tr> 
    <?php } ?>
  <!------------------------------------------------------------------------------------> 
    </select>
    <br>
  </div>
  
  <div class="col-12">
    <input type="submit" name="reservar" class="btn btn-primary" value="Fazer Reserva" readonly>

<!----------------------------- função para selecionar projetor e fazer a reserva----------->
    <?php
    $numero_projetor=$_POST['numero_projetor'];
    $consulta =  "UPDATE projetor SET ativo = 1 WHERE idprojetor = $numero_projetor ;"; 
    if($con = $conexao->query($consulta)){ 
    header('location:logout.php');
    }else($conexao->error);

    ?> 
  </div>
  </form>
  <hr>
<br>
<form class="row g-3" novalidate  id="estilo" method="POST" action="pagina.php" >
    <div class="col-md-3">
    <label for="validationCustom04" class="form-label"> PROJETOR  RESERVADO</label>
    <select class="form-select" id="validationCustom04" name="projetor_R" required>
   <option selected disabled value="">NUMERO PROJETOR...</option>
   <!------------------ função de busca de numero de projetores RESERVADOS ---------------->
  <?php
    $consul =  "SELECT p.numero_projetor FROM projetor p WHERE ativo = 1;"; 
    $com = $conexao->query($consul) or die($conexao->error);
    ?> 
    <?php while($do = $com->fetch_array()) { ?> 
        <tr>
          <option><?php echo $do['numero_projetor']; ?></option>
         </tr> 
    <?php } ?>
  <!------------------------------------------------------------------------------------>
   
    </select>
      <!------------------------------ FUNÇÃO PARA CANCELAR RESERVA---------------------------------------------->
  <div>
   
    <div class="col-12">
      <input type="submit" name="cancelar" class="btn btn-primary" value="cancelar Reserva" readonly>
      <?php
      
      $consult =  "UPDATE projetor SET ativo = 0 WHERE idprojetor = $projetor_R ;"; 
      $com = $conexao->query($consult) or die($conexao->error); 
      ?>
    </div>
</form>

<!------------------------------------------------------------------------------------------------>

    
</body>
</html>