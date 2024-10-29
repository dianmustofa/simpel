<?php
class Perencanaan_model extends CI_Model{

    public function load_perencanaan_akun() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->order_by('id_isu', 'DESC');
        $this->db->where('id_akun', $this->session->userdata('id_akun'));
        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function load_perencanaan_all() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->order_by('id_isu', 'DESC');
        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        // $this->db->where('id_akun', $this->session->userdata('id_akun'));
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function simpan_isu($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_perencanaan', $data);
    }

    public function update_isu($data, $id) {
        // Data yang akan diupdate
    
        // Lakukan update data berdasarkan id
        $this->db->where('id_isu', intval($id));
        $update = $this->db->update('tbl_perencanaan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function update_usulan($data, $id) {
        // Data yang akan diupdate
    
        // Lakukan update data berdasarkan id
        $this->db->where('id_isu', intval($id));
        $update = $this->db->update('tbl_perencanaan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function update_verifikasi($data, $id) {
        // Data yang akan diupdate
    
        // Lakukan update data berdasarkan id
        $this->db->where('id_isu', intval($id));
        $update = $this->db->update('tbl_perencanaan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function update_monitoring($data, $id) {
        // Data yang akan diupdate
    
        // Lakukan update data berdasarkan id
        $this->db->where('id_isu', intval($id));
        $update = $this->db->update('tbl_perencanaan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }
    

    public function update($post, $id){

        // Debug the received data
        var_dump($post['status_isu']); 

		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		// $nama = $this->db->escape($post['nama']);
		// $harga = $this->db->escape($post['harga']);
		// $lokasi = $this->db->escape($post['lokasi']);
		// $telepon = $this->session->userdata('ses_telepon');
		// $keterangan = $this->db->escape($post['keterangan']);
		// $jumlah = $this->db->escape($post['jumlah']);

		// if (!empty($_FILES["gambar"]["nama"])) {
		// 	$gambar = $this->_uploadImage();
		// } else {
		// 	$gambar = $this->db->escape($post['old_image']);
		// }

        $data = array(
            'status_isu' => $post['status_isu']
        );
        $this->db->where('id_isu', intval($id));
        $this->db->update('tbl_perencanaan', $data);

        // Check if the update was successful
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }

		// $statusIsu = $this->db->escape($post['status_isu']);
		// $akun = $this->session->userdata('ses_id');

		// $sql = $this->db->query("UPDATE tbl_perencanaan SET status_isu = $statusIsu WHERE id_isu = ".intval($id));
		
	}

    public  function get_isu_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_perencanaan');
		$this->db->where('id_isu', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function soft_delete($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_isu', $id);
        return $this->db->update('tbl_perencanaan', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    public function level_aspek() {
        $this->db->select('as.*');
        $this->db->from('tbl_aspek as');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_isu() {
        $this->db->select('i.*');
        $this->db->from('tbl_isu i');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_status_isu() {
        $this->db->select('si.*');
        $this->db->from('tbl_status_isu si');

        return $this->db->get()->result_array();
    }

    public function level_status_usulan() {
        $this->db->select('su.*');
        $this->db->from('tbl_status_usulan su');

        return $this->db->get()->result_array();
    }

    public function level_kategori() {
        $this->db->select('k.*');
        $this->db->from('tbl_kategori k');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_jenis() {
        $this->db->select('j.*');
        $this->db->from('tbl_jenis j');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_kelurahan() {
        $this->db->select('kel.*');
        $this->db->from('tbl_kelurahan kel');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_angka() {
        $this->db->select('ang.*');
        $this->db->from('tbl_angka ang');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_pekerjaan() {
        $this->db->select('pe.*');
        $this->db->from('tbl_pekerjaan pe');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_aset_lahan() {
        $this->db->select('al.*');
        $this->db->from('tbl_aset_lahan al');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_instansi() {
        $this->db->select('ip.*');
        $this->db->from('tbl_instansi_pelaksana ip');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

    public function level_sumber_pendanaan() {
        $this->db->select('spd.*');
        $this->db->from('tbl_sumber_pendanaan spd');
        $this->db->where('deleted_at IS NULL');

        return $this->db->get()->result_array();
    }

}