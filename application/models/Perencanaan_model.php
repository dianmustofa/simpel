<?php
class Perencanaan_model extends CI_Model{

    public function load_perencanaan() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->order_by('id_isu', 'DESC');
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function simpan_isu($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_perencanaan', $data);
    }


    public function level_isu() {
        $this->db->select('i.*');
        $this->db->from('tbl_isu i');

        return $this->db->get()->result_array();
    }

    public function level_kategori() {
        $this->db->select('k.*');
        $this->db->from('tbl_kategori k');

        return $this->db->get()->result_array();
    }

    public function level_jenis() {
        $this->db->select('j.*');
        $this->db->from('tbl_jenis j');

        return $this->db->get()->result_array();
    }

    public function level_pekerjaan() {
        $this->db->select('pe.*');
        $this->db->from('tbl_pekerjaan pe');

        return $this->db->get()->result_array();
    }

    public function level_sumber() {
        $this->db->select('s.*');
        $this->db->from('tbl_sumber s');

        return $this->db->get()->result_array();
    }

    public function level_aset_lahan() {
        $this->db->select('al.*');
        $this->db->from('tbl_aset_lahan al');

        return $this->db->get()->result_array();
    }

}