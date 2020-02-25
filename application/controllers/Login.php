<?php
defined('BASEPATH') or exit('No direct script allowed');

class Login extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('datafingerprint');
        date_default_timezone_set("Asia/Bangkok");
        $cekKoneksi = $this->datafingerprint->cekKoneksi();
        $time = time();
        $ds = '%Y-%m-%d';
        $tanggal = mdate($ds, $time) . "%";
        if ($cekKoneksi == '1') {
            $this->session->set_flashdata('koneksi_finger', '1');
            $this->datafingerprint->getData($tanggal);
        } else {
            $this->session->set_flashdata('koneksi_finger', '2');
        }
        $this->load->model('MNotifikasi', 'notifikasi');
        $d = '%Y-%m';
        $tgl = mdate($d, $time) . "%";
        $countNotifikasi = $this->notifikasi->countNotifikasi($tgl);
        $this->session->set_userdata('jumlahNotifikasi', $countNotifikasi);
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Page";
            $this->load->view('templates/headLogin');
            $this->load->view('login/Login');
            $this->load->view('templates/footerLogin');
        } else {
            $this->_login(); // menuju method private bernama login
        }
    }

    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //mengecek apakah user terdaftar atau tidak
        $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        //jika user ada
        if ($user) {
            //jika user aktif
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'idUser' => $user['idUser'],
                    'foto' => $user['foto']
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               wrong password!
               </div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               username tidak terdaftar
               </div>');
            redirect('Login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //cek apakah sudah klik daftarkan akun atau belum
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftarkan Akun Baru';
            $this->load->view('templates/headLogin');
            $this->load->view('login/register');
            $this->load->view('templates/footerLogin');
        } else {
            //jika sudah di isi form nya
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'status' => '1'
            ];
            $this->db->insert('tbl_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun Anda Telah Terdaftarkan.
          </div>');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah logout!
      </div>');
        redirect('Login');
    }
}