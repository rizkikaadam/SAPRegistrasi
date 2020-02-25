<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MInvoice', 'invoice');
    }

    public function index()
    {
        $data['jumlahUser'] = $this->db->get('tbl_user')->num_rows();
        $data['jumlahAtlet'] = $this->db->get('tbl_atlet')->num_rows();
        $data['jumlahEvent'] = $this->db->get('tbl_event')->num_rows();
        $data['jumlahAtletVerifikasi'] = $this->db->get_where('tbl_atlet', ['verifikasi' => '1'])->num_rows();
        $data['getAllInvoice'] = $this->invoice->getAllInvoice();

        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer');
    }
}
