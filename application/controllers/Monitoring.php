<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Monitoring_model");
		$this->load->model("Perencanaan_model");
	}

	public function index()
	{
		$monitoring = $this->Monitoring_model->load_monitoring();
        $data['monitoring'] = $monitoring;

        $this->load->view('Kegiatan/Monitoring/monitoring_view', $data);
	}

	public function monitoring_review($id)
	{    
    	$level_status_isu = $this->Perencanaan_model->level_status_isu();
		$data["level_status_isu"] = $level_status_isu;
		$level_status_usulan = $this->Perencanaan_model->level_status_usulan();
		$data["level_status_usulan"] = $level_status_usulan;

        $data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

    	$this->load->view('Kegiatan/Monitoring/monitoring_review_view', $data);
	}

}
