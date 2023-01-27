<?php 
include_once('conexao.php');

class Candidatures extends Conexao{
    public function __construct()
    {
        parent :: __construct();
    }

    public function addCandidatures($post,$doc_id,$doc_certificate)
    {
        $idUser = $this->conexao->real_escape_string($_POST['user']);
        $num_id = $this->conexao->real_escape_string($_POST['num_id']);
        $birth_date = $this->conexao->real_escape_string($_POST['birth_date']);
        $idCurse = $this->conexao->real_escape_string($_POST['curse']);
        $num_phone = $this->conexao->real_escape_string($_POST['num_phone']);
        $motivation = $this->conexao->real_escape_string($_POST['motivation']);
        
        $query ="INSERT INTO tbl_candidature SET
            `idUser` ='$idUser',
            `num_id` = '$num_id',
            `birth_date`='$birth_date',
            `idCurses` ='$idCurse',
            `num_phone`='$num_phone',
            `doc_id` ='$doc_id',
            `doc_certicate`='$doc_certificate',
            `motivation` ='$motivation',
            `candidature_status`='1'; 
        ";
        $sql = $this->conexao->query($query);
        if($sql ==true){
            header("Location: dashboard.php?msgs=success");
        }
        else{
            header("Location: add_candidatures.php?msgc=error");
        }
       
    }

    public function getAllCandidatures()
    {
        $query ="SELECT tbl_curses.*,tbl_candidature.* FROM tbl_candidature 
        INNER JOIN tbl_curses ON tbl_candidature.idCurses=tbl_curses.idCurses";
        $result = $this->conexao->query($query);
        if($result->num_rows >0){
            $datas = array();
            while($rows = $result->fetch_assoc()){
                $datas[]=$rows;
            }
            return $datas;
        }
        else{
            echo "Candidaturas nao encontradas";
        }
    }

    public function getCandidatureById($id){
        $query = "SELECT tbl_curses.*,tbl_candidature.* FROM tbl_candidature 
        INNER JOIN tbl_curses ON tbl_candidature.idCurses=tbl_curses.idCurses
        WHERE tbl_candidature.idCandidature='$id'";
        $result= $this->conexao->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }
        else{
            echo"Candidatura  nao econtrada";
        }
    }
    public function getCandidaturesByUser($user){
        $query = "SELECT tbl_curses.*,tbl_candidature.* FROM tbl_candidature 
        INNER JOIN tbl_curses ON tbl_candidature.idCurses=tbl_curses.idCurses
        WHERE tbl_candidature.idUser='$user'";
        $result= $this->conexao->query($query);
        if($result->num_rows > 0){
            $datas = array();
            while($rows =$result->fetch_assoc()){
                $datas[]=$rows;
            }
            return $datas;
        }
        else{
           // echo"Candidatura  nao econtrada";
        }
    }
    
    public function changeCandidatureStatus($id){
        $query ="UPDATE tbl_candidature  candidature_status='2' WHERE idCandidature='$id' ";
        $sql = $this->conexao->query($query);
        if($sql == true){
            header("Location: admin/candidatures.php?msgs=done");
        }
        else{
            header("Location: admin/candidatures.php?msgs=error");
        }
    }
}
