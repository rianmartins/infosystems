<?php

class Configuracoes_sistema_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function get_funcoes_index(){
    	$sql = "SELECT * FROM funcionarios_funcao";
    	$query = $this->db->query($sql);

    	return $query->result();
    }

}