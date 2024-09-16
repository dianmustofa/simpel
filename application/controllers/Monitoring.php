<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Monitoring_model");
	}

	public function index()
	{
		$monitoring = $this->Monitoring_model->load_monitoring();
        $data['monitoring'] = $monitoring;

        $this->load->view('Kegiatan/monitoring_view', $data);
	}

}
