<?php
class Setting_model extends CI_Model{

    // Aspek
    public function load_aspek() {

        $this->db->select('as.*');
        $this->db->from('tbl_aspek as');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_aspek($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_aspek', $data);
    }

    public  function get_aspek_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_aspek');
		$this->db->where('id_aspek', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_aspek($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_aspek', intval($id));
        $update = $this->db->update('tbl_aspek', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_aspek($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_aspek', $id);
        return $this->db->update('tbl_aspek', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    // Aset Lahan
    public function load_asetlahan() {

        $this->db->select('al.*');
        $this->db->from('tbl_aset_lahan al');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_asetlahan($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_aset_lahan', $data);
    }

    public  function get_asetlahan_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_aset_lahan');
		$this->db->where('id_aset_lahan', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_asetlahan($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_aset_lahan', intval($id));
        $update = $this->db->update('tbl_aset_lahan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_asetlahan($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_aset_lahan', $id);
        return $this->db->update('tbl_aset_lahan', ['deleted_at' => date('Y-m-d H:i:s')]);
    }


    // Instansi Pelaksana
    public function load_instansipelaksana() {

        $this->db->select('ip.*');
        $this->db->from('tbl_instansi_pelaksana ip');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_instansipelaksana($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_instansi_pelaksana', $data);
    }

    public  function get_instansipelaksana_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_instansi_pelaksana');
		$this->db->where('id_instansi_pelaksana', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_instansipelaksana($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_instansi_pelaksana', intval($id));
        $update = $this->db->update('tbl_instansi_pelaksana', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_instansipelaksana($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_instansi_pelaksana', $id);
        return $this->db->update('tbl_instansi_pelaksana', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    // Isu Lingkungan
    public function load_isulingkungan() {

        $this->db->select('isl.*');
        $this->db->from('tbl_isu isl');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_isulingkungan($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_isu', $data);
    }

    public  function get_isulingkungan_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_isu');
		$this->db->where('id_isu', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_isulingkungan($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_isu', intval($id));
        $update = $this->db->update('tbl_isu', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_isulingkungan($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_isu', $id);
        return $this->db->update('tbl_isu', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    // Kelurahan
    public function load_kelurahan() {

        $this->db->select('k.*');
        $this->db->from('tbl_kelurahan k');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_kelurahan($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_kelurahan', $data);
    }

    public  function get_kelurahan_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_kelurahan');
		$this->db->where('id_kelurahan', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_kelurahan($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_kelurahan', intval($id));
        $update = $this->db->update('tbl_kelurahan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_kelurahan($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_kelurahan', $id);
        return $this->db->update('tbl_kelurahan', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    // Pekerjaan
    public function load_pekerjaan() {

        $this->db->select('pek.*');
        $this->db->from('tbl_pekerjaan pek');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_pekerjaan($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_pekerjaan', $data);
    }

    public  function get_pekerjaan_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_pekerjaan');
		$this->db->where('id_pekerjaan', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_pekerjaan($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_pekerjaan', intval($id));
        $update = $this->db->update('tbl_pekerjaan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_pekerjaan($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_pekerjaan', $id);
        return $this->db->update('tbl_pekerjaan', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    // Program
    public function load_program() {

        $this->db->select('j.*');
        $this->db->from('tbl_jenis j');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_program($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_jenis', $data);
    }

    public  function get_program_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis');
		$this->db->where('id_jenis', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_program($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_jenis', intval($id));
        $update = $this->db->update('tbl_jenis', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_program($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_jenis', $id);
        return $this->db->update('tbl_jenis', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    // RW
    public function load_rw() {

        $this->db->select('rw.*');
        $this->db->from('tbl_angka rw');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_rw($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_angka', $data);
    }

    public  function get_rw_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_angka');
		$this->db->where('id_angka', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_rw($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_angka', intval($id));
        $update = $this->db->update('tbl_angka', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_rw($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_angka', $id);
        return $this->db->update('tbl_angka', ['deleted_at' => date('Y-m-d H:i:s')]);
    }


    // Sumber Pendanaan
    public function load_sumberpendanaan() {

        $this->db->select('super.*');
        $this->db->from('tbl_sumber_pendanaan super');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function simpan_sumberpendanaan($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_sumber_pendanaan', $data);
    }

    public  function get_sumberpendanaan_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_sumber_pendanaan');
		$this->db->where('id_sumber_pendanaan', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_sumberpendanaan($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_sumber_pendanaan', intval($id));
        $update = $this->db->update('tbl_sumber_pendanaan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete_sumberpendanaan($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_sumber_pendanaan', $id);
        return $this->db->update('tbl_sumber_pendanaan', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

}