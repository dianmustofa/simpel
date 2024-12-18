<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model("Home_model");
		$this->load->model("Perencanaan_model");
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	// public function index()
	// {
	// 	$this->load->library('pagination'); // Load library pagination

	// 	$keyword = $this->input->get('search');

	// 	// Konfigurasi pagination
	// 	$config['base_url'] = base_url('home/index'); // Ganti 'controller' dengan nama controller kamu
	// 	$config['total_rows'] = $this->Home_model->countAllAjuan($keyword); // Fungsi untuk menghitung semua data
	// 	$config['per_page'] = 8; // Jumlah data per halaman
	// 	$config['uri_segment'] = 3; // Posisi segment untuk pagination (sesuaikan dengan struktur URL)
		
	// 	// Styling pagination
	// 	$config['full_tag_open'] = '<nav><ul class="pagination">';
	// 	$config['full_tag_close'] = '</ul></nav>';
	// 	$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
	// 	$config['num_tag_close'] = '</span></li>';
	// 	$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
	// 	$config['cur_tag_close'] = '</span></li>';
	// 	$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
	// 	$config['next_tag_close'] = '</span></li>';
	// 	$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
	// 	$config['prev_tag_close'] = '</span></li>';
	// 	$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
	// 	$config['first_tag_close'] = '</span></li>';
	// 	$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
	// 	$config['last_tag_close'] = '</span></li>';

	// 	$this->pagination->initialize($config); // Inisialisasi pagination
    
    // 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    //     // // Jika ada kata kunci, lakukan pencarian, jika tidak tampilkan semua data
    //     // if ($keyword) {
    //     //     $data['ajuan'] = $this->Home_model->searchAjuan($keyword);
    //     // } else {
    //     //     $data['ajuan'] = $this->Home_model->getAllAjuan();
    //     // }

	// 	// Ambil data dari model
	// 	if ($keyword) {
	// 		$data['ajuan'] = $this->Home_model->searchAjuan($keyword, $config['per_page'], $page);
	// 	} else {
	// 		$data['ajuan'] = $this->Home_model->getAllAjuan($config['per_page'], $page);
	// 	}

	// 	$data['pagination'] = $this->pagination->create_links(); // Buat link pagination
		
	// 	// $ajuan = $this->Home_model->load_ajuan();
    //     // $data['ajuan'] = $ajuan;

    //     $this->load->view('home_view', $data);
	// }


	public function index()
	{
		$this->load->library('pagination'); // Load library pagination

		$keyword = $this->input->get('search', TRUE); // Kata kunci pencarian
		$kelurahan = $this->input->get('kelurahan', TRUE); // Filter kelurahan
		$rw = $this->input->get('rw', TRUE); // Filter RW
		$rt = $this->input->get('rt', TRUE); // Filter RT
		$year = $this->input->get('year', TRUE); // Filter Tahun

		// Konfigurasi pagination
		$config['base_url'] = base_url('home/index');
		$config['total_rows'] = $this->Home_model->countAllAjuan($keyword, $kelurahan, $rw, $rt); // Menghitung total data berdasarkan filter
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;

		// Styling pagination
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';

		$this->pagination->initialize($config); // Inisialisasi pagination

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$level_kelurahan = $this->Perencanaan_model->level_kelurahan();
		$data["level_kelurahan"] = $level_kelurahan;
        $level_angka = $this->Perencanaan_model->level_angka();
		$data["level_angka"] = $level_angka;
		$level_year = $this->Perencanaan_model->getAvailableYears(); // Mendapatkan daftar tahun yang tersedia
    	$data["level_year"] = $level_year;

		// Ambil data dari model berdasarkan search dan filter
		if ($keyword || $kelurahan || $rw || $rt || $year) {
			$data['ajuan'] = $this->Home_model->searchAjuan($keyword, $kelurahan, $rw, $rt, $year, $config['per_page'], $page);
		} else {
			$data['ajuan'] = $this->Home_model->getAllAjuan($config['per_page'], $page);
		}

		$data['pagination'] = $this->pagination->create_links(); // Buat link pagination

		$this->load->view('home_view', $data);
	}

	public function details($id)
	{    

        $data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();
		
		// Ambil status isu dan usulan dari array review_isu
		$data['status_isu'] = $data['review_isu']['status_isu']; 
		$data['status_usulan'] = $data['review_isu']['status_usulan'];
		$data['title_opd'] = $data['review_isu']['title_opd'];

    	$this->load->view('home_detail_view', $data);
	}

}
