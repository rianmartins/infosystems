<?php

class Unidades_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();

    }

    public function get_estados_br(){
            $query = $this->db->query("SELECT nome, sigla, id FROM estados");
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

    public function consulta_cidades_por_estado($cod_estado){
        $sql = "SELECT 
                    id,
                    nome AS TEXT

                FROM cidades 

                WHERE estado_id = {$cod_estado}";

        return $this->db->query($sql)->result();
    }

    public function consulta_estado_id($estado_uf){
        $sql = "SELECT 
                    id

                FROM estados 

                WHERE sigla = '{$estado_uf}'";

        return $this->db->query($sql)->row();
    }

    public function consulta_cidade_id($cidade_nome){
        $sql = "SELECT 
                    id

                FROM cidades 

                WHERE nome = '{$cidade_nome}'";

        return $this->db->query($sql)->row();
    }
}