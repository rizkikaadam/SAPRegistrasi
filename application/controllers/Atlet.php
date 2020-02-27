<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atlet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Matlet', 'atlet');
        $this->load->library('form_validation');
    }

    public function tampil()
    {
        $data['getAllAtlet'] = $this->db->get('tbl_atlet')->result_array();
        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/atlet', $data);
        $this->load->view('admin/template/footer');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Atlet/tampil');
        } else {

            $ds = '%Y-%m-%d';
            $time = time();
            $tgl = mdate($ds, $time);
            $data = [
                'namaAtlet' => $this->input->post('nama'),
                'tempatLahir' => $this->input->post('tmpLahir'),
                'tanggalLahir' => $this->input->post('tglLahir'),
                'alamatAtlet' => $this->input->post('alamat'),
                'tanggalDaftar' => $tgl,
                'verifikasi' => 0

            ];

            //insert data atlet ke dalam tabel
            $this->db->insert('tbl_atlet', $data);

            //mengambil idAtlet terakhir
            $queryIdAtlet = $this->db->query('SELECT * FROM tbl_atlet ORDER BY idAtlet DESC LIMIT 1')->result_array();
            foreach ($queryIdAtlet as $k) {
                $x = $k["idAtlet"];
            }

            $dataSekolah = [
                'jenjang' => $this->input->post('jenjang'),
                'namaSekolah' => $this->input->post('namaSekolah'),
                'idAtlet' => $x
            ];

            $this->db->insert('tbl_sekolahatlet', $dataSekolah);

            //pesan
            redirect('Atlet/tampil');
        }
    }

    public function edit($idAtlet)
    {
        $data['detailAtlet'] = $this->db->get_where('tbl_atlet', ['idAtlet' => $idAtlet])->result_array();
        $data['sekolah'] = $this->db->get_where('tbl_sekolahAtlet', ['idAtlet' => $idAtlet])->result_array();
        $data['getNomorPertandinganById'] = $this->atlet->getNomorPertandinganById($idAtlet);
        $data['getDokumenById'] = $this->atlet->getDokumenById($idAtlet);
        $this->load->view('admin/template/head');
        $this->load->view('admin/template/menu');
        $this->load->view('admin/detailAtlet', $data);
        $this->load->view('admin/template/footer');
    }

    public function editProses()
    {
        $this->form_validation->set_rules('idAtlet', 'Atlet ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tmpLahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Atlet/edit/' . $this->input->post('idAtlet'));
        } else {

            $data = [
                'namaAtlet' => $this->input->post('nama'),
                'tempatLahir' => $this->input->post('tmpLahir'),
                'tanggalLahir' => $this->input->post('tglLahir'),
                'alamatAtlet' => $this->input->post('alamatAtlet')

            ];
            $this->db->set($data);
            $this->db->where('idAtlet', $this->input->post('idAtlet'));
            $this->db->update('tbl_atlet');

            //pesan
            redirect('Atlet/edit/' . $this->input->post('idAtlet'));
        }
    }

    public function nonAktif()
    {
        $data = [
            'statusAtlet' => '0'
        ];

        $this->db->set($data);
        $this->db->where('idAtlet', $this->input->post('idAtlet'));
        $this->db->update('tbl_Atlet');

        //pesan
        redirect('Atlet/tampil');
    }

    public function gantiFoto()
    {
        $idAtlet = $this->input->post('idAtlet');
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            //pesan

            redirect('Atlet/edit/' . $this->input->post('idAtlet'));
        } else {
            $data = [
                'fotoAtlet' => $this->upload->data('file_name')
            ];
            $this->db->set($data);
            $this->db->where('idAtlet', $idAtlet);
            $this->db->update('tbl_atlet');

            //pesan
            redirect('Atlet/edit/' . $this->input->post('idAtlet'));
        }
    }

    public function uploadFoto($filename)
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($filename)) {
            //pesan

            redirect('Atlet/addAtletUser');
        } else {
            $data = $this->upload->data('file_name');

            return $data;
        }
    }

    public function uploadDokumen($filename)
    {
        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'pdf';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($filename)) {
            //pesan

            redirect('Atlet/addAtletUser');
        } else {
            $data = $this->upload->data('file_name');

            return $data;
        }
    }


    public function tampilUser()
    {
        $idUser = $this->session->userdata('idUser');
        $data['getAllAtlet'] = $this->db->get_where('tbl_atlet', ['idUser' => $idUser])->result_array();
        $data['statusDaftar'] = $this->db->get_where('tbl_invoice', ['idUser' => $idUser])->num_rows();
        $this->load->view('user/template/head');
        $this->load->view('user/template/topbar');
        $this->load->view('user/template/menu');
        $this->load->view('user/atlet', $data);
        $this->load->view('user/template/footer');
    }

    public function atletUser()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');


        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Atlet/tampilUser');
        } else {

            $ds = '%Y-%m-%d';
            $time = time();
            $tgl = mdate($ds, $time);

            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|png';

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $foto = $this->upload->data('file_name');


            // $akte = $this->uploadDokumen($this->upload->do_upload('akte'));
            // $dok = $this->uploadDokumen($this->upload->do_upload('dok'));
            $data = [
                'namaAtlet' => $this->input->post('nama'),
                'tempatLahir' => $this->input->post('tmpLahir'),
                'tanggalLahir' => $this->input->post('tglLahir'),
                'alamatAtlet' => $this->input->post('alamat'),
                'idUser' => $this->session->userdata('idUser'),
                'tanggalDaftar' => $tgl,
                'fotoAtlet' => $foto,
                'verifikasi' => 0

            ];

            //insert data atlet ke dalam tabel
            $this->db->insert('tbl_atlet', $data);

            //mengambil idAtlet terakhir
            $queryIdAtlet = $this->db->query('SELECT * FROM tbl_atlet ORDER BY idAtlet DESC LIMIT 1')->result_array();
            foreach ($queryIdAtlet as $k) {
                $x = $k["idAtlet"];
                $username = $k["username"];
            }

            $dataSekolah = [
                'jenjang' => $this->input->post('jenjang'),
                'namaSekolah' => $this->input->post('namaSekolah'),
                'idAtlet' => $x
            ];

            $this->db->insert('tbl_sekolahatlet', $dataSekolah);

            //input nomor pertandingan
            foreach ($this->input->post('nomorPertandingan[]') as $data) {
                $insert = [
                    'idAtlet' => $x,
                    'idNomorPertandingan' => $data
                ];

                $this->db->insert('tbl_nomorpertandinganatlet', $insert);
            }

            //upload dokumen
            $dokumen['upload_path'] = './assets/file/';
            $dokumen['allowed_types'] = 'pdf';
            $this->load->library('upload');
            $this->upload->initialize($dokumen);
            $this->upload->do_upload('akte');

            // $akte = "akte" . "_" . $this->upload->data('file_name') . "" . $x;
            // $dok = "dokumen" . "_" . $this->upload->data('file_name') . "" . $x;
            $akte = $this->upload->data('file_name');
            $this->upload->do_upload('dok');
            $dok = $this->upload->data('file_name');

            $insertDokumen = [
                'idAtlet' => $x,
                'akte' => $akte,
                'dok' => $dok
            ];

            $this->db->insert('tbl_dokumenatlet', $insertDokumen);


            //pesan
            redirect('Atlet/tampilUser');
        }
    }


    public function addAtletUser()
    {
        $data['nomorPertandingan'] = $this->db->get('tbl_nomorpertandingan')->result_array();
        $this->load->view('user/template/head');
        $this->load->view('user/template/topbar');
        $this->load->view('user/template/menu');
        $this->load->view('user/addAtlet', $data);
        $this->load->view('user/template/footer');
    }

    public function profileAtlet()
    {
        $idAtlet = $this->input->get('id');
        $data['detailAtlet'] = $this->db->get_where('tbl_atlet', ['idAtlet' => $idAtlet])->result_array();
        $data['sekolah'] = $this->db->get_where('tbl_sekolahAtlet', ['idAtlet' => $idAtlet])->result_array();
        $data['getNomorPertandinganById'] = $this->atlet->getNomorPertandinganById($idAtlet);
        $data['getDokumenById'] = $this->atlet->getDokumenById($idAtlet);
        $this->load->view('user/template/head');
        $this->load->view('user/template/topbar');
        $this->load->view('user/template/menu');
        $this->load->view('user/profileAtlet', $data);
        $this->load->view('user/template/footer');
    }

    public function editProsesUser()
    {
        $this->form_validation->set_rules('idAtlet', 'Atlet ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tmpLahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tglLahir', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == false) {
            //pesan

            redirect('Atlet/edit/' . $this->input->post('idAtlet'));
        } else {

            $data = [
                'namaAtlet' => $this->input->post('nama'),
                'tempatLahir' => $this->input->post('tmpLahir'),
                'tanggalLahir' => $this->input->post('tglLahir'),
                'alamatAtlet' => $this->input->post('alamatAtlet')

            ];
            $this->db->set($data);
            $this->db->where('idAtlet', $this->input->post('idAtlet'));
            $this->db->update('tbl_atlet');

            //pesan
            redirect('Atlet/profileAtlet?id=' . $this->input->post('idAtlet'));
        }
    }

    public function verfikasi()
    {
        $idAtlet = $this->input->post('idAtlet');
        $data = ['verifikasi' => 1];

        $this->db->set($data);
        $this->db->where('idAtlet', $idAtlet);
        $this->db->update('tbl_atlet');

        //pesan sukses
        redirect('Atlet/edit/' . $this->input->post('idAtlet'));
    }
}
