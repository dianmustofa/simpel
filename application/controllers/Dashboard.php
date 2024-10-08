<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model("Dashboard_model");
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
		$data['ajuan'] = $this->Dashboard_model->load_ajuan();
		$data['akun'] = $this->Dashboard_model->load_akun();
		$data['usulan'] = $this->Dashboard_model->load_usulan();
		$data['monitor'] = $this->Dashboard_model->load_monitor();
		// statistik
		$data['statistik'] = $this->Dashboard_model->load_statistik();

		$this->load->view('Dashboard/dashboard_view', $data);
	}

	public function tentang()
	{
		$this->load->view('Tentang/tentang_view');
	}

	public function literasi()
	{
		$this->load->view('Literasi/literasi_view');
	}

	public function user()
	{
		$akun = $this->Dashboard_model->load_akun();
        $data['akun'] = $akun;

		$this->load->view('User/user_view', $data);
	}

}
