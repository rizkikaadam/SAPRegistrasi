<?php
class MUser extends CI_Model
{
    public function getAllUser()
    {
        $query = $this->db->query('SELECT * FROM tbl_user');
        return $query->result_array();
    }
}
