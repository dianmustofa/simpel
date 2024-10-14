<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perencanaan extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Perencanaan_model");
	}

	public function isu()
	{
        if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login' . $id);
		}

        // Mengambil data option select dari model
        $level_aspek = $this->Perencanaan_model->level_aspek();
		$data["level_aspek"] = $level_aspek;
		$level_isu = $this->Perencanaan_model->level_isu();
		$data["level_isu"] = $level_isu;
        $level_kategori = $this->Perencanaan_model->level_kategori();
		$data["level_kategori"] = $level_kategori;
        $level_jenis = $this->Perencanaan_model->level_jenis();
		$data["level_jenis"] = $level_jenis;
        $level_kelurahan = $this->Perencanaan_model->level_kelurahan();
		$data["level_kelurahan"] = $level_kelurahan;
        $level_angka = $this->Perencanaan_model->level_angka();
		$data["level_angka"] = $level_angka;
        $level_pekerjaan = $this->Perencanaan_model->level_pekerjaan();
		$data["level_pekerjaan"] = $level_pekerjaan;
        $level_aset_lahan = $this->Perencanaan_model->level_aset_lahan();
		$data["level_aset_lahan"] = $level_aset_lahan;
        $level_instansi = $this->Perencanaan_model->level_instansi();
		$data["level_instansi"] = $level_instansi;

        if ($this->session->userdata('id_level_akun') === '1'){
            $isu = $this->Perencanaan_model->load_perencanaan_akun();
            $data['isu'] = $isu;
        } elseif (in_array($this->session->userdata('id_level_akun'), [2, 4])) {
            $isu = $this->Perencanaan_model->load_perencanaan_all();
            $data['isu'] = $isu;
        }
		

        $this->load->view('Isu/isu_view', $data);
	}

    public function isu_review($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $level_status_isu = $this->Perencanaan_model->level_status_isu();
		$data["level_status_isu"] = $level_status_isu;
        $level_instansi = $this->Perencanaan_model->level_instansi();
		$data["level_instansi"] = $level_instansi;

        $data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Perencanaan_model->update($this->input->post(), $id);
            redirect("isu");
        }

    	$this->load->view('Isu/isu_review_view', $data);
	}

    // public function review($id){
		
	// 	// $this->load->model("produk_model");
	// 	// $data['tipe'] = "Edit";
	// 	$data['review_isu'] = $this->Perencanaan_model->get_isu_id($id)->row_array();

	// 	if(isset($_POST['tombol_submit'])){
	// 		$this->Perencanaan_model->update($_POST, $id);
	// 		redirect("isu");
	// 	}

    //     $level_status_isu = $this->Perencanaan_model->level_status_isu();
	// 	$data["level_status_isu"] = $level_status_isu;

	// 	$this->load->view("admin/form",$data);
	// }

	public function simpan() {

        // Load helper untuk upload
        $this->load->helper(array('form', 'url'));

        // Konfigurasi upload gambar
        $config['upload_path'] = './uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 4048; // 2MB
        $this->load->library('upload', $config);

        // Proses upload gambar
        if (!$this->upload->do_upload('gambar_isu')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error
            echo $error['error'];
            return;
        } else {
            $image_data = $this->upload->data();
        }

        // Konfigurasi upload dokumen
        $config['upload_path'] = './uploads/documents/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('document_isu')) {
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
            'title_aspek' => $this->input->post('title_aspek'),
            'title_isu' => $this->input->post('title_isu'),
            // 'title_kategori' => $this->input->post('title_kategori'),
            'title_jenis' => $this->input->post('title_jenis'),
            'title_pekerjaan' => $this->input->post('title_pekerjaan'),
            'detail_pekerjaan' => $this->input->post('detail_pekerjaan'),
            'volume_pekerjaan' => $this->input->post('volume_pekerjaan'),
            'satuan' => $this->input->post('satuan'),
            // 'title_sumber' => $this->input->post('title_sumber'), 
            'title_aset_lahan' => $this->input->post('title_aset_lahan'),
            // 'title_kecamatan' => $this->input->post('title_kecamatan'),
            'title_kelurahan' => $this->input->post('title_kelurahan'),
            'title_rw' => $this->input->post('title_rw'),
            'title_rt' => $this->input->post('title_rt'),
            'alamat_isu' => $this->input->post('alamat_isu'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            // 'title_opd' => $this->input->post('title_opd')
            'gambar_isu' => $image_data['file_name'],
            'document_isu' => $document_data['file_name'],
        );

        // // Upload multiple files
        // $uploaded_files = $this->upload_files('formFileMultiple');

        // if ($uploaded_files) {
        //     $data['nama_file'] = json_encode($uploaded_files); // Simpan sebagai JSON
        // }

        // Simpan ke database
        $this->Perencanaan_model->simpan_isu($data);

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
