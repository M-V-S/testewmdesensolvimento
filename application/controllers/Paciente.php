<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller
{
    public function index($registroMesagem = null)
    {
        $data = array(
            "getPacientes" => $this->list_pacientes(),
            "registroMesagem" => $registroMesagem
        );
        $this->template->show("paciente", $data);
    }

    public function editar_paciente($paciente_id)
    {
        $this->load->model("paciente_model");

        $result = $this->paciente_model->get_data($paciente_id)->result_array()[0];

        $data = array(

            "editarPaciente" => $result
        );

        $this->template->show("paciente_editar", $data);
    }

    public function save_paciente()
    {
        $registroMesagem = array();
        $registroMesagem["status"] = 1;
        $registroMesagem["error_list"] = array();

        $this->load->model("paciente_model");

        $data = $this->input->post();

        if (empty($data["paciente_nome"])) {
            $registroMesagem["error_list"]["#nome"] = "Nome do paciente é obrigatório!";
            $registroMesagem["status"] = 0;
        }

        if (empty($data["paciente_idade"])) {
            $registroMesagem["error_list"]["#idade"] = "A idade é obrigatório!";
            $registroMesagem["status"] = 0;
        }

        if (empty($data["paciente_email"])) {
            $registroMesagem["error_list"]["#email"] = "E-mail é obrigatório!";
        } else {
            if ($data["paciente_email"] != $data["email_confirm"]) {
                $registroMesagem["error_list"]["#email"] = "";
                $registroMesagem["error_list"]["#email_confirm"] = "E-mails não conferem!";
            }
        }

        if (empty($data["paciente_sexo"])) {
            $registroMesagem["error_list"]["#sexo"] = "O sexo é obrigatório!";
            $registroMesagem["status"] = 0;
        }

        if (!empty($registroMesagem['error_list'])) {
            $registroMesagem["status"] = 0;
        } else {

            unset($data["email_confirm"]);

            if (empty($data["paciente_id"])) {
                $this->paciente_model->insert($data);
            } else {
                $paciente_id = $data["paciente_id"];
                unset($data["paciente_id"]);
                $this->paciente_model->update($paciente_id, $data);
            }
        }
        redirect("paciente");
    }

    public function list_pacientes()
    {
        $this->load->model("paciente_model");

        $data = $this->paciente_model->show_pacientes();

        return $data;
    }

    public function delete_paciente($paciente_id)
    {
        $this->load->model("paciente_model");

        $this->paciente_model->delete($paciente_id);
        redirect("paciente/");
    }


}