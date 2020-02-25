<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/template/footer');
    }
}
