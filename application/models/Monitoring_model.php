<?php
class Monitoring_model extends CI_Model{

    public function load_monitoring() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        // $this->db->where('p.status_isu', 'aktif');
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

}