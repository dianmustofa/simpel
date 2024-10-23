<?php
class Usulan_model extends CI_Model{

    // public function load_usulan() {
    //     $this->db->select('p.*');
    //     $this->db->from('tbl_perencanaan p');

    //     // if ($this->session->userdata('id_level_akun') === '3') {
    //     //     $this->db->where('p.title_opd IS NOT NULL', null, false);
    //     // } elseif ($this->session->userdata('id_level_akun') === '4') {
            
    //     // } else {
    //     //     echo "Data tidak ditemukan atau tidak valid!";
    //     // }

    //     $status_usulan = $this->session->userdata('status_usulan');
    //     // $title_skpd = $this->session->userdata('id_akun');

    //     if ($this->session->userdata('id_level_akun') === '3') { 
    //         $this->db->where('p.title_opd IS NOT NULL', null, false && $status_usulan === "Dilaksanakan");
    //     } elseif ($this->session->userdata('id_level_akun') === '4') {
    //         // Menampilkan semua data tanpa syarat tambahan
    //         $this->db->where('1 = 1'); // Ini digunakan untuk memvalidasi query dan menampilkan semua data
    //     } else {
    //         echo "Data tidak ditemukan atau tidak valid!";
    //     }
        
        
    //     // $this->db->where('p.title_opd IS NOT NULL', null, false);
    //     // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
    //     // $this->db->group_by('td.promo_id');  // To ensure distinct promos

    //     return $this->db->get()->result_array();
    // }

    public function load_usulan() {
        $nama_skpd = $this->session->userdata('nama_akun');
        // Ambil id_akun dan role dari session
        $user_id = $this->session->userdata('id_akun'); // Sesuaikan dengan cara Anda mengelola session
        $user_role = $this->session->userdata('id_level_akun');  // Asumsi role disimpan di session
    
        // Jika role 2 atau 4, tidak perlu filter id_akun (mereka dianggap admin)
        // Role 3 akan memfilter berdasarkan nama_skpd
        if ($user_role == 2 || $user_role == 4) {
            // Admin: melihat semua usulan
            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            // $this->db->where('title_opd IS NOT NULL');
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        } elseif ($user_role == 3) {
            // SKPD: melihat yang sesuai nama_skpd
            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            // $this->db->where('title_opd IS NOT NULL');
            $this->db->where('deleted_at IS NULL');
            $this->db->where('title_opd', $nama_skpd); // Memfilter berdasarkan nama_skpd
            $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        } else {
            // Role 2 (RW) hanya melihat yang diinput
            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            // $this->db->where('title_opd IS NOT NULL');
            $this->db->where('deleted_at IS NULL');
            $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
            $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        }
    
        return $this->db->get()->result_array();
    }

    public function load_verifikasi() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->where_in('p.status_usulan', ["Dilaksanakan", "Dilaksanakan Bersyarat"]);
        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(p.last_created_date) =', date('Y'));

        return $this->db->get()->result_array();
    }

}