<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Isu extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Isu_model");
	}

	public function index()
	{
		$isu = $this->Isu_model->load_isu();
        $data['isu'] = $isu;

        $this->load->view('Isu/isu_view', $data);
	}

	public function simpan() {
        // Ambil data dari form
        $data = array(
            'title_isu' => $this->input->post('title_isu'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude')
        );

        // Simpan ke database
        $this->Isu_model->simpan_isu($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('isu');
    }

}
