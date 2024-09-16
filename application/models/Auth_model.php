<?php

class Auth_model extends CI_Model
{
    public function level_akun()
	{
		$query = $this->db->query("SELECT * FROM tbl_level_akun");
		return $query->result_array();
	}

    function cek_user($email_akun)
	{
		$query = $this->db->query("SELECT * FROM tbl_akun where email_akun='" . $email_akun . "'");
		return $query->num_rows();
	}

    function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	// //cek email dan password
	// function auth_akun($username, $password)
	// {
	// 	$query = $this->db->query("SELECT * FROM tbl_akun WHERE email_akun='$username' LIMIT 1")->row_array();

	// 	if ($query && $query['sandi_akun'] && verify_password($password, $query['sandi_akun'])) {
	// 		return $query;
	// 	}

	// 	return false;
	// }

	public function auth_akun($username, $password)
	{
		// Memilih kolom yang dibutuhkan, termasuk 'title_level'
		$this->db->select('a.*, la.title_level');
		$this->db->from('tbl_akun a');
		$this->db->join('tbl_level_akun la', 'a.id_level_akun = la.id_level');
		$this->db->where('a.email_akun', $username);
		$this->db->limit(1);
		
		$query = $this->db->get()->row_array();

		if ($query && $query['sandi_akun'] && verify_password($password, $query['sandi_akun'])) {
			return $query;
		}

		return false;
	}

}
