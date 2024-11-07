<?php

class Dashboard_model extends CI_Model
{

    public function load_akun() {
        $this->db->select('a.*, la.*');
        $this->db->from('tbl_akun a');
        $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function load_ajuan() {
        // Ambil id_akun dan role dari session
        $user_id = $this->session->userdata('id_akun'); // Sesuaikan dengan cara Anda mengelola session
        $user_role = $this->session->userdata('id_level_akun');  // Asumsi role disimpan di session
    
        // Jika role 2 atau 4, tidak perlu filter id_akun (mereka dianggap admin)
        $is_admin = ($user_role == 2 || $user_role == 4);

        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('deleted_at IS NULL');
        $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        if (!$is_admin) {
            $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
        }
        // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

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
            $this->db->where('title_opd IS NOT NULL');
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        } elseif ($user_role == 3) {
            // SKPD: melihat yang sesuai nama_skpd
            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            $this->db->where('title_opd IS NOT NULL');
            $this->db->where('title_opd', $nama_skpd); // Memfilter berdasarkan nama_skpd
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        } else {
            // Role 2 (RW) hanya melihat yang diinput
            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            $this->db->where('title_opd IS NOT NULL');
            $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        }
    
        return $this->db->get()->result_array();
    }
    

    public function load_monitor() {
        $nama_skpd = $this->session->userdata('nama_akun');

        $user_role = $this->session->userdata('id_level_akun');  // Asumsi role disimpan di session

        if ($user_role == 2 || $user_role == 4) {

            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            $this->db->where('status_usulan IS NOT NULL');
            // $this->db->where('title_opd', $nama_skpd);
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) <', date('Y'));
            // $this->db->where('p.status_usulan', 'Dilaksanakan');
            // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
            // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        }  elseif ($user_role == 3) {

            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            $this->db->where('status_usulan IS NOT NULL');
            $this->db->where('title_opd', $nama_skpd);
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) <', date('Y'));
            // $this->db->where('p.status_usulan', 'Dilaksanakan');
            // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
            // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        } else {

