<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendamento extends CI_Controller
{

    public function index($registroMesagem = null)
    {
        $this->load->model("medico_model");
        $this->load->model("paciente_model");
        $list_medicos = $this->medico_model->show_medicos();
        $list_pacientes = $this->paciente_model->show_pacientes();

        $data = array(
            "getMedicos" => $list_medicos,
            "getPacientes" => $list_pacientes,
            "getAgendamentos" => $this->list_medicos_pacientes(),
            "dateAtual" => $this->DateAtual(),
            "registroMesagem" => $registroMesagem
        );
        $this->template->show("agendamento", $data);
    }

    public function editar_agendamento($agendamento_id)
    {
        $this->load->model("agendamento_model");
        $this->load->model("medico_model");
        $this->load->model("paciente_model");
        $listaMedicos = $this->medico_model->show_medicos();
        $listaPaciente = $this->paciente_model->show_pacientes();

        $result = $this->agendamento_model->get_data($agendamento_id)->result_array()[0];

        $data = array(
            "listaPacientes" => $listaPaciente,
            "listaMedicos" => $listaMedicos,
            "editarAgendamento" => $result,
            "dateAtual" => $this->DateAtual()
        );

        $this->template->show("agendamento_editar", $data);
    }

    public function save_agendamento()
    {
        $registroMesagem = array();
        $registroMesagem["status"] = 1;
        $registroMesagem["error_list"] = array();
        $this->load->model("agendamento_model");

        $data = $this->input->post();

        if (empty($data["agendamento_medico_id"])) {
            $registroMesagem["status"] = 0;
            $registroMesagem["error_list"] = "Informe o nome do Médico!";
        }

        if (empty($data["agendamento_paciente_id"])) {
            $registroMesagem["status"] = 0;
            $registroMesagem["error_list"] = "Informe o nome do Paciente!.";
        }

        //pegar data atual
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d');

        if (strtotime($data['data_atendimento']) < strtotime($date)) {
            $registroMesagem["status"] = 0;
            $registroMesagem["error_list"] = "A data é menor que atual.";
        }

        if (!empty($registroMesagem['error_list'])) {
            $registroMesagem["status"] = 0;
        } else {

            if (empty($data["gerenciamento_id"])) {
                $this->agendamento_model->insert($data);
            } else {
                $gerenciamento_id = $data["gerenciamento_id"];
                unset($data["gerenciamento_id"]);
                $this->agendamento_model->update($gerenciamento_id, $data);
            }
        }

        redirect("agendamento/");
    }

    public function list_medicos_pacientes()
    {
        $this->load->model("agendamento_model");
        $data = $this->agendamento_model->get_medicos_pacientes();

        //converter data no array
        foreach ($data as $key => $value) {
            $data[$key]["data_atendimento"] = $this->converteData($data[$key]["data_atendimento"]);
        }
        return $data;
    }

    public function delete_agendamento($agendamento_id)
    {
        $this->load->model("agendamento_model");

        $this->agendamento_model->delete($agendamento_id);

        redirect("agendamento/");
    }

    //pegar data atual do servidor
    public function DateAtual()
    {
        //pegar data atual
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d');

        return $date;
    }

    //converter data
    public function converteData($data)
    {
        if (strstr($data, "/")) {
            $d = explode("/", $data);
            $rstData = "$d[2]-$d[1]-$d[0]";
            return $rstData;
        } else if (strstr($data, "-")) {
            $data = substr($data, 0, 10);
            $d = explode("-", $data);
            $rstData = "$d[2]/$d[1]/$d[0]";
            return $rstData;
        } else {
            return '';
        }
    }
}