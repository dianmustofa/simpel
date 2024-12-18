<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Usulan_model");
		$this->load->model("Perencanaan_model");
		$this->load->library('upload');
	}

	public function index()
	{
		$usulan = $this->Usulan_model->load_usulan();
        $data['usulan'] = $usulan;

        $this->load->view('Kegiatan/Usulan/usulan_view', $data);
	}

	public function download($filename) {
        $filepath = FCPATH . 'uploads/documents' . $filename; // Folder tempat file berada
        
        // Cek apakah file ada
        if (file_exists($filepath)) {
            // Unduh file
            force_download($filepath, NULL);
        } else {
            // Tampilkan pesan error jika file tidak ditemukan
            show_404();
        }
    }

	public function verifikasi()
	{
		$usulanVerifikasi = $this->Usulan_model->load_verifikasi();
        $data['verifikasi'] = $usulanVerifikasi;

        $this->load->view('Kegiatan/Verifikasi/verifikasi_view', $data);
	}

	public function edit($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['edit_usulan'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

		$level_instansi = $this->Perencanaan_model->level_instansi();
		$data["level_instansi"] = $level_instansi;
		$level_status_usulan = $this->Perencanaan_model->level_status_usulan();
		$data["level_status_usulan"] = $level_status_usulan;
		$level_sumber_pendanaan = $this->Perencanaan_model->level_sumber_pendanaan();
		$data["level_sumber_pendanaan"] = $level_sumber_pendanaan;
		$level_pekerjaan = $this->Perencanaan_model->level_pekerjaan();
		$data["level_pekerjaan"] = $level_pekerjaan;

    	$this->load->view('Kegiatan/Usulan/usulan_edit_view', $data);
	}

	public function verifikasi_edit($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['edit_verifikasi'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

		$level_instansi = $this->Perencanaan_model->level_instansi();
		$data["level_instansi"] = $level_instansi;
		$level_status_usulan = $this->Perencanaan_model->level_status_usulan();
		$data["level_status_usulan"] = $level_status_usulan;
		$level_sumber_pendanaan = $this->Perencanaan_model->level_sumber_pendanaan();
		$data["level_sumber_pendanaan"] = $level_sumber_pendanaan;

    	$this->load->view('Kegiatan/Verifikasi/verifikasi_edit_view', $data);
	}

	public function update($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load

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
					'title_jenis' => $this->input->post('title_jenis'),
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
	
		// // Ambil data dari form
		// $data = array(
		// 	'sumber_pendanaan_usulan' => $this->input->post('sumber_pendanaan_usulan'),
		// 	'indikasi_tahun_pelaksana_usulan' => $this->input->post('indikasi_tahun_pelaksana_usulan'),
		// 	'status_usulan' => $this->input->post('status_usulan'),
		// 	'komentar_usulan' => $this->input->post('komentar_usulan'),
		// );
	
		// // Simpan data yang di-update ke database
		// $this->Perencanaan_model->update_usulan($data, $id);
	
		// // Redirect ke halaman lain dengan pesan sukses
		// $this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		// redirect('usulan');
	}

	public function verifikasi_update($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'rencana_anggaran' => $this->input->post('rencana_anggaran'),
		);
	
		// Konfigurasi upload dokumen
		if (!empty($_FILES['document_ded']['name'])) {
			$config['upload_path'] = './uploads/documents/';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['file_name'] = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $_FILES['document_ded']['name']);
			$config['max_size'] = 10000; // Batasan ukuran file 10MB
			
			// Inisialisasi konfigurasi
			$this->upload->initialize($config);
	
			if ($this->upload->do_upload('document_ded')) {
				$document_data = $this->upload->data();
				$data['document_ded'] = $document_data['file_name'];
	
				// Hapus dokumen lama jika ada (dari database atau path file)
				$old_document = $this->Perencanaan_model->get_isu_id($id)->document_ded;
				if (!empty($old_document) && file_exists('./uploads/documents/' . $old_document)) {
					unlink('./uploads/documents/' . $old_document);
				}
			} else {
				// Tangani error upload dengan menyimpan pesan error ke flashdata atau tampilkan di view
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('verifikasi/edit/' . $id);
				return;
			}
		}
	
		// Simpan data yang di-update ke database
		$this->Perencanaan_model->update_verifikasi($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('verifikasi-usulan');
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

	public function verifikasi_review($id)
	{    
    	$level_instansi = $this->Perencanaan_model->level_instansi();
		$data["level_instansi"] = $level_instansi;
		$level_status_usulan = $this->Perencanaan_model->level_status_usulan();
		$data["level_status_usulan"] = $level_status_usulan;
		$level_sumber_pendanaan = $this->Perencanaan_model->level_sumber_pendanaan();
		$data["level_sumber_pendanaan"] = $level_sumber_pendanaan;

        $data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

    	$this->load->view('Kegiatan/Verifikasi/verifikasi_review_view', $data);
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
					'title_jenis' => $this->input->post('title_jenis'),
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


	public function simpan_verifikasi($id = null) {

		// Load helper untuk upload
        $this->load->helper(array('form', 'url'));

		// Konfigurasi upload dokumen
        $config['upload_path'] = './uploads/documents/';
        $config['allowed_types'] = 'pdf|doc|docx';
		$config['file_name'] = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/','', $_FILES['document_ded']['name']);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('document_ded')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error
            echo $error['error'];
            return;
        } else {
            $document_ded_data = $this->upload->data();
        }

		// $config['upload_path'] = './uploads/documents/';
        // $config['allowed_types'] = 'pdf|doc|docx';
		// $config['file_name'] = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/','', $_FILES['document_ba']['name']);
        // $this->upload->initialize($config);

		// if (!$this->upload->do_upload('document_ba')) {
        //     $error = array('error' => $this->upload->display_errors());
        //     // Handle error
        //     echo $error['error'];
        //     return;
        // } else {
        //     $document_ba_data = $this->upload->data();
        // }

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
					'document_ded' => $document_ded_data['file_name'],
					// 'document_ba' => $document_ba_data['file_name'],
					'rencana_anggaran' => $this->input->post('rencana_anggaran'),
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
				redirect('verifikasi-usulan');
			} else {
				echo "Data tidak ditemukan atau tidak valid!";
			}
		} else {
			// Tampilkan pesan jika request bukan POST
			echo "Invalid Request";
		}
	}
	
	

}
