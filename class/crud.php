<?php
include_once('conexao.php');

class Crud extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserirDados($post)
    {
        $nome = $this->conexao->real_escape_string($_POST['nome']);
        $email = $this->conexao->real_escape_string($_POST['email']);
        $tel = $this->conexao->real_escape_string($_POST['tel']);
        $query = "INSERT INTO form(name,email,phone) VALUES('$nome','$email','$tel')";
        $sql = $this->conexao->query($query);
        if ($sql == true) {
            header("Location: lista.php?msg1=inserir");
        } else {
            echo "Erro ao inserir!";
        }
    }

    //Metodo para listar todos os dados
    public function listarTodosDados()
    {
        $query = "SELECT * FROM form";
        $resultado = $this->conexao->query($query);

        //Verificar se econtrou dados
        if ($resultado->num_rows > 0) {
            $dados = array();
            while ($linhas = $resultado->fetch_assoc()) {
                $dados[] = $linhas;
            }
            return $dados;
        } else {
            echo "Tabela Vasia!.";
        }
    }

    //Metodo para pegar um dado por id para ser editado
    public function selecionarById($id)
    {
        $query = "SELECT * FROM form WHERE id = '$id'";
        $resultado = $this->conexao->query($query);
        //Verificar se econtrou dados
        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            return $linha;
        } else {
            echo "Dado nao econtrado!";
        }
    }

   

    //Metodo para actualizar os dados
    public function actualizarDado($post)
    {
        $nome = $this->conexao->real_escape_string($_POST['nome']);
        $email = $this->conexao->real_escape_string($_POST['email']);
        $tel = $this->conexao->real_escape_string($_POST['tel']);
        $id = $this->conexao->real_escape_string($_POST['id']);
        if (!empty($post) && !empty($post)) {
            $query = "UPDATE form SET name ='$nome', email='$email',phone='$tel' WHERE id='$id'";
            $sql = $this->conexao->query($query);
            if ($sql == true) {
                header("Location:lista.php?msg2=editar");
            } else {
                echo "Erro ao editar!";
            }
        }
    }

    //Metodo para apagar um dado
    public function apagarDado($id)
    {
        $apagarQuery = "DELETE FROM form WHERE id='$id'";
        $sql = $this->conexao->query($apagarQuery);
        if ($sql == true) {
            header("Location:lista.php?msg3=apagar");
        } else {
            echo "Erro ao apagar!";
        }
    }
}
