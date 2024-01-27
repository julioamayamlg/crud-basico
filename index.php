<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
        }
    </style>
</head>
<body>
    <?php
    $conexion = mysqli_connect("db", "root", "test", "Fotos");
    if(!isset($_POST['accion'])){
        $_POST['accion'] = "";
    }
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['accion']== "eliminar"){
        $borra = "DELETE FROM Foto WHERE idFoto=" . $_POST['idFoto'] . "";
        mysqli_query($conexion, $borra);
        }
        if($_POST['accion']== "insertar"){
        $inserta = "INSERT INTO Foto VALUES (". $_POST['idFoto'] . ",'" . $_POST['urlFoto'] . "','" . $_POST['desFoto'] . "'," . $_POST['idAutor'] . "," . $_POST['idAlbum'] .")";
        mysqli_query($conexion, $inserta);
        }
        if($_POST['accion']== "modificar"){
        $modifica = "UPDATE Foto SET idFoto=\"$_POST[idFoto]\", urlFoto=\"$_POST[urlFoto]\" , desFoto=\"$_POST[desFoto]\" , idAutor=\"$_POST[idAutor]\" WHERE idFoto=\"$_POST[idAntiguo]\"";
        mysqli_query($conexion, $modifica);
        }
    }
    $consultaFoto = mysqli_query($conexion, "SELECT * FROM Foto");
    ?>
    <div class="container">
    <h1 class="text-center">Fotos</h1>

    <table class="table table-striped" style="border:1px solid #888">
        <tr>
            <th>id</th>
            <th>Url</th>
            <th>Descripción</th>
            <th>idAutor</th>
            <th>idAlbum</th>
            <th><i class="bi bi-trash"></i></th>
            <th><i class="bi bi-pencil"></i></th>
        </tr>
        <?php
        while($registro = mysqli_fetch_array($consultaFoto)){
        ?>
        <tr>
        <td><?= $registro['idFoto']?></td>
        <td><a href="<?= $registro['urlFoto']?>" target="_blank"><?= $registro['urlFoto']?></a></td>
        <td><?= $registro['desFoto']?></td>
        <td><?= $registro['idAutor']?></td>
        <td><?= $registro['idAlbum']?></td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="idFoto" value="<?= $registro['idFoto']?>">
                <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i>Eliminar</button>
            </form>
        </td>
        <td>
            <form action="modifica-foto.php" method="post">
                <input type="hidden" name="idFoto" value="<?= $registro['idFoto']?>">
                <input type="hidden" name="urlFoto" value="<?= $registro['urlFoto']?>">
                <input type="hidden" name="desFoto" value="<?= $registro['desFoto']?>">
                <input type="hidden" name="idAutor" value="<?= $registro['idAutor']?>">
                <input type="hidden" name="idAlbum" value="<?= $registro['idAlbum']?>">
                <button type="submit" class="btn btn-primary" ><i class="bi bi-pencil"></i>Modificar</button>
            </form>
        </td>
        </tr>
        <?php
        }
        ?>
        <form action="index.php" method="post">
        <tr>
            <td><input type="number" size="10" name="idFoto"></td>
            <td><input type="text" required name="urlFoto"></td>
            <td><input type="text" required name="desFoto"></td>
            <td><input type="number" size="10" min="1" name="idAutor"></td>
            <td><input type="number" size="10" min="1" name="idAlbum"></td>
            <td><input type="hidden" name="accion" value="insertar">
                <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i>Añadir</button></td>
        <td></td>
        </tr>
    </form>
    </table>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>