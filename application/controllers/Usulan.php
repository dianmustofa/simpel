<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Usulan_model");
		$this->load->model("Perencanaan_model");
	}

	public function index()
	{
		$usulan = $this->Usulan_model->load_usulan();
        $data['usulan'] = $usulan;

        $this->load->view('Kegiatan/Usulan/usulan_view', $data);
	}

	public function usulan_review($id)
	{    
    	$level_status_usulan = $this->Perencanaan_model->level_status_usulan();
		$data["level_status_usulan"] = $level_status_usulan;

        $data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

    	$this->load->view('Kegiatan/Usulan/usulan_review_view', $data);
	}

}
