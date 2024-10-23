<?php
class Home_model extends CI_Model{

    public function load_ajuan() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        // $this->db->where('p.status_isu', 'aktif');
        // $this->db->join('tbl_category tc', 'td.category_id=tc.category_id');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    // // Fungsi untuk mendapatkan semua data ajuan
    // public function getAllAjuan() {
    //     return $this->db->get('tbl_perencanaan')->result_array();
    // }

    // // Fungsi untuk mencari ajuan berdasarkan kata kunci
    // public function searchAjuan($keyword) {
    //     // $this->db->like('title_isu', $keyword);
    //     // Mencari kata kunci di kolom 'title_isu', 'status_isu', dan 'latitude'
    //     $this->db->like('title_isu', $keyword)
    //              ->or_like('status_isu', $keyword)
    //              ->or_like('detail_pekerjaan', $keyword)
    //              ->or_like('latitude', $keyword)
    //              ->or_like('longitude', $keyword);
    //     return $this->db->get('tbl_perencanaan')->result_array();
    // }

    public function searchAjuan($keyword = null, $kelurahan = null, $rw = null, $rt = null, $limit = null, $start = null) {
        // Pencarian hanya berdasarkan keyword
        if ($keyword) {
            $this->db->group_start()
                     ->like('title_isu', $keyword)
                     ->or_like('status_isu', $keyword)
                     ->or_like('title_jenis', $keyword)
                     ->or_like('detail_pekerjaan', $keyword)
                     ->or_like('latitude', $keyword)
                     ->or_like('longitude', $keyword)
                     ->or_like('title_kelurahan', $keyword)
                     ->or_like('title_rw', $keyword)
                     ->group_end();
        }
    
        // Filter kelurahan (jika ada)
        if ($kelurahan) {
            $this->db->where('title_kelurahan', $kelurahan);
        }
    
        // Filter RW (jika ada)
        if ($rw) {
            $this->db->where('title_rw', $rw);
        }
    
        // Filter RT (jika ada)
        if ($rt) {
            $this->db->where('title_rt', $rt);
        }
    
        // Pagination
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }

        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(last_created_date) =', date('Y'));
    
        return $this->db->get('tbl_perencanaan')->result_array();
    }
    
    


    public function countAllAjuan($keyword = null)
    {
        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(last_created_date) =', date('Y'));
        if ($keyword) {
            $this->db->like('title_isu', $keyword);
        }
        return $this->db->count_all_results('tbl_perencanaan');
    }

    public function getAllAjuan($limit, $start, $keyword = null)
    {
        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(last_created_date) =', date('Y'));
        if ($keyword) {
            $this->db->like('title_isu', $keyword);
        }
        $this->db->limit($limit, $start);
        return $this->db->get('tbl_perencanaan')->result_array();
    }

}