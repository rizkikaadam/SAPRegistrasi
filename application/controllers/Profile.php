<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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

    public function index()
    {
        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/profile');
        $this->load->view('admin/template/footer');
    }
}
