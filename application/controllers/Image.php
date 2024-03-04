<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('Galeri');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        $user = $this->session->userdata('Username');
        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

        $data = [
            'title' => 'Tambah',
            'albums' => $this->Galeri->MyAlbums($akun['UserID'])->result()
        ];
        $this->load->view('gallery/tambah/tambah', $data);
    }

    public function EditImage($FotoID)
    {
        $user = $this->session->userdata('Username');
        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();
    
        $data = [
            'title' => 'Tambah',
            'albums' => $this->Galeri->MyAlbums($akun['UserID'])->result(),
            'foto' => $this->Galeri->ImagesByID($FotoID)
        ];
        // Load view untuk menampilkan halaman edit
        $this->load->view('gallery/tambah/edit', $data);
    }



    public function tambahAlbum()
    {
        $data = ['title' => 'Tambah Album'];
        $this->load->view('gallery/tambah/tambahalbum', $data);
    }

    public function addAlbum()
    {
        $judul = $this->input->post('Judul');
        $deskrpisi = $this->input->post('Deskpripsi');
        $tanggal = $this->input->post('tanggalBuat');
        $user = $this->input->post('user');

        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

        $data = [
            'NamaAlbum' => $judul,
            'Deskripsi' => $deskrpisi,
            'TanggalDibuat' => $tanggal,
            'UserID' => $akun['UserID'],
        ];

        $this->Galeri->tambahAlbum($data, 'album');
        redirect('Home/album');
    }

    public function addImage()
    {
        $judul = $this->input->post('JudulFoto');
        $deskrpisi = $this->input->post('DeskripsiFoto');
        $tanggal = $this->input->post('TanggalUnggah');
        $album = $this->input->post('album');
        $user = $this->input->post('user');

        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

        $config['upload_path'] = FCPATH . 'dist/img/gambar/';
        $config['allowed_types'] = 'png|jpg|webp';
        $config['max_size'] = 100048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('LokasiFile')) {
            // Jika upload gagal, tampilkan pesan kesalahan
            $user1 = $this->session->userdata('Username');
            $akun1 = $this->db->get_where('user', ['Username' => $this->db->escape_str($user1)])->row_array();

            $data = [
                'title' => 'Tambah',
                'albums' => $this->Galeri->MyAlbums($akun1['UserID'])->result(),
                'error' => $this->upload->display_errors()
            ];
            $this->load->view('gallery/tambah/tambah', $data);
        } else {
            // Jika upload berhasil, lakukan sesuatu (simpan data ke database, dll.)
            $gambar = $this->upload->data();
            $data = [
                'JudulFoto' => $judul,
                'DeskripsiFoto' => $deskrpisi,
                'TanggalUnggah' => $tanggal,
                'LokasiFile' => $gambar['file_name'],
                'AlbumID' => $album,
                'UserID' => $akun['UserID'],
            ];

            $this->Galeri->tambahImage($data, 'foto');
            redirect('Home');
        }
    }

    public function ubahImage($FotoID){
        $judul = $this->input->post('JudulFoto');
        $deskrpisi = $this->input->post('DeskripsiFoto');
        $tanggal = $this->input->post('TanggalUnggah');
        $album = $this->input->post('album');
        $user = $this->input->post('user');

        $akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();

        $config['upload_path'] = FCPATH . 'dist/img/gambar/';
        $config['allowed_types'] = 'png|jpg|webp|gif|jpeg';
        $config['max_size'] = 1000048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('LokasiFile')) {
            // Jika upload gagal, tampilkan pesan kesalahan
            $data = [
                'title' => 'Tambah',
                'albums' => $this->Galeri->MyAlbums($akun['UserID'])->result(),
                'foto' => $this->Galeri->ImagesByID($FotoID),
                'error' => $this->upload->display_errors()
            ];
            $this->load->view('gallery/tambah/edit', $data);
        } else {
            // Jika upload berhasil, lakukan sesuatu (simpan data ke database, dll.)
            $gambar = $this->upload->data();
            $data = [
                'JudulFoto' => $judul,
                'DeskripsiFoto' => $deskrpisi,
                'TanggalUnggah' => $tanggal,
                'LokasiFile' => $gambar['file_name'],
                'AlbumID' => $album,
                'UserID' => $akun['UserID'],
            ];

            $this->Galeri->ubahImage($data, 'foto', $FotoID);
            redirect('Home');
        }
    }

    public function deleteImage()
    {
        $FotoID = $this->input->get('FotoID');
        $this->db->query("DELETE FROM foto WHERE FotoID = $FotoID");
        redirect('Home');
    }
}
