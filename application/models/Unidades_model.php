<?php

class Unidades_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();

        }

        public function get_estados_br(){
                $query = $this->db->query("SELECT nome, sigla FROM estados");
                return $query->result();
        }

        public function get_usuario_unidade($cod_usuario){
                $query = $this->db->query("SELECT cod_unidade FROM usuarios_cadastro WHERE id_usuario = $cod_usuario");
                return $query->row()->cod_unidade;
        }

        public function get_unidades(){
                $query = $this->db->query("SELECT cod_unidade FROM unidades");
                return $query->result();
        }
}