<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication');
        $this->load->model('Galeri');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = ['title' => 'Login'];

        $this->load->view('gallery/Auth/login', $data);
    }

    public function masuk()
    {
        $data = ['title' => 'SingUp'];
        $this->load->view('gallery/Auth/singup', $data);
    }

    public function loginAkun()
    {
        // Konfigurasi aturan validasi
        $this->form_validation->set_rules('Username', 'Username', 'trim|required');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, arahkan kembali ke halaman login
            $data['title'] = 'Login';
            $this->load->view('gallery/Auth/login', $data);
        } else {
            $user = $this->input->post('Username');
            $pass = $this->input->post('Password');
            $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

            if ($akun && password_verify($pass, $akun['Password'])) {
                $data_session = array(
                    'Username' => $akun['Username'],
                );

                $this->session->set_userdata($data_session);

                $name = $this->session->userdata('Username');
                $this->load->helper('cookie');
                $cookie = array(
                    'name' => 'user',
                    'value' => $name,
                    'expire' => '30000',
                    'secure' => TRUE,
                );

                $this->input->set_cookie($cookie);
                redirect('Home/index');
            } else {
                $this->session->set_flashdata('error', 'Username Atau Password Salah');
                $data['title'] = 'Login';
                $this->load->view('gallery/Auth/login', $data);
            }
        }
    }



    public function logoutAkun()
    {
        $user = $this->session->userdata('Username');

        $akun = $this->db->get_where('user', ['Username' => $user])->row_array();

        if ($akun) {
            $this->session->sess_destroy();
            redirect('Auth');
        } else {
            redirect('Auth');
        }
    }

    public function singup()
    {
        //konfigurasi aturan validasi
        $this->form_validation->set_rules('NamaLengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('Username', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, arahkan kembali ke halaman login
            $data = ['title' => 'SingUp'];
            $this->load->view('gallery/Auth/singup', $data);
        } else {


            $fullname = $this->input->post('NamaLengkap');
            $email = $this->input->post('Email');
            $name = $this->input->post('Username');
            $pass = $this->input->post('Password');
            $Alamat = $this->input->post('Alamat');

            $email_v = $this->db->get_where('user', ['Email' => $email])->row_array();
            $user_v = $this->db->get_where('user', ['Username' => $name])->row_array();

            if ($email_v) {

                $this->session->set_flashdata('mail', 'Email Telah Digunakan!');
                $data = ['title' => 'SingUp'];
                $this->load->view('gallery/Auth/singup', $data);
            } else {

                if ($user_v) {

                    $this->session->set_flashdata('user', 'Username Telah Digunakan!');
                    $data = ['title' => 'SingUp'];
                    $this->load->view('gallery/Auth/singup', $data);
                } else {

                    $data = [
                        'Username' => $name,
                        'Password' => password_hash($pass, PASSWORD_DEFAULT),
                        'Email' => $email,
                        'NamaLengkap' => $fullname,
                        'Alamat' => $Alamat,
                    ];

                    $this->Authentication->daftarUser($data, 'user');

                    $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($name)])->row_array();

                    $data = [
                        'NamaAlbum' => 'Album'.$name,
                        'Deskripsi' => 'Album Default'.$name,
                        'TanggalDibuat' => date('Y-m-d'),
                        'UserID' => $akun['UserID'],
                    ];

                    $this->Galeri->tambahAlbum($data, 'album');
                    redirect('./');
                }
            }
        }
    }
}