            // $this->db->select('p.*');
            // $this->db->from('tbl_perencanaan p');
            // $this->db->where('status_usulan IS NOT NULL');
            // $this->db->where('title_opd', $nama_skpd);
            // $this->db->where('deleted_at IS NULL');
            // // $this->db->where('YEAR(p.last_created_date) =', date('Y'));
            // // $this->db->where('p.status_usulan', 'Dilaksanakan');
            // // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
            // // $this->db->group_by('td.promo_id');  // To ensure distinct promos
        }

        return $this->db->get()->result_array();
    }

    public function load_laporkan() {

        $nama_skpd = $this->session->userdata('nama_akun');

        $user_role = $this->session->userdata('id_level_akun');  // Asumsi role disimpan di session

        if ($user_role == 2 || $user_role == 4) {

            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            // $this->db->where('status_usulan IS NOT NULL');
            $this->db->where_in('status_monitoring', ["Dilaksanakan", "Tidak dapat dilaksanakan"]);
            // $this->db->where('title_opd', $nama_skpd);
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) <', date('Y'));
            // $this->db->where('p.status_usulan', 'Dilaksanakan');
            // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
            // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        }  elseif ($user_role == 3) {

            $this->db->select('p.*');
            $this->db->from('tbl_perencanaan p');
            // $this->db->where('status_usulan IS NOT NULL');
            $this->db->where_in('status_monitoring', ["Dilaksanakan", "Tidak dapat dilaksanakan"]);
            $this->db->where('title_opd', $nama_skpd);
            $this->db->where('deleted_at IS NULL');
            $this->db->where('YEAR(p.last_created_date) <', date('Y'));
            // $this->db->where('p.status_usulan', 'Dilaksanakan');
            // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
            // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        } else {

            // $this->db->select('p.*');
            // $this->db->from('tbl_perencanaan p');
            // $this->db->where('status_monitoring IS NOT NULL');
            // $this->db->where('title_opd', $nama_skpd);
            // $this->db->where('deleted_at IS NULL');
            // $this->db->where('YEAR(p.last_created_date) =', date('Y'));
            // // $this->db->where('p.status_usulan', 'Dilaksanakan');
            // // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
            // // $this->db->group_by('td.promo_id');  // To ensure distinct promos
        }

        

        return $this->db->get()->result_array();
    }

    public function load_isu_statistik() {
        $this->db->select('DATE_FORMAT(last_created_date, "%Y-%m") as month, COUNT(*) as sales_count');
        $this->db->from('tbl_perencanaan p'); // Ganti dengan nama tabel Anda
        $this->db->where('deleted_at IS NULL');
        // $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        $this->db->group_by('month');
        $query = $this->db->get();
        return $query->result();
    }

    public function load_statistik() {
        // Ambil id_akun dan role dari session
        $user_id = $this->session->userdata('id_akun'); // Sesuaikan dengan cara Anda mengelola session
        $user_role = $this->session->userdata('id_level_akun');  // Asumsi role disimpan di session
    
        // Jika role 2 atau 4, tidak perlu filter id_akun (mereka dianggap admin)
        $is_admin = ($user_role == 2 || $user_role == 4);
    
        // Subquery pertama: menghitung keseluruhan data
        $this->db->select('DATE_FORMAT(last_created_date, "%Y-%m") as month, COUNT(*) as sales_count');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('deleted_at IS NULL');
        // $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        if (!$is_admin) {
            $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
        }
        $this->db->group_by('month');
        $subquery1 = $this->db->get_compiled_select();
    
        // Subquery kedua: menghitung data di mana title_opd tidak null
        $this->db->select('DATE_FORMAT(last_created_date, "%Y-%m") as month, COUNT(*) as other_count');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('title_opd IS NOT NULL');
        $this->db->where('deleted_at IS NULL');
        // $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        if (!$is_admin) {
            $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
        }
        $this->db->group_by('month');
        $subquery2 = $this->db->get_compiled_select();
    
        // Gabungkan kedua subquery menggunakan LEFT JOIN
        $query = $this->db->query("
            SELECT COALESCE(t1.month, t2.month) as month,
                   COALESCE(t1.sales_count, 0) as sales_count,
                   COALESCE(t2.other_count, 0) as other_count
            FROM ($subquery1) t1
            LEFT JOIN ($subquery2) t2 ON t1.month = t2.month
            ORDER BY month ASC
        ");
    
        return $query->result();
    }

    public function load_statistik_skpd() {
        // Ambil id_akun dan role dari session
        $nama_skpd = $this->session->userdata('nama_akun'); // Sesuaikan dengan cara Anda mengelola session
        // $user_role = $this->session->userdata('id_level_akun');  // Asumsi role disimpan di session
    
        // Jika role 2 atau 4, tidak perlu filter id_akun (mereka dianggap admin)
        // $is_admin = ($user_role == 2 || $user_role == 4 || $user_role == 3);
    
        // Subquery pertama: menghitung keseluruhan data
        $this->db->select('DATE_FORMAT(last_created_date, "%Y-%m") as month, COUNT(*) as sales_count');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('title_opd IS NOT NULL');
        $this->db->where('title_opd', $nama_skpd);
        $this->db->where('deleted_at IS NULL');
        // $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        // if (!$is_admin) {
        //     $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
        // }
        $this->db->group_by('month');
        $subquery1 = $this->db->get_compiled_select();
    
        // Subquery kedua: menghitung data di mana title_opd tidak null
        $this->db->select('DATE_FORMAT(last_created_date, "%Y-%m") as month, COUNT(*) as other_count');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('status_usulan IS NOT NULL');
        $this->db->where('title_opd', $nama_skpd);
        $this->db->where('deleted_at IS NULL');
        // $this->db->where('YEAR(p.last_created_date) =', date('Y'));
        // if (!$is_admin) {
        //     $this->db->where('id_akun', $user_id); // Hanya filter id_akun jika bukan admin
        // }
        $this->db->group_by('month');
        $subquery2 = $this->db->get_compiled_select();
    
        // Gabungkan kedua subquery menggunakan LEFT JOIN
        $query = $this->db->query("
            SELECT COALESCE(t1.month, t2.month) as month,
                   COALESCE(t1.sales_count, 0) as sales_count,
                   COALESCE(t2.other_count, 0) as other_count
            FROM ($subquery1) t1
            LEFT JOIN ($subquery2) t2 ON t1.month = t2.month
            ORDER BY month ASC
        ");
    
        return $query->result();
    }
    
}
