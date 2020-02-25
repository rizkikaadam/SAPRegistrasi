<?php
class Minvoice extends CI_Model
{
    public function getAllInvoice()
    {
        $query = $this->db->query('SELECT * FROM tbl_invoice order by tanggalInvoice DESC LIMIT 5 ');
        return $query->result_array();
    }
}
