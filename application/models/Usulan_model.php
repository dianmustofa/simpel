<?php
class Usulan_model extends CI_Model{

    public function load_usulan() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');

        // if ($this->session->userdata('id_level_akun') === '3') {
        //     $this->db->where('p.title_opd IS NOT NULL', null, false);
        // } elseif ($this->session->userdata('id_level_akun') === '4') {
            
        // } else {
        //     echo "Data tidak ditemukan atau tidak valid!";
        // }

        $status_usulan = $this->session->userdata('status_usulan');
        // $title_skpd = $this->session->userdata('id_akun');

        if ($this->session->userdata('id_level_akun') === '3') { 
            $this->db->where('p.title_opd IS NOT NULL', null, false && $status_usulan === "Dilaksanakan");
        } elseif ($this->session->userdata('id_level_akun') === '4') {
            // Menampilkan semua data tanpa syarat tambahan
            $this->db->where('1 = 1'); // Ini digunakan untuk memvalidasi query dan menampilkan semua data
        } else {
            echo "Data tidak ditemukan atau tidak valid!";
        }
        
        
        // $this->db->where('p.title_opd IS NOT NULL', null, false);
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function load_verifikasi() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('p.status_usulan', "Dilaksanakan");

        return $this->db->get()->result_array();
    }

}