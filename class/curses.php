<?php 
include_once('conexao.php');

class Curses extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCurseById($id){
        $query = "SELECT * FROM tbl_curses WHERE idCurses='$id";
        $result = $this->conexao->query($query);
        if($result-> num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }
        else{
            echo "Cursos não econtrados";
        }        
    }

    public function getAllCurses(){
    $query = "SELECT * FROM tbl_curses ";
    $result = $this->conexao->query($query);
    if ($result-> num_rows > 0) {
        $data = array();
        while($rows = $result->fetch_assoc()){
            $data[]=$rows;
        }
        return $data;
    } else {
        echo "Cursos não econtrados";
    }
    }
}