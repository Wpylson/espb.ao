<?php
include_once("class/crud.php");

$crud = new Crud();
//Pegar os dados 
if(isset($_GET['editarid']) && !empty($_GET['editarid'])) {
    $editId = $_GET['editarid'];
    $dadoss  = $crud->selecionarById($editId);
}



if(isset($_POST['editar']))
{
   $crud->actualizarDado($_POST);
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
    <title>Editar</title>
</head>

<body>
<div class="topnav">
        <ul>
            <li><a href="lista.php">Home</a></li>
            <li><a href="add.php">Adicionar</a></li>
            <li><a href="#">Utilizadores</a></li>
            <li style="float:right"><a href="#about">Sobre</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Editar Dado</h2>
    <form method="POST" name="form">

        <label>Nome</label>
        <input type="text" name="nome"  placeholder="Teu nome.." value="<?php echo $dados['name'] ;?>" required=""><br />

        <label>Email</label>
        <input type="text" name="email"  placeholder="Teu email.." value="<?php echo $dados['email'] ;?>" required=""><br />

        <label>Tel</label>
        <input type="text"  placeholder="Teu telefone.." name="tel" value="<?php echo $dados['phone'];?>" required=""><br />
        <input type="hidden" name="id"  value="<?php echo $dados['id'] ;?>" >

        <input type="submit" name="editar" value="Editar">
    </form>
    </div>
    <div class="footer">
        <p>Copyright &copy; 2022</p>
    </div>
</body>

</html>