<?php
include_once 'crud.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo CRUD</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
        <br>
        <br>
        <div id="form">
            <form action="" method="post">
                <table width="100%" border="1" cellpadding="15">
                    <tr>
                        <td>
                            <input type="number" name="anio" placeholder="Año" value="<?php if(isset($_GET['edit'])){ echo $getRow['anio'];}?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="autor" placeholder="Autor" value="<?php if(isset($_GET['edit'])){ echo $getRow['autor'];}?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="titulo" placeholder="Titulo" value="<?php if(isset($_GET['edit'])){ echo $getRow['titulo'];}?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="url" placeholder="Url" value="<?php if(isset($_GET['edit'])){ echo $getRow['url'];}?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="especialidad" placeholder="Especialidad" value="<?php if(isset($_GET['edit'])){ echo $getRow['especialidad'];}?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="editorial" placeholder="Editorial" value="<?php if(isset($_GET['edit'])){ echo $getRow['editorial'];}?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                            if(isset($_GET['edit'])){
                                ?>
                                <button type="submit" name="update">Editar</button>
                                <?php
                            }else{
                                ?>
                                <button type="submit" name="save">Registrar</button>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
            <br><br>
            <table width="100%" border="1" cellpadding="15" align="center">
                <?php
                $res=$MySQLiconn->query("SELECT * FROM biblioteca");
                while($row=$res->fetch_array()){
                    
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['anio']; ?></td>
                        <td><?php echo $row['autor']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['especialidad']; ?></td>
                        <td><?php echo $row['editorial']; ?></td>
                        <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
                        <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
                        <td><a target="_blank" href="<?php echo $row['url']; ?>" onclick="return confirm('Ir a libro')">Leer</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        </div>
    </center>
</body>
</html>