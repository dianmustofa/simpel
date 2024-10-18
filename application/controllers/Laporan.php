<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Monitoring_model");
		$this->load->model("Perencanaan_model");
		$this->load->model("Laporan_model");
	}

	public function index()
	{
		$laporan = $this->Laporan_model->load_laporan();
        $data['laporan'] = $laporan;

        $this->load->view('Laporan/laporan_tahunan_view', $data);
	}

}
