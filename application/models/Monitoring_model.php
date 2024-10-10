<?php
class Monitoring_model extends CI_Model{

    public function load_monitoring() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('p.status_usulan', 'Dilaksanakan');
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
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

}