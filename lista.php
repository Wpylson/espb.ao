<?php
include_once("class/crud.php");
$crud = new Crud();

//Apagar dado
if (isset($_GET['apagarid']) && !empty($_GET['apagarid'])) {
    $apagarId = $_GET['apagarid'];
    $crud->apagarDado($apagarId);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/alerta.css">
    <title>Index</title>
</head>

<body>
    <div class="topnav">
        <ul>
            <li><a class="active" href="lista.php">Home</a></li>
            <li><a href="add.php">Adicionar</a></li>
            <li><a href="#">Utilizadores</a></li>
            <li style="float:right"><a href="#about">Sobre</a></li>
        </ul>
    </div>
    <div class="content">
        <table id="projectos">
            <h2>Lista de Dados</h2>
            <?php
            if (isset($_GET['msg1']) == "inserir") { ?>
                <div class="alerta ">
                    <span class="btnFechar" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Registado</strong> Dado inserido com sucesso.
                </div>
            <?php  }
            if (isset($_GET['msg2']) == "editar") {
                ?>
                <div class="alerta ">
                    <span class="btnFechar" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Editar!</strong> Dado editado com sucesso.
                </div>
            <?php
            }
            if (isset($_GET['msg3']) == "apagar") { ?>
                <div class="alerta ">
                    <span class="btnFechar" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Apagar!</strong> Dado apagado com sucesso.
                </div>
            <?php
            }

            ?>
            <tr>
                <th style="width: 50px;">Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Accoes</th>
            </tr>
            <?php
            $dados = $crud->listarTodosDados();
            foreach ($dados as $dado) {
            ?>
                <tr>
                    <td><?php echo $dado['id']; ?> </td>
                    <td><?php echo $dado['name']; ?></td>
                    <td><?php echo $dado['email']; ?></td>
                    <td><?php echo $dado['phone']; ?></td>
                    <td><a href="editar.php?editarid=<?php echo $dado['id']; ?>">Editar</a>
                        |
                        <a href="lista.php?apagarid=<?php echo $dado['id']; ?>" onclick="confirm('Tens a certeza que pretendes apagar esse dado?')">Apagar</a>
                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
    <div class="footer">
        <p>Copyright &copy; 2022</p>
    </div>
</body>

</html>