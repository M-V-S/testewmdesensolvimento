<?php

class Paciente_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function show_pacientes()
    {
        $this->db->from("paciente");
        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        $this->db->insert("paciente", $data);
    }

    public function update($id, $data)
    {
        $this->db->where("paciente_id", $id);
        $this->db->update("paciente", $data);
    }

    public function delete($id)
    {
        $this->db->where("paciente_id", $id);
        $this->db->delete("paciente");

    }

    public function get_data($id, $select = NULL)
    {
        if (!empty($select)) {
            $this->db->select($select);
        }
        $this->db->from("paciente");
        $this->db->where("paciente_id", $id);
        return $this->db->get();
    }


}