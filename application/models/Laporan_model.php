<?php
class Laporan_model extends CI_Model{

    public function load_laporan() {
        // $nama_skpd = $this->session->userdata('nama_akun');
        // Ambil id_akun dan role dari session
        // $user_id = $this->session->userdata('id_akun'); // Sesuaikan dengan cara Anda mengelola session
        $user_role = $this->session->userdata('id_level_akun');  // Asumsi role disimpan di session
    
        // Jika role 2 atau 4, tidak perlu filter id_akun (mereka dianggap admin)
        // Role 3 akan memfilter berdasarkan nama_skpd
        if ($user_role == 2 || $user_role == 4) {
            // Admin: melihat semua usulan
            $this->db->select('lt.*');
            $this->db->from('tbl_laporan_tahunan lt');
            // $this->db->where('title_opd IS NOT NULL');
            // $this->db->where('p.status_usulan IS NOT NULL');
            $this->db->where('deleted_at IS NULL');
            // $this->db->where('setuju', 1);
        } elseif ($user_role == 3) {
            // SKPD: melihat yang sesuai nama_skpd
            $this->db->select('lt.*');
            $this->db->from('tbl_laporan_tahunan lt');
            // $this->db->where('title_opd IS NOT NULL');
            // $this->db->where('title_opd', $nama_skpd); // Memfilter berdasarkan nama_skpd
            // $this->db->where('p.status_usulan IS NOT NULL');
            $this->db->where('deleted_at IS NULL');
        } else {
            // Role 2 (RW) hanya melihat yang diinput
            $this->db->select('lt.*');
            $this->db->from('tbl_laporan_tahunan lt');
            // $this->db->where('title_opd IS NOT NULL');
            // $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
            $this->db->where('deleted_at IS NULL');
        }
    
        return $this->db->get()->result_array();
    }

    public function simpan_laporan($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_laporan_tahunan', $data);
    }

    public  function get_laporan_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_laporan_tahunan');
		$this->db->where('id_laporan', $id);
        $this->db->where('deleted_at IS NULL');
		return $this->db->get();
	}

    public function update_laporan($data, $id) {
        // Data yang akan diupdate
        
        // Lakukan update data berdasarkan id
        $this->db->where('id_laporan', intval($id));
        $update = $this->db->update('tbl_laporan_tahunan', $data);
    
        // Cek apakah update berhasil
        if ($update) {
            echo "Update successful!";
        } else {
            echo "Update failed!";
        }
    }

    public function soft_delete($id) {
        // Update kolom deleted_at dengan waktu sekarang
        $this->db->where('id_laporan', $id);
        return $this->db->update('tbl_laporan_tahunan', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

}