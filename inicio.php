<?php
session_start();
?>
<!----------------------------------------------------------->
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <link rel="stylesheet" href= "./css/bootstrap.css">
    <meta name="generator" content="Hugo 0.98.0">
    <title>site reserva data show</title>

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="signin.css" >
  </head>

  
  <body class="text-center">
   
    
<main class="form-signin w-100 m-auto">
  <form action="login.php" method="POST">
    <img class="mb-4" src="./logo.png" alt="" width="80" >
    <h1 class="h3 mb-3 fw-normal">FAÇA SUA RESERVA</h1>
<!------------ MSG ERRO -------------->
<?php
  if(isset($_SESSION['nao_autenticado'])):
  ?>
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      Erro! nome ou senha incorretos
    </div>
  </div>
  <?php
  endif;
  unset($_SESSION['nao_autenticado']);
?>
<!------------------------------------>
     
    <div class="form-floating">
      <input type="text" name="usuario" class="form-control" id="floatingInput" required>
     <label for="floatingInput">nome</label>
    </div>
    <div class=" col-auto">
    <label for="inputPassword2" class="visually-hidden">senha</label>
      <input type="password" name="senha" class="form-control" id="inputPassword2" placeholder="senha"  required>
     
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit"> Confirmar  </button>
   
   
    <p class="mt-5 mb-3 text-muted"> @ifpCorrente-2022</p>
  </form>
</main>


    
  </body>
</html>

