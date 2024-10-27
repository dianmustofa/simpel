<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct()
	{	
		parent::__construct();
		$this->load->model("Setting_model");
		$this->load->library('upload');
	}

	// Aspek
	public function aspek()
	{
		$aspek = $this->Setting_model->load_aspek();
        $data['aspek'] = $aspek;

        $this->load->view('Setting/Aspek/aspek_view', $data);
	}

	public function simpan_aspek() {

        // Ambil data dari form
        $data = array(
            'title_aspek' => $this->input->post('title_aspek'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_aspek($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('aspek');
    }

	public function edit_aspek($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_aspek'] = $this->Setting_model->get_aspek_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_aspek($this->input->post(), $id);
            redirect("aspek");
        }

    	$this->load->view('Setting/Aspek/aspek_edit_view', $data);
	}


	public function update_aspek($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_aspek' => $this->input->post('title_aspek'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_aspek($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('aspek');
	}
	

	public function delete_aspek($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_aspek($id);

        // Redirect atau beri notifikasi
        redirect('aspek');
    }

	// Aset Lahan
	public function asetlahan()
	{
		$asetlahan = $this->Setting_model->load_asetlahan();
        $data['asetlahan'] = $asetlahan;

        $this->load->view('Setting/AsetLahan/aset_lahan_view', $data);
	}

	public function simpan_asetlahan() {

        // Ambil data dari form
        $data = array(
            'title_aset_lahan' => $this->input->post('title_aset_lahan'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_asetlahan($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('aset-lahan');
    }

	public function edit_asetlahan($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_asetlahan'] = $this->Setting_model->get_asetlahan_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_asetlahan($this->input->post(), $id);
            redirect("aset-lahan");
        }

    	$this->load->view('Setting/AsetLahan/aset_lahan_edit_view', $data);
	}


	public function update_asetlahan($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_aset_lahan' => $this->input->post('title_aset_lahan'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_asetlahan($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('aset-lahan');
	}
	

	public function delete_asetlahan($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_asetlahan($id);

        // Redirect atau beri notifikasi
        redirect('aset-lahan');
    }


	// Instansi Pelaksana
	public function instansipelaksana()
	{
		$instansipelaksana = $this->Setting_model->load_instansipelaksana();
        $data['instansipelaksana'] = $instansipelaksana;

        $this->load->view('Setting/InstansiPelaksana/instansi_pelaksana_view', $data);
	}

	public function simpan_instansipelaksana() {

        // Ambil data dari form
        $data = array(
            'title_instansi_pelaksana' => $this->input->post('title_instansi_pelaksana'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_instansipelaksana($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('instansi-pelaksana');
    }

	public function edit_instansipelaksana($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_instansipelaksana'] = $this->Setting_model->get_instansipelaksana_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_instansipelaksana($this->input->post(), $id);
            redirect("instansi-pelaksana");
        }

    	$this->load->view('Setting/InstansiPelaksana/instansi_pelaksana_edit_view', $data);
	}


	public function update_instansipelaksana($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_instansi_pelaksana' => $this->input->post('title_instansi_pelaksana'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_instansipelaksana($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('instansi-pelaksana');
	}
	

	public function delete_instansipelaksana($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_instansipelaksana($id);

        // Redirect atau beri notifikasi
        redirect('instansi-pelaksana');
    }

	// Isu Lingkungan
	public function isulingkungan()
	{
		$isulingkungan = $this->Setting_model->load_isulingkungan();
        $data['isulingkungan'] = $isulingkungan;

        $this->load->view('Setting/IsuLingkungan/isu_lingkungan_view', $data);
	}

	public function simpan_isulingkungan() {

        // Ambil data dari form
        $data = array(
            'title_isu' => $this->input->post('title_isu'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_isulingkungan($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('isu-lingkungan');
    }

	public function edit_isulingkungan($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_isulingkungan'] = $this->Setting_model->get_isulingkungan_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_instansipelaksana($this->input->post(), $id);
            redirect("isu-lingkungan");
        }

    	$this->load->view('Setting/IsuLingkungan/isu_lingkungan_edit_view', $data);
	}


	public function update_isulingkungan($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_isu' => $this->input->post('title_isu'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_isulingkungan($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('isu-lingkungan');
	}
	

	public function delete_isulingkungan($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_isulingkungan($id);

        // Redirect atau beri notifikasi
        redirect('isu-lingkungan');
    }

	// Kelurahan
	public function kelurahan()
	{
		$kelurahan = $this->Setting_model->load_kelurahan();
        $data['kelurahan'] = $kelurahan;

        $this->load->view('Setting/Kelurahan/kelurahan_view', $data);
	}

	public function simpan_kelurahan() {

        // Ambil data dari form
        $data = array(
            'title_kelurahan' => $this->input->post('title_kelurahan'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_kelurahan($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('kelurahan');
    }

	public function edit_kelurahan($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_kelurahan'] = $this->Setting_model->get_kelurahan_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_kelurahan($this->input->post(), $id);
            redirect("kelurahan");
        }

    	$this->load->view('Setting/Kelurahan/kelurahan_edit_view', $data);
	}


	public function update_kelurahan($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_kelurahan' => $this->input->post('title_kelurahan'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_kelurahan($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('kelurahan');
	}
	

	public function delete_kelurahan($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_kelurahan($id);

        // Redirect atau beri notifikasi
        redirect('kelurahan');
    }

	// Pekerjaan
	public function pekerjaan()
	{
		$pekerjaan = $this->Setting_model->load_pekerjaan();
        $data['pekerjaan'] = $pekerjaan;

        $this->load->view('Setting/LingkupPekerjaan/lingkup_pekerjaan_view', $data);
	}

	public function simpan_pekerjaan() {

        // Ambil data dari form
        $data = array(
            'title_pekerjaan' => $this->input->post('title_pekerjaan'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_pekerjaan($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('lingkup-pekerjaan');
    }

	public function edit_pekerjaan($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_pekerjaan'] = $this->Setting_model->get_pekerjaan_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_pekerjaan($this->input->post(), $id);
            redirect("lingkup-pekerjaan");
        }

    	$this->load->view('Setting/LingkupPekerjaan/lingkup_pekerjaan_edit_view', $data);
	}


	public function update_pekerjaan($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_pekerjaan' => $this->input->post('title_pekerjaan'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_pekerjaan($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('lingkup-pekerjaan');
	}
	

	public function delete_pekerjaan($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_pekerjaan($id);

        // Redirect atau beri notifikasi
        redirect('lingkup-pekerjaan');
    }


	// Program
	public function program()
	{
		$program = $this->Setting_model->load_program();
        $data['program'] = $program;

        $this->load->view('Setting/Program/program_view', $data);
	}

	public function simpan_program() {

        // Ambil data dari form
        $data = array(
            'title_jenis' => $this->input->post('title_jenis'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_program($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('program');
    }

	public function edit_program($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_program'] = $this->Setting_model->get_program_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_program($this->input->post(), $id);
            redirect("program");
        }

    	$this->load->view('Setting/Program/program_edit_view', $data);
	}


	public function update_program($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_jenis' => $this->input->post('title_jenis'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_program($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('program');
	}
	

	public function delete_program($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_program($id);

        // Redirect atau beri notifikasi
        redirect('program');
    }


	// RW
	public function rw()
	{
		$rw = $this->Setting_model->load_rw();
        $data['rw'] = $rw;

        $this->load->view('Setting/RW/rw_view', $data);
	}

	public function simpan_rw() {

        // Ambil data dari form
        $data = array(
            'title_angka' => $this->input->post('title_angka'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_rw($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('rw');
    }

	public function edit_rw($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_rw'] = $this->Setting_model->get_rw_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_rw($this->input->post(), $id);
            redirect("rw");
        }

    	$this->load->view('Setting/RW/rw_edit_view', $data);
	}


	public function update_rw($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_angka' => $this->input->post('title_angka'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_rw($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('rw');
	}
	

	public function delete_rw($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_rw($id);

        // Redirect atau beri notifikasi
        redirect('rw');
    }


	// Sumber Pendanaan
	public function sumberpendanaan()
	{
		$sumberpendanaan = $this->Setting_model->load_sumberpendanaan();
        $data['sumberpendanaan'] = $sumberpendanaan;

        $this->load->view('Setting/SumberPendanaan/sumber_pendanaan_view', $data);
	}

	public function simpan_sumberpendanaan() {

        // Ambil data dari form
        $data = array(
            'title_sumber_pendanaan' => $this->input->post('title_sumber_pendanaan'),
        );

        // Simpan ke database
        $this->Setting_model->simpan_sumberpendanaan($data);

        // Redirect ke halaman lain (misalnya halaman utama)
        redirect('sumber-pendanaan');
    }

	public function edit_sumberpendanaan($id)
	{    
    	if (!$this->session->userdata('id_akun')) {
			notice('error', 'Anda belum login');
			redirect('login');
		}

        $data['update_sumberpendanaan'] = $this->Setting_model->get_sumberpendanaan_id($id)->row_array();

        if ($this->input->post('submit')) {
            // Debug post data
            var_dump($this->input->post());
    
            // Proceed with update
            $this->Setting_model->update_sumberpendanaan($this->input->post(), $id);
            redirect("sumber-pendanaan");
        }

    	$this->load->view('Setting/SumberPendanaan/sumber_pendanaan_edit_view', $data);
	}


	public function update_sumberpendanaan($id) {
		// Load helper untuk upload
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload'); // Pastikan library upload di-load
	
		// Ambil data dari form
		$data = array(
			'title_sumber_pendanaan' => $this->input->post('title_sumber_pendanaan'),
		);
	
		// Simpan data yang di-update ke database
		$this->Setting_model->update_sumberpendanaan($data, $id);
	
		// Redirect ke halaman lain dengan pesan sukses
		$this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
		redirect('sumber-pendanaan');
	}
	

	public function delete_sumberpendanaan($id) {
        // Load model
        $this->load->model('Setting_model');

        // Soft delete berdasarkan ID
        $this->Setting_model->soft_delete_sumberpendanaan($id);

        // Redirect atau beri notifikasi
        redirect('sumber-pendanaan');
    }

}
