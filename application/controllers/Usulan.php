<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Usulan_model");
	}

	public function index()
	{
		$usulan = $this->Usulan_model->load_usulan();
        $data['usulan'] = $usulan;

        $this->load->view('Kegiatan/usulan_view', $data);
	}

}
