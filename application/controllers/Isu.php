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

        // Upload multiple files
        $uploaded_files = $this->upload_files('formFileMultiple');

        if ($uploaded_files) {
            $data['nama_file'] = json_encode($uploaded_files); // Simpan sebagai JSON
        }

        // Simpan ke database
        $this->Isu_model->simpan_isu($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('isu');
    }

    private function upload_files($input_name) {
        $this->load->library('upload');
        $files = $_FILES[$input_name];
        $file_count = count($files['name']);
        $uploaded_files = array();
    
        for ($i = 0; $i < $file_count; $i++) {
            if (!empty($files['name'][$i])) {
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];
    
                $config['upload_path'] = './uploads/'; // Folder upload
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx'; // Tipe file yang diizinkan
                $config['max_size'] = 2048; // Ukuran maksimal file 2MB
                $config['file_name'] = time() . '_' . $i; // Nama file
    
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('file')) {
                    $uploaded_files[] = $this->upload->data('file_name');
                } else {
                    // Jika file tidak sesuai format, simpan pesan error
                    $error_messages[] = $this->upload->display_errors();
                }
            }
        }

        // Jika ada error, simpan ke flashdata untuk ditampilkan di view
        if (!empty($error_messages)) {
            $this->session->set_flashdata('upload_errors', implode(', ', $error_messages));
        }
    
        return $uploaded_files;
    }

}
