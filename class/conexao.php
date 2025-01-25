<?php
session_start();
class Conexao
{
    private $_localhost = 'localhost';
    private $_utilzador = 'root';
    private $_palavraPasse ='';
    private $_nomeBD ='bd_espb';

    protected $conexao;

    public function __construct()
    {
        
        $this->conexao = new mysqli($this->_localhost,$this->_utilzador,$this->_palavraPasse,$this->_nomeBD);
        if(mysqli_connect_error())
        {
            trigger_error("Erro de conexao:". mysqli_connect_error());
        }
        else{
            return $this->conexao;
         }
            
    }
}