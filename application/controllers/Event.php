<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
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

    public function tampil()
    {
        $data['getAllEvent'] = $this->db->get('tbl_event')->result_array();

        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/event', $data);
        $this->load->view('admin/template/footer');
    }

    public function index()
    {
        $this->form_validation->set_rules('namaEvent', 'Nama Event', 'required');
        if ($this->form_validation->run() == false) {

            //pesan 
            redirect('Event/tampil');
        } else {

            $data = [
                'namaEvent' => $this->input->post('namaEvent'),
                'tglEventMulai' => $this->input->post('tglEventMulai'),
                'tglEventSelesai' => $this->input->post('tglEventSelesai'),
                'tglPendaftaranMulai' => $this->input->post('tglPendaftaranMulai'),
                'tglPendaftaranSelesai' => $this->input->post('tglPendaftaranSelesai'),
                'keteranganEvent' => $this->input->post('keteranganEvent'),
                'deskripsiEvent' => $this->input->post('deskripsiEvent'),
                'syaratEvent' => $this->input->post('syaratEvent'),
                'tempat' => $this->input->post('tempat')
            ];

            //pesan 

            $this->db->insert('tbl_event', $data);

            redirect('Event/tampil');
        }
    }

    public function edit($idEvent)
    {
        $data['detailEvent'] = $this->db->get_where('tbl_event', ['idEvent' => $idEvent])->result_array();

        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/detailEvent', $data);
        $this->load->view('admin/template/footer');
    }

    public function EditProses()
    {
        $this->form_validation->set_rules('namaEvent', 'Nama Event', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Event/edit/' . $this->input->post('idEvent'));
        } else {
            $data = [
                'namaEvent' => $this->input->post('namaEvent'),
                'tglEventMulai' => $this->input->post('tglEventMulai'),
                'tglEventSelesai' => $this->input->post('tglEventSelesai'),
                'tglPendaftaranMulai' => $this->input->post('tglPendaftaranMulai'),
                'tglPendaftaranSelesai' => $this->input->post('tglPendaftaranSelesai'),
                'keteranganEvent' => $this->input->post('keteranganEvent'),
                'deskripsiEvent' => $this->input->post('deskripsiEvent'),
                'syaratEvent' => $this->input->post('syaratEvent'),
                'tempat' => $this->input->post('tempat')
            ];

            $this->db->set($data);
            $this->db->where('idEvent', $this->input->post('idEvent'));
            $this->db->update('tbl_Event');

            //pesan
            redirect('Event/edit/' . $this->input->post('idEvent'));
        }
    }

    public function gantiFoto()
    {
        $idUser = $this->input->post('idEvent');
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               ' . $this->upload->display_errors() . '
                </div>');

            redirect('Event/edit/' . $this->input->post('idEvent'));
        } else {
            $data = [
                'fotoEvent' => $this->upload->data('file_name')
            ];
            $this->db->set($data);
            $this->db->where('idEvent', $this->input->post('idEvent'));
            $this->db->update('tbl_Event');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Selamat ! Data berhasil di ubah.
                </div>');
            redirect('Event/edit/' . $this->input->post('idEvent'));
        }
    }

    public function hapus()
    {
        $this->form_validation->set_rules('idEvent', 'Nomor idEvent', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Event/tampil');
        } else {


            $this->db->delete('tbl_event', ['idEvent', $this->input->post('idEvent')]);

            //pesan
            redirect('Event/tampil');
        }
    }
}
