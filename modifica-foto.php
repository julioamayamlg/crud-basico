<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca Turing - Modifica cliente</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .mb-3{
            padding:10px 60px 10px 60px;
        }
    </style>
</head>
<body>
    <?php
     if ($_SERVER['REQUEST_METHOD']=="POST"){
    $idFoto=$_POST['idFoto'];
    $urlFoto=$_POST['urlFoto'];
    $desFoto=$_POST['desFoto'];
    $idAutor=$_POST['idAutor'];
    $idAlbum=$_POST['idAlbum'];
    }
    ?>
<div class="container">
    <div class="card">
    <h1 class="text-center">Fotos - Modifica Foto</h1>
    <br/><br/>
    <form action="index.php" method="post">
  <div class="mb-3">
    <input type="hidden" name="accion" value="modificar">
    <input type="hidden" name="idAntiguo" value="<?=$idFoto?>">
    <label for="idFoto" class="form-label">idFoto</label>
    <input required type="text" class="form-control" id="idFoto" name="idFoto" value="<?=$idFoto?>">
  </div>
  <div class="mb-3">
    <label for="urlFoto" class="form-label">Url</label>
    <input required type="text" class="form-control" id="urlFoto" name="urlFoto" value="<?=$urlFoto?>">
  </div>
  <div class="mb-3">
    <label for="desFoto" class="form-label">Descripción</label>
    <input required type="text" class="form-control" id="desFoto" name="desFoto" value="<?=$desFoto?>">
  </div>
  <div class="mb-3">
    <label for="idAutor" class="form-label">IdAutor</label>
    <input required type="number" class="form-control" min="0" id="idAutor" name="idAutor" value="<?=$idAutor?>">
    <br/>
    <button type="submit" class="btn btn-success">Aceptar</button>
    
    <button class="btn btn-danger">
    <a style="text-decoration:none;color:white;" href="index.php">Cancelar</a>
    </button>
    </div>
</form>

    </div>
</div>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>