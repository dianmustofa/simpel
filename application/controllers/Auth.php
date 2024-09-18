<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('session');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Auth/login_view');
	}

	public function user_add()
	{
		// Mengambil data level akun dari model
		$level_akun = $this->auth_model->level_akun();

		// Mengirimkan data level akun ke view
		$data["level_akun"] = $level_akun;

		$this->load->view('User/user_add_view', $data);
	}

	function add_user()
	{

		$nama_akun = $this->input->post('nama_akun');
		$email_akun = $this->input->post('email_akun');
		$nomor_akun = $this->input->post('nomor_akun');
		$sandi_akun = $this->input->post('sandi_akun');
		$alamat_akun = $this->input->post('alamat_akun');
		$id_level_akun = $this->input->post('id_level_akun');

		$cek_user = $this->auth_model->cek_user($email_akun);
		if ($cek_user > 0) {
			$this->session->set_flashdata(
				'response',
				array(
					'sts' => 'error',
					'msg' => 'Alamat email yang anda masukkan sudah tersedia'
				)
			);

			redirect('tambah-akun');
		} else {
			$data = array(
				'nama_akun' => $nama_akun,
				'email_akun' => $email_akun,
				'nomor_akun' => $nomor_akun,
				'sandi_akun' => hash_password($sandi_akun),
				'alamat_akun' => $alamat_akun,
				'id_level_akun' => $id_level_akun
			);
			$this->auth_model->input_data($data, 'tbl_akun');

			$this->session->set_flashdata(
				'response',
				array(
					'sts' => 'success',
					'msg' => 'Anda sudah mendaftar silahkan login'
				)
			);
			redirect('dashboard');
		}
	}

	function login()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		$cek_akun = $this->auth_model->auth_akun($username, $password);

		if ($cek_akun) {
			$data  = $cek_akun;
			$id_akun  = $data['id_akun'];
			$nama_akun  = $data['nama_akun'];
			$email_akun = $data['email_akun'];
			$nomor_akun = $data['nomor_akun'];
			$alamat_akun = $data['alamat_akun'];
			$id_level_akun = $data['id_level_akun'];
			$sesdata = array(
				'id_akun'		=> $id_akun,
				'nama_akun'  	=> $nama_akun,
				'email_akun'   => $email_akun,
				'nomor_akun'  	=> $nomor_akun,
				'alamat_akun'   => $alamat_akun,
				'id_level_akun'     => $id_level_akun,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if ($level === '1') {
				redirect('dashboard');

				// access login for staff
			} elseif ($level === '2') {
				redirect('dashboard');

				// access login for author
			} else {
				redirect('dashboard');
			}
		} else {
			$this->session->set_flashdata('error', 'Username atau Password salah');
			redirect('login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

	// Profile
	public function profile()
	{
		$this->load->view('Auth/Profile/profile_view');
	}
}
