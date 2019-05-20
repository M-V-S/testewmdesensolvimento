<?php


class Medico_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function show_medicos()
    {
        $this->db->from("medico");
        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        $this->db->insert("medico", $data);
    }

    public function update($id, $data)
    {
        $this->db->where("medico_id", $id);
        $this->db->update("medico", $data);
    }

    public function delete($id)
    {
        $this->db->where("medico_id", $id);
        $this->db->delete("medico");
    }

    public function get_data($id, $select = NULL)
    {
        if (!empty($select)) {
            $this->db->select($select);
        }
        $this->db->from("medico");
        $this->db->where("medico_id", $id);
        return $this->db->get();
    }


}