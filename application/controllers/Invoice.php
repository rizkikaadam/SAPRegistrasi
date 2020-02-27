<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MInvoice', 'invoice');
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Login terlebih dulu!
            </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data['getAllInvoice'] = $this->invoice->getInvoice();

        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/invoice', $data);
        $this->load->view('admin/template/footer');
    }

    public function konfirmasi()
    {
        $id = $this->input->get('id');
        $data['konfirmasi'] = $this->invoice->getKonfirmasi($id);
        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/detailInvoice', $data);
        $this->load->view('admin/template/footer');
    }

    public function konfirmasiProses()
    {
        $id = $this->input->post('idInvoice');
        $data = ['status' => 1];
        $this->db->set($data);
        $this->db->where('idInvoice', $id);
        $this->db->update('tbl_invoice');

        redirect('Invoice');
    }
}
