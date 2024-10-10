<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Monitoring_model");
		$this->load->model("Perencanaan_model");
		$this->load->model("Monitoring_model");
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

	public function update($id) {
		// Cek apakah $id diberikan
		if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// Inisialisasi $data

			$data = array(
				'status_monitoring' => $this->input->post('status_monitoring'),
				'tanggal_realisasi_monitoring' => $this->input->post('tanggal_realisasi_monitoring'),
				'realisasi_monitoring' => $this->input->post('realisasi_monitoring'),
				'keterangan_monitoring' => $this->input->post('keterangan_monitoring'),
				'komentar_monitoring' => $this->input->post('komentar_monitoring'),
			);
			// Debug data yang diterima (opsional, untuk pengembangan)
			// var_dump($data);
			
			// Update data menggunakan model jika $data tidak kosong
			if (!empty($data)) {
				$this->Monitoring_model->update_monitoring($data, $id);
				
				// Redirect ke halaman usulan setelah update berhasil
				redirect('monitoring');
			} else {
				echo "Data tidak ditemukan atau tidak valid!";
			}
		} else {
			// Tampilkan pesan jika request bukan POST
			echo "Invalid Request";
		}
		
	}

}
