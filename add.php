<?php
include_once("class/crud.php");
$crud = new Crud();
if (isset($_POST['submit'])) {
    $crud->inserirDados($_POST);
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
    <link rel="stylesheet" href="css/form.css">
    <title>Add</title>
</head>

<body>
    <div class="topnav">
        <ul>
            <li><a href="lista.php">Home</a></li>
            <li><a href="add.php" class="active">Adicionar</a></li>
            <li><a href="#">Utilizadores</a></li>
            <li style="float:right"><a href="#about">Sobre</a></li>

        </ul>
    </div>
    <div class="content">
        <h2>Adicionar dados</h2>
       
        <div id="form">
            <form method="POST" name="form">

                <label>Nome</label>
                <input type="text" name="nome" placeholder="Teu nome.." required=""><br />

                <label>Email</label>
                <input type="text" name="email" placeholder="Teu email.." required=""><br />

                <label>Tel</label>
                <input type="text" name="tel" placeholder="Teu telefone.." required=""><br />

                <input type="submit" name="submit" value="Inserir">
            </form>
        </div>
    </div>

    <div class="footer">
        <p>Copyright &copy; 2022</p>
    </div>
</body>


</html>