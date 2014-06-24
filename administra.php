<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class clientes extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model("cliente_model");
        $this->load->library("suporte_library");
        ob_start(); //Evita erro do header  
    }

    public function cadastra() {

        if ($this->centro_custo_model->gravar($_POST))
            echo "true"; //se deu certo
        else
            echo "false"; //deu errado
    }

    public function editar() {
        if ($this->cliente_model->atualizar($_POST))
            echo "true";
        else
            echo "false";
    }

    public function excluir($id = null) {
        if (!empty($id)) {
            if ($this->cliente_model->exclui($id))
                echo "true";
            else
                echo "false";
        }
    }
}
    
/* End of file centro_custo.php */
/* Location: ./application/controllers/centro_custo.php */