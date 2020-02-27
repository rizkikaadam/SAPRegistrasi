<?php
class MAtlet extends CI_Model
{
    public function getNomorPertandinganById($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_nomorpertandingan
        JOIN tbl_nomorpertandinganatlet ON tbl_nomorpertandinganatlet.idNomorPertandingan = tbl_nomorpertandingan.idNomorPertandingan
        where tbl_nomorpertandinganatlet.idAtlet = ' . $id . '');
        return $query->result_array();
    }

    public function getDokumenById($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_dokumenatlet
        JOIN tbl_atlet ON tbl_Atlet.idAtlet = tbl_dokumenatlet.idAtlet
        where tbl_dokumenatlet.idAtlet = ' . $id . '');
        return $query->result_array();
    }

    public function getJumlahPerlombaan($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_atlet
        join tbl_user on tbl_atlet.idUser = tbl_user.idUser
        join tbl_nomorpertandinganatlet on tbl_atlet.idAtlet = tbl_nomorpertandinganatlet.idAtlet
        join tbl_nomorpertandingan on tbl_nomorpertandingan.idNomorPertandingan = tbl_nomorpertandinganatlet.idNomorPertandingan
        where jenis = 1
        and tbl_atlet.idUser = ' . $id . '');

        return $query->num_rows();
    }

    public function getJumlahestafet($id)
    {
        $query = $this->db->query('SELECT * FROM tbl_atlet
        join tbl_user on tbl_atlet.idUser = tbl_user.idUser
        join tbl_nomorpertandinganatlet on tbl_atlet.idAtlet = tbl_nomorpertandinganatlet.idAtlet
        join tbl_nomorpertandingan on tbl_nomorpertandingan.idNomorPertandingan = tbl_nomorpertandinganatlet.idNomorPertandingan
        where jenis = 2
        and tbl_atlet.idUser = ' . $id . '');

        return $query->num_rows();
    }
}
