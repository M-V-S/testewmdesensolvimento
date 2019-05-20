<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrict extends CI_Controller
{

    //na variavel $registroMesagem 1:sucesso, 0:error
    public function index($registroMesagem = null)
    {
        $data = array(
            "getMedicos" => $this->list_medicos(),
            "registroMesagem" => $registroMesagem
        );

        $this->template->show("medico", $data);
    }

    public function editar_medico($medico_id)
    {
        $this->load->model("medico_model");

        $ressult = $this->medico_model->get_data($medico_id)->result_array()[0];

        $data = array(

            "editarMedico" => $ressult
        );

        $this->template->show("medico_editar", $data);
    }


    public function save_medico()
    {
        $registroMesagem = array();
        $registroMesagem["status"] = 1;
        $registroMesagem["error_list"] = array();

        $this->load->model("medico_model");

        $data = $this->input->post();

        if (empty($data["medico_nome"])) {
            $registroMesagem["error_list"]["#nome"] = "Nome do médico é obrigatório!";
            $registroMesagem["status"] = 0;
        }

        if (empty($data["medico_crm"])) {
            $registroMesagem["error_list"]["#crm"] = "Crm é obrigatório!";
            $registroMesagem["status"] = 0;
        }

        if (empty($data["medico_email"])) {
            $registroMesagem["error_list"]["#email"] = "E-mail é obrigatório!";
        } else {
            if ($data["medico_email"] != $data["email_confirm"]) {
                $registroMesagem["error_list"]["#email"] = "";
                $registroMesagem["error_list"]["#email_confirm"] = "E-mails não conferem!";
            }
        }

        if (empty($data["medico_especialidade"])) {
            $registroMesagem["error_list"]["#especialidade"] = "especialidade é obrigatório!";
            $registroMesagem["status"] = 0;
        }

        if (!empty($registroMesagem["error_list"])) {
            $registroMesagem["status"] = 0;
        } else {

            unset($data["email_confirm"]);

            if (empty($data["medico_id"])) {
                $this->medico_model->insert($data);
            } else {
                $medico_id = $data["medico_id"];
                unset($data["medico_id"]);
                $this->medico_model->update($medico_id, $data);
            }
        }
        redirect("restrict");
    }

    public function list_medicos()
    {
        $this->load->model("medico_model");
        $data = $this->medico_model->show_medicos();
        return $data;
    }

    public function delete_medico($medico_id)
    {

        $this->load->model("medico_model");
        $this->medico_model->delete($medico_id);
        redirect("restrict/");
    }
}
