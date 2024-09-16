<?php
class Isu_model extends CI_Model{

    public function load_isu() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function simpan_isu($data) {
        // Insert data ke dalam tabel isu
        return $this->db->insert('tbl_perencanaan', $data);
    }
}