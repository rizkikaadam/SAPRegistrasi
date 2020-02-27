<?php
class Minvoice extends CI_Model
{
    public function getAllInvoice()
    {
        $query = $this->db->query('SELECT * FROM tbl_invoice order by tanggalInvoice DESC LIMIT 5 ');
        return $query->result_array();
    }

    public function getInvoice()
    {
        $query = $this->db->query('SELECT * FROM tbl_invoice order by tanggalInvoice DESC');
        return $query->result_array();
    }

    public function getKonfirmasi($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_invoice 
        JOIN tbl_konfirmasi ON tbl_konfirmasi.idInvoice = tbl_invoice.idInvoice
        WHERE tbl_konfirmasi.idInvoice = ' . $id . ' ');
        return $query->result_array();
    }
}
