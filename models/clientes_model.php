<?php

class Centro_custo_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->clinica = 1;
    }

    /*
     * @return Testar se retorna um array
     */

    function pega_cliente() {

        $query = $this->db->get('cliente');
        if ($query->num_rows() > 0) {
            return $query->row_array(); #BUG BUG BUG 
        } else
            return false;
    }

    function pega_todos_cliente() {

        $query = $this->db->get('cliente');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else
            return false;
    }
    
    function pega_nivel() {
        $this->db->order_by("nivel", "asc");
        $query = $this->db->get('centro_custo_nivel');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else
            return false;
    }

    //Pode ser que já seja um associado
    function pega_dados($email) {

        $this->db->select("nome");
        $query = $this->db->get_where('associado', array('email_associado' => $email,
            'ativo' => 's'));
        if ($query->num_rows() > 0) {
            return $query->row_array(); #BUG BUG BUG 
        } else
            return null;
    }

    function gravar($post) {
        if (is_array($post)) {
            $res = $this->db->insert('clientes', $post);
            if (!$res)
                return false;
            else
                return true;
        } else {
            return false;
        }
    }

    
    function atualizar($_POST) {
        if (is_array($_POST)) {

            $data = array(
                "nome" => $_POST['nome'],
                "telefone" => $_POST['telefone'],
            );

            if (!$this->db->update('centro', $data, array('id_centro_custo' => $_POST['idcentro_custo']))) {
                return false;
            } else
                return true;
        } else
            return false;
    }

    function apagar($id) {
        $data['ativo'] = "n";
        if (!$this->db->update('clientes', $data, array('id_clientes' => $id)))
            return false;
        else
            return true;
    }

    
    function busca($query) {
        $this->db->select('id_clientes, nome');
        $this->db->like('nome', $query);
        $this->db->limit(10);
        $query = $this->db->get('clientes');
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x]['id'] = $row->id_clientes;
                $data[$x]['name'] = $row->nome . ' - ' . $row->telefone . $row->email . $row->cep;

                $x++;
            }
            return $data;
        } else
            return null;
    }

    function por_id($id) {
        $query = $this->db->get_where('clientes', array('id_clientes' => $id, "ativo" => "s"));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['nome'] = $row->nome;
                $data['finalidade'] = $row->finalidade;
            }
            return $data;
        } else
            return null;
    }

}

?>