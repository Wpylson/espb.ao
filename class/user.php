<?php
include_once('conexao.php');
class User extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($post)
    {
        $name = $this->conexao->real_escape_string($_POST['name']);
        $last_name = $this->conexao->real_escape_string($_POST['last_name']);
        $email = $this->conexao->real_escape_string($_POST['email']);
        $password = $this->conexao->real_escape_string($_POST['password']);
        $repeatPassword = $this->conexao->real_escape_string($_POST['repeatPassword']);

        if ($password != $repeatPassword) {
            header("Location: register.php?msgp=pass");
        } else {
            $query = "INSERT INTO `tbl_users`(
                `first_name`, `last_name`,`user_email`, `password`,`user_level`
            ) VALUES('$name','$last_name','$email','$password','2')
            ";
            $sql = $this->conexao->query($query);
            if ($sql == true) {
                header("Location: login.php?msgd=done");
            } else {
                header("Location: register.php?msge=error");
            }
        }
    }

    public function login($post)
    {
        $email = $this->conexao->real_escape_string($_POST['email']);
        $password = $this->conexao->real_escape_string($_POST['password']);
        $query = "SELECT * FROM tbl_users WHERE user_email='$email' and password='$password' limit 1";
        $result = $this->conexao->query($query);
        if ($result->num_rows > 0) {
            $rows = $result->fetch_assoc();
            $email = $rows['user_email'];
            $user_level = $rows['user_level'];
            $user_id=$rows['idUser'];
            if ($user_level == 1) {
                header("Location: admin/dashboard.php");
                $validade = strtotime("+1 month");
                setcookie("espbadm", $email, $validade, "/", "", false, true);
                $_SESSION['useremail']=$email;
                $_SESSION['user_level']=$user_level;
                $_SESSION['user_id']=$user_id; 
            } elseif ($user_level == 2) {
                header("Location: dashboard.php");
                $validade = strtotime("+1 month");
                setcookie("espbuser", $email, $validade, "/", "", false, true);
                $_SESSION['useremail']=$email;
                $_SESSION['user_level']=$user_level;
                $_SESSION['user_id']=$user_id;                
            }
        } else {
            header("Location: login.php?msgl=error");
        }
    }

    public function logoutUser()
    {
        $validade = time()-3600;
        $result=setcookie("espbuser", '', $validade, "/", "", false, true);
        session_destroy();
        if($result=TRUE){
            header("Location: login.php"); 
        }
    }
    public function logoutAdmin()
    {
        $validade = time()-3600;
        $result=setcookie("espbadm", '', $validade, "/", "", false, true);
        session_destroy();
        if($result=TRUE){
            header("Location: ../login.php"); 
        }
    }

    public function getUserByEmail($email){
        $query = "SELECT * FROM tbl_users WHERE user_email='$email'";
        $result= $this->conexao->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }
        else{
            echo"Utilizador nao econtrado";
        }
        
    }
    public function getUserById($idUser){
        $query = "SELECT * FROM tbl_users WHERE idUsers='$idUser'";
        $result= $this->conexao->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }
        else{
            echo"Utilizador nao econtrado";
        }
        
    }

    public function getAllUsersByLevel($level){
        $query = "SELECT * FROM tbl_users WHERE user_level='$level'";
        $result= $this->conexao->query($query);
        if($result->num_rows > 0){
            $datas = array();
            while($rows= $result->fetch_assoc()){
                $datas[]=$rows;
            }
            return $datas;
        }
        else{
            echo"Utilizadores não econtrados";
        }
    }

    
}
