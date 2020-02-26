<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertandingan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Login terlebih dulu!
            </div>');
            redirect('login');
        }
    }

    public function tampilNomorPertandingan()
    {
        $data['getAllNomorPertandingan'] = $this->db->get('tbl_nomorpertandingan')->result_array();

        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/nomorPertandingan', $data);
        $this->load->view('admin/template/footer');
    }

    public function nomorPertandingan()
    {
        $this->form_validation->set_rules('nomorPertandingan', 'Nomor Pertandingan', 'required');
        if ($this->form_validation->run() == false) {

            //pesan 
            redirect('Pertandingan/tampilNomorPertandingan');
        } else {

            $data = [
                'nomorPertandingan' => $this->input->post('nomorPertandingan'),
                'kelompok' => $this->input->post('kelompok'),
                'kelas' => $this->input->post('kelas')
            ];

            //pesan 

            $this->db->insert('tbl_nomorpertandingan', $data);

            redirect('Pertandingan/tampilNomorPertandingan');
        }
    }

    public function editNomorPertandingan()
    {
        $this->form_validation->set_rules('idNomorPertandingan', 'Nomor Pertandingan', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Pertandingan/tampilNomorPertandingan');
        } else {
            $data = [
                'nomorPertandingan' => $this->input->post('nomorPertandingan'),
                'kelompok' => $this->input->post('kelompok'),
                'kelas' => $this->input->post('kelas')
            ];

            $this->db->set($data);
            $this->db->where('idNomorPertandingan', $this->input->post('idNomorPertandingan'));
            $this->db->update('tbl_nomorpertandingan');

            //pesan
            redirect('Pertandingan/tampilNomorPertandingan');
        }
    }

    public function hapusNomorPertandingan()
    {
        $this->form_validation->set_rules('idNomorPertandingan', 'Nomor Pertandingan', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Pertandingan/tampilNomorPertandingan');
        } else {


            $this->db->delete('tbl_nomorpertandingan', ['idNomorPertandingan', $this->input->post('idNomorPertandingan')]);

            //pesan
            redirect('Pertandingan/tampilNomorPertandingan');
        }
    }
}
