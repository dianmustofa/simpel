<?php
class Home_model extends CI_Model{

    public function load_ajuan() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        // $this->db->where('p.status_isu', 'aktif');
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    // // Fungsi untuk mendapatkan semua data ajuan
    // public function getAllAjuan() {
    //     return $this->db->get('tbl_perencanaan')->result_array();
    // }

    // Fungsi untuk mencari ajuan berdasarkan kata kunci
    public function searchAjuan($keyword) {
        // $this->db->like('title_isu', $keyword);
        // Mencari kata kunci di kolom 'title_isu', 'status_isu', dan 'latitude'
        $this->db->like('title_isu', $keyword)
                 ->or_like('status_isu', $keyword)
                 ->or_like('latitude', $keyword)
                 ->or_like('longitude', $keyword);
        return $this->db->get('tbl_perencanaan')->result_array();
    }


    public function countAllAjuan($keyword = null)
    {
        if ($keyword) {
            $this->db->like('title_isu', $keyword);
        }
        return $this->db->count_all_results('tbl_perencanaan');
    }

    public function getAllAjuan($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('title_isu', $keyword);
        }
        $this->db->limit($limit, $start);
        return $this->db->get('tbl_perencanaan')->result_array();
    }

}