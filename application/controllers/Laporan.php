<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Laporan_model");
		$this->load->model("Perencanaan_model");
		$this->load->library('upload');
	}

	public function index()
	{
		$laporan = $this->Laporan_model->load_laporan();
        $data['laporan'] = $laporan;
		$level_kelurahan = $this->Perencanaan_model->level_kelurahan();
		$data["level_kelurahan"] = $level_kelurahan;

        $this->load->view('Laporan/laporan_tahunan_view', $data);
	}

	public function simpan() {

        // Load helper untuk upload
        $this->load->helper(array('form', 'url'));

        // Konfigurasi upload dokumen
        $config['upload_path'] = './uploads/documents/';
        $config['allowed_types'] = 'pdf';
		// $config['allowed_types'] = 'pdf|doc|docx';
        $config['file_name'] = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/','', $_FILES['document_laporan']['name']);
		$config['max_size'] = 10000; // Batasan ukuran file 10MB
        $this->upload->initialize($config);
		

        if (!$this->upload->do_upload('document_laporan')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error
            echo $error['error'];
            return;
        } else {
            $document_data = $this->upload->data();
        }

        // Ambil data dari form
        $data = array(
            'id_akun' => $this->session->userdata('id_akun'),
            'title_laporan' => $this->input->post('title_laporan'),
			'kelurahan_laporan' => $this->input->post('kelurahan_laporan'),
            'tahun_laporan' => $this->input->post('tahun_laporan'),
			// 'document_laporan' => $this->input->post('document_laporan'),
            'document_laporan' => $document_data['file_name'],
        );

        // Simpan ke database
        $this->Laporan_model->simpan_laporan($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('laporan-tahunan');
    }

	public function edit($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_laporan'] = $this->Laporan_model->get_laporan_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Laporan_model->update_laporan($this->input->post(), $id);
            redirect("laporan-tahunan");
        }

		$level_kelurahan = $this->Perencanaan_model->level_kelurahan();
		$data["level_kelurahan"] = $level_kelurahan;

    	$this->load->view('Laporan/laporan_edit_view', $data);
	}


	public function update($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'id_akun' => $this->session->userdata('id_akun'),
			'title_laporan' => $this->input->post('title_laporan'),
			'kelurahan_laporan' => $this->input->post('kelurahan_laporan'),
			'tahun_laporan' => $this->input->post('tahun_laporan'),
		);
	
		// Konfigurasi upload dokumen
		if (!empty($_FILES['document_laporan']['name'])) {
			$config['upload_path'] = './uploads/documents/';
			$config['allowed_types'] = 'pdf';
			// $config['allowed_types'] = 'pdf|doc|docx';
			$config['file_name'] = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $_FILES['document_laporan']['name']);
			$config['max_size'] = 10000; // Batasan ukuran file 10MB
			
			// Inisialisasi konfigurasi
			$this->upload->initialize($config);
	
			if ($this->upload->do_upload('document_laporan')) {
				$document_data = $this->upload->data();
				$data['document_laporan'] = $document_data['file_name'];
	
				// Hapus dokumen lama jika ada (dari database atau path file)
				$old_document = $this->Laporan_model->get_laporan_id($id)->document_laporan;
				if (!empty($old_document) && file_exists('./uploads/documents/' . $old_document)) {
					unlink('./uploads/documents/' . $old_document);
				}
			} else {
				// Tangani error upload dengan menyimpan pesan error ke flashdata atau tampilkan di view
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', $error);
				redirect('laporan/edit/' . $id);
				return;
			}
		}
	
		// Simpan data yang di-update ke database
		$this->Laporan_model->update_laporan($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('laporan-tahunan');
	}
	

	public function delete($id) {
        // Load model
        $this->load->model('Laporan_model');

        // Soft delete berdasarkan ID
        $this->Laporan_model->soft_delete($id);

        // Redirect atau beri notifikasi
        redirect('laporan-tahunan');
    }

}
