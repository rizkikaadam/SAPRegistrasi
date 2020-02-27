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
        $this->load->model('MAtlet', 'atlet');
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

    public function daftar()
    {
        $id = $this->session->userdata('idUser');
        $data['jumlahAtlet'] = $this->db->get_where('tbl_atlet', ['idUser' => $id])->num_rows();
        $data['getJumlahPerlombaan'] = $this->atlet->getJumlahPerlombaan($id);
        $data['getJumlahestafet'] = $this->atlet->getJumlahestafet($id);

        $data['statusDaftar'] = $this->db->get_where('tbl_invoice', ['idUser' => $id])->num_rows();

        $this->load->view('user/template/head');
        $this->load->view('user/template/topbar');
        $this->load->view('user/template/menu');
        $this->load->view('user/daftarPertandingan', $data);
        $this->load->view('user/template/footer');
    }

    public function konfirmasi()
    {
        $data['invoice'] = $this->db->get_where('tbl_invoice', ['idUser' => $this->session->userdata('idUser')])->result_array();
        $this->load->view('user/template/head');
        $this->load->view('user/template/topbar');
        $this->load->view('user/template/menu');
        $this->load->view('user/konfirmasiPembayaran', $data);
        $this->load->view('user/template/footer');
    }

    public function addDaftar()
    {
        $d = '%Y-%m-%d';

        $time = time();
        $tgl = mdate($d, $time);
        $tahun = mdate('%d%m%Y', $time);
        $idUser = $this->session->userdata('idUser');
        $idEvent = 1;
        if ($this->input->post('pendaftar') == '') {
            $noInvoice = $idUser . "" . $idEvent . "" . ($idUser + 1) . "$tahun";
            $data = [
                'noInvoice' => $noInvoice,
                'tanggalInvoice' => $tgl,
                'jumlahBayar' => $this->input->post('total'),
                'idUser' => $idUser,
                'idEvent' => 1,
                'jumlahAtlet' => $this->input->post('jumlahAtlet'),
                'pendamping' => $this->input->post('pendamping'),
                'noHpPendamping' => $this->input->post('noHandphone')
            ];

            $this->db->insert('tbl_invoice', $data);
            //pesan invoice berhasil di buat
            redirect('Pertandingan/pembayaran');
        } else {
            $this->form_validation->set_rules('pendaftar', 'pendaftar', 'require');

            if ($this->form_valdiation->run() == false) {
                //pesan harap untuk memilih apak pendaftar sebagai pendamping jika iya mohon di chek list , jika tidak mohon isi nama pendamping dan kontak.
                redirect('Pertandingan/daftar');
            } else {
                $noInvoice = $idUser . "" . $idEvent . "" . ($idUser + 1) . "$tahun";
                $data = [
                    'noInvoice' => $noInvoice,
                    'tanggalInvoice' => $tgl,
                    'jumlahBayar' => $this->input->post('total'),
                    'idUser' => $idUser,
                    'idEvent' => 1,
                    'jumlahAtlet' => $this->input->post('jumlahAtlet')
                ];

                $this->db->insert('tbl_invoice', $data);
                //pesan invoice berhasil di buat
                redirect('Pertandingan/konfirmasi');
            }
        }
    }

    public function konfirmasiPembayaran()
    {
        $this->form_validation->set_rules('kode', 'kode invoice', 'require');
        if ($this->form_validation->run() == false) {
            // pesan error
            redirect('pertandingan/konfirmasi');
        } else {
            //upload dokumen
            $d = '%Y-%m-%d';

            $time = time();
            $tgl = mdate($d, $time);
            $dokumen['upload_path'] = './assets/bukti/';
            $dokumen['allowed_types'] = 'pdf';
            $this->load->library('upload');
            $this->upload->initialize($dokumen);
            $this->upload->do_upload('bukti');
            $bukti = $this->upload->data('file_name');

            $data = [
                'idInvoice' => $this->input->post('kode'),
                'jmlTransfer' => $this->input->post('transfer'),
                'bukti' => $bukti,
                'tglKonfirmasi' => $tgl
            ];

            $this->db->insert('tbl_konfirmasi', $data);
            //pesan
            redirect('Dashboard/userPage');
        }
    }
}
