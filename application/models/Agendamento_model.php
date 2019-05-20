<?php


class Agendamento_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function show_agendamentos()
    {
        $this->db->from("agendamento");
        return $this->db->get()->result_array();
    }

    public function get_medicos_pacientes()
    {
        $this->db->select('*');
        $this->db->from('agendamento');
        $this->db->join('medico', 'agendamento.agendamento_medico_id = medico.medico_id');
        $this->db->join('paciente', 'agendamento.agendamento_paciente_id = paciente.paciente_id');
        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        $this->db->insert("agendamento", $data);
    }

    public function update($id, $data)
    {
        $this->db->where("agendamento_id", $id);
        $this->db->update("agendamento", $data);
    }

    public function delete($id)
    {
        $this->db->where("agendamento_id", $id);
        $this->db->delete("agendamento");
    }

    public function get_data($id, $select = NULL)
    {

        $this->db->select('*');
        $this->db->from('agendamento');
        $this->db->join('medico', 'agendamento.agendamento_medico_id = medico.medico_id');
        $this->db->join('paciente', 'agendamento.agendamento_paciente_id = paciente.paciente_id');
        $this->db->where("agendamento_id", $id);
        return $this->db->get();
    }


}