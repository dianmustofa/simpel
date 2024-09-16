<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model("Home_model");
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
	public function index()
	{
		$keyword = $this->input->get('search');

        // Jika ada kata kunci, lakukan pencarian, jika tidak tampilkan semua data
        if ($keyword) {
            $data['ajuan'] = $this->Home_model->searchAjuan($keyword);
        } else {
            $data['ajuan'] = $this->Home_model->getAllAjuan();
        }
		
		// $ajuan = $this->Home_model->load_ajuan();
        // $data['ajuan'] = $ajuan;

        $this->load->view('home_view', $data);
	}

}
