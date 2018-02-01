<?php

class Usuario_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();

        }

        public function valida_login($login, $senha_hash){

            $sql = "SELECT 
                        CASE
                        WHEN (u.is_funcionario IS TRUE)
                            THEN f.nome_pessoa
                            ELSE c.nome_pessoa
                        END AS nome_pessoa,
                        u.cod_usuario,
                        f.cod_funcionario,
                        c.cod_cliente,
                        f.cod_funcao,
                        u.cod_unidade

                    FROM usuarios u
                    LEFT JOIN funcionarios f ON f.cod_usuario = u.cod_usuario
                    LEFT JOIN clientes c ON c.cod_usuario = u.cod_usuario

                    WHERE
                        u.usuario = '{$login}'
                        AND u.senha = '{$senha_hash}'";
            $query = $this->db->query($sql);
            return $query->result();

        }

        public function get_usuarios_status(){
                $query = $this->db->query("SELECT * FROM usuario_status");
                return $query->result();
        }

        public function insert($data){
                $this->db->insert("usuarios_cadastro", $data);
                return $this->db->insert_id();
        }

        public function get_usuario_nome($email){
                $query = $this->db->query("SELECT nome_pessoa FROM usuarios_cadastro WHERE email = '$email'");
                return $query->row()->nome_pessoa;
        }

        public function get_usuarios_emails(){
                $query = $this->db->query("SELECT usuario, email FROM usuarios_cadastro");
                return $query->result();
        }

        public function get_usuarios_senhas(){
                $query = $this->db->query("SELECT * FROM usuarios_cadastro");
                return $query->result();
        }

        public function get_usuarios_chave(){
                $query = $this->db->query("SELECT id_usuario, chave FROM usuarios_cadastro");
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

        public function get_chave($email){
                $query = $this->db->query("SELECT chave FROM usuarios_cadastro WHERE email = '$email'");
                $chave = $query->row()->chave;

                return $chave;
        }

        public function get_chave_usuario($id_usuario){
                $query = $this->db->query("SELECT chave FROM usuarios_cadastro WHERE id_usuario = {$id_usuario}");
                $chave = $query->row()->chave;

                return $chave;
        }

        public function alterar_senha($id_usuario,$nova_senha){
                $query = $this->db->query("UPDATE usuarios_cadastro SET senha = '$nova_senha' WHERE id_usuario = {$id_usuario}");
        }

        public function atualiza_chave($id_usuario){
                $nova_chave = $this->gera_nova_chave();
                $query = $this->db->query("UPDATE usuarios_cadastro SET chave = '$nova_chave' WHERE id_usuario = {$id_usuario}");
        }

        public function gera_nova_chave() {
                do{
                        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $pass = array(); //remember to declare $pass as an array
                        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                        for ($i = 0; $i < 8; $i++) {
                            $n = rand(0, $alphaLength);
                            $pass[] = $alphabet[$n];
                        }
                        $nova_chave = implode($pass);

                        $chaves = $this->get_usuarios_chave();
                        $existe_chave = false;
                        foreach ($chaves as $key => $chave) {
                                if($chave->chave == $nova_chave){
                                        $existe_chave = true;
                                }
                        }

                } while($existe_chave);
                        


            return $nova_chave; //turn the array into a string
            
    }
}