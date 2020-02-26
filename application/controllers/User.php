<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser', 'user');
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
        $data['getAllUser'] = $this->user->getAllUser();

        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/user', $data);
        $this->load->view('admin/template/footer');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');



        if ($this->form_validation->run() == false) {

            //pesan 
            redirect('user/tampil');
        } else {

            $ds = '%Y-%m-%d';
            $time = time();
            $tgl = mdate($ds, $time);
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'hintPass' => $this->input->post('password1'),
                'tanggalUser' => $tgl,
                'noHandphone1' => $this->input->post('noHandphone1'),
                'noHandphone2' => $this->input->post('noHandphone2'),
                'alamatUser' => $this->input->post('alamatUser'),
                'asal' => $this->input->post('asal'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'status' => '1'
            ];

            //pesan 

            $this->db->insert('tbl_user', $data);

            redirect('user/tampil');
        }
    }


    public function edit($idUser)
    {
        $data['detailUser'] = $this->db->get_where('tbl_user', ['idUser' => $idUser])->result_array();

        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/detailUser', $data);
        $this->load->view('admin/template/footer');
    }

    public function EditProses()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('user/edit/' . $this->input->post('idUser'));
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'hintPass' => $this->input->post('password1'),
                'noHandphone1' => $this->input->post('noHandphone1'),
                'noHandphone2' => $this->input->post('noHandphone2'),
                'alamatUser' => $this->input->post('alamatUser'),
                'asal' => $this->input->post('asal'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'status' => '1'
            ];

            $this->db->set($data);
            $this->db->where('idUser', $this->input->post('idUser'));
            $this->db->update('tbl_user');

            //pesan
            redirect('user/edit/' . $this->input->post('idUser'));
        }
    }

    public function nonAktif()
    {
        $data = [
            'status' => '0'
        ];

        $this->db->set($data);
        $this->db->where('idUser', $this->input->post('idUser'));
        $this->db->update('tbl_user');

        //pesan
        redirect('user/tampil');
    }

    public function gantiFoto()
    {
        $idUser = $this->input->post('idUser');
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               ' . $this->upload->display_errors() . '
                </div>');

            redirect('user/edit/' . $this->input->post('idUser'));
        } else {
            $data = [
                'fotoUser' => $this->upload->data('file_name')
            ];
            $this->db->set($data);
            $this->db->where('idUser', $idUser);
            $this->db->update('tbl_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Selamat ! Data berhasil di ubah.
                </div>');
            redirect('user/edit/' . $this->input->post('idUser'));
        }
    }
}
