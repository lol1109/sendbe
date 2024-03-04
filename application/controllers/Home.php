<?php
defined('BASEPATH') or exit('No direct script access allowed');

use CodeIgniter\Pager\Pager;

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Galeri');
		$this->load->library('pagination');
	}

	public function index()
	{
		$config['base_url'] = base_url('Home/index'); // Sesuaikan dengan URL controller Anda
		$config['total_rows'] = $this->Galeri->Images()->num_rows(); // Jumlah total data
		$config['per_page'] = 6; // Jumlah data per halaman
		$config['full_tag_open'] = '<ul class="pagination ms-auto">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);

		$offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$images = $this->Galeri->getImagesWithLimit($config['per_page'], $offset);

		$user = $this->session->userdata('Username');

		$akun = $this->db->get_where('user', ['Username' => $user])->row_array();

		$likesData = [];
		$komentarData = [];

		foreach ($images as $image) {
			$likesData[$image->FotoID] = $this->Galeri->getLikesByFotoID($image->FotoID);
			$komentarData[$image->FotoID] = $this->Galeri->getKomenByFotoID($image->FotoID);
			$likeAkun[$image->FotoID] = $this->Galeri->getLikesByUserID($akun['UserID'], $image->FotoID);
		}

		$data = [
			'title' => 'Gusty',
			'Images' => $images,
			'ImagesData' => $this->Galeri->Images()->num_rows(),
			'likesData' => $likesData,
			'komentarData' => $komentarData,
			'pager' => $this->pagination->create_links(),
		];

		$this->load->view('gallery/Home/index', $data);
	}

	public function kategori()
	{
		$data = ['title' => 'Kategori'];
		$this->load->view('gallery/Home/category', $data);
	}

	public function users()
	{
		$data = [
			'title' => 'Users',
			'users' => $this->Galeri->users()->result(),
		];
		$this->load->view('gallery/Home/users', $data);
	}

	public function Album()
	{
		$data = [
			'title' => 'Album',
			'albums' => $this->Galeri->Albums()->result()
		];
		$this->load->view('gallery/Home/album', $data);
	}

	public function profile(){
		$user = $this->session->userdata('Username');
		$akun = $this->db->get_where('user', ['Username' => $user])->row_array();

		$images = $this->Galeri->ImagesByUserID($akun['UserID']);
		$likesData = [];
		$komentarData = [];

		foreach ($images as $image) {
			$likesData[$image->FotoID] = $this->Galeri->getLikesByFotoID($image->FotoID);
			$komentarData[$image->FotoID] = $this->Galeri->getKomenByFotoID($image->FotoID);
		}

		$data = [
			'title' => 'Profile',
			'albums' => $this->Galeri->MyAlbums($akun['UserID'])->result(),
			'Images' => $images,
			'likesData' => $likesData,
			'komentarData' => $komentarData,
		];
		$this->load->view('gallery/Home/profile', $data);
	}

	public function like()
	{
		$photoId = $this->input->post('photoId');
		$userId = $this->input->post('userId');
		$tanggal = $this->input->post('tanggal');

		$akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($userId)])->row_array();

		$like = $this->db->get_where('likefoto', [
			'UserID' => $akun['UserID'],
			'FotoID' => $photoId,
		])->row_array();


		if ($like) {
			$dataToBeDeleted = array(
				'FotoID' => $photoId,
				'UserID' => $akun['UserID']
			);

			$this->Galeri->hapusLike($dataToBeDeleted['UserID'], $dataToBeDeleted['FotoID']);

			$likesData = $this->Galeri->getLikesByFotoID($photoId);

			$likeAkun = $this->Galeri->getLikesByUserID($akun['UserID'], $photoId);

			// Berikan respons (response) ke klien (browser)
			$response = array(
				'status' => 'success',
				'message' => 'Photo liked deleted',
				'likes' => count($likesData),
				'likeAkun' => $likeAkun
			);

			echo json_encode($response);
		} else {
			$data = [
				'FotoID' => $photoId,
				'UserID' => $akun['UserID'],
				'TanggalLike' => $tanggal
			];

			//menambahkan like dari user ke database
			$this->Galeri->tambahLike($data, 'likefoto');

			$likesData = $this->Galeri->getLikesByFotoID($photoId);
			$likeAkun = $this->Galeri->getLikesByUserID($akun['UserID'], $photoId);

			// Berikan respons (response) ke klien (browser)
			$response = array(
				'status' => 'success',
				'message' => 'Photo liked successfully',
				'likes' => count($likesData),
				'likeAkun' => $likeAkun
			);

			echo json_encode($response);
		}
	}

	public function komen()
	{
		$photoId = $this->input->post('PhotoId');
		$user = $this->input->post('user');
		$tanggal = $this->input->post('TanggalUnggah');
		$comentar = $this->input->post('komen');

		$akun = $this->db->get_where('user', ['Username' => $this->db->escape_str($user)])->row_array();
		if (!$comentar) {
			//nothing
		} else {
			$data = [
				'FotoID' => $photoId,
				'UserID' => $akun['UserID'],
				'IsiKomentar' => $comentar,
				'TanggalKomentar' => $tanggal,

			];

			$this->Galeri->tambahKomen($data, 'komentarfoto');
			redirect('home');
		}
	}

	public function komentar()
	{
		$fotoID = $this->input->get('FotoID');
		// Lakukan query untuk mendapatkan komentar berdasarkan FotoID
		$komentarData = $this->Galeri->getKomenByFotoID($fotoID);

		$response = array(
			'komentar' => $komentarData
		);

		// Kembalikan data dalam format JSON
		echo json_encode($response);
	}

	public function searchImages()
	{
		$searchQuery = $this->input->get('searchQuery');

		// Lakukan pencarian gambar berdasarkan nama (Anda perlu menyesuaikan bagian ini sesuai kebutuhan)
		$searchResult = $this->Galeri->searchImagesByName($searchQuery);

		$likesData = [];
		$komentarData = [];

		foreach ($searchResult as $image) {
			$likesData[$image->FotoID] = count($this->Galeri->getLikesByFotoID($image->FotoID));
			$komentarData[$image->FotoID] = count($this->Galeri->getKomenByFotoID($image->FotoID));
		}

		$data = [
			'imagesData' => count($searchResult),
			'searchData' => $searchResult,
			'likesData' => $likesData,
			'komenData' => $komentarData,
		];

		// Kirim hasil pencarian sebagai respons JSON
		echo json_encode($data);
	}
}
