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

	public function verifikasi()
	{
		$usulanVerifikasi = $this->Usulan_model->load_verifikasi();
        $data['verifikasi'] = $usulanVerifikasi;

        $this->load->view('Kegiatan/Verifikasi/verifikasi_view', $data);
	}

	public function update_setuju_ajax() {
		// Ambil data yang dikirimkan via AJAX
		$idIsu = $this->input->post('id_isu');
		$setuju = $this->input->post('setuju');
	
		// Siapkan data untuk update
		$data = array(
			'setuju' => $setuju
		);
	
		// Update status 'setuju' di database
		$this->db->where('id_isu', $idIsu);
		$this->db->update('tbl_perencanaan', $data);
	
		// Kirim response kembali ke AJAX
		echo json_encode(['status' => 'success']);
	}

	public function verifikasi_detail($id)
	{
		// $usulan = $this->Usulan_model->load_usulan();
        // $data['usulan'] = $usulan;

		$level_status_isu = $this->Perencanaan_model->level_status_isu();
		$data["level_status_isu"] = $level_status_isu;
		$level_status_usulan = $this->Perencanaan_model->level_status_usulan();
		$data["level_status_usulan"] = $level_status_usulan;

        $data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

        $this->load->view('Kegiatan/Verifikasi/verifikasi_detail_view', $data);
	}

	public function usulan_review($id)
	{    
    	$level_instansi = $this->Perencanaan_model->level_instansi();
		$data["level_instansi"] = $level_instansi;
		$level_status_usulan = $this->Perencanaan_model->level_status_usulan();
		$data["level_status_usulan"] = $level_status_usulan;
		$level_sumber_pendanaan = $this->Perencanaan_model->level_sumber_pendanaan();
		$data["level_sumber_pendanaan"] = $level_sumber_pendanaan;

        $data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

    	$this->load->view('Kegiatan/Usulan/usulan_review_view', $data);
	}

	public function simpan($id = null) {
		// Cek apakah $id diberikan
		if ($id === null) {
			echo "ID tidak ada!";
			return;
		}
		
		// Cek apakah request method adalah POST
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// Inisialisasi $data
			$data = array();
			
			// Ambil data dari form sesuai dengan level akun
			if ($this->session->userdata('id_level_akun') === '3') {
				$data = array(
					'sumber_pendanaan_usulan' => $this->input->post('sumber_pendanaan_usulan'),
					'indikasi_tahun_pelaksana_usulan' => $this->input->post('indikasi_tahun_pelaksana_usulan'),
					'status_usulan' => $this->input->post('status_usulan'),
					'komentar_usulan' => $this->input->post('komentar_usulan'),
				);
			} elseif ($this->session->userdata('id_level_akun') === '4') {
				$data = array(
					// Masukkan data yang relevan untuk level akun 4
					'manfaat_tujuan_usulan' => $this->input->post('manfaat_tujuan_usulan'),
					'indikasi_program_usulan' => $this->input->post('indikasi_program_usulan'),
					'program_usulan' => $this->input->post('program_usulan'),
					'title_opd' => $this->input->post('title_opd'),
				);
			} else {
				// Tangani kasus jika level akun tidak sesuai
				echo "Level akun tidak valid!";
				return;
			}
			
			// Debug data yang diterima (opsional, untuk pengembangan)
			// var_dump($data);
			
			// Update data menggunakan model jika $data tidak kosong
			if (!empty($data)) {
				$this->Perencanaan_model->update_usulan($data, $id);
				
				// Redirect ke halaman usulan setelah update berhasil
				redirect('usulan');
			} else {
				echo "Data tidak ditemukan atau tidak valid!";
			}
		} else {
			// Tampilkan pesan jika request bukan POST
			echo "Invalid Request";
		}
	}
	
	

}
