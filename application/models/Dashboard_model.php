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
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function load_usulan() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('p.status_isu', 'aktif');
        // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function load_monitor() {
        $this->db->select('p.*');
        $this->db->from('tbl_perencanaan p');
        $this->db->where('p.status_usulan', 'aktif');
        // $this->db->join('tbl_level_akun la', 'a.id_level_akun=la.id_level');
        // $this->db->group_by('td.promo_id');  // To ensure distinct promos

        return $this->db->get()->result_array();
    }

    public function load_statistik() {
        $this->db->select('DATE_FORMAT(last_created_date, "%Y-%m") as month, COUNT(*) as sales_count');
        $this->db->from('tbl_perencanaan p'); // Ganti dengan nama tabel Anda
        $this->db->group_by('month');
        $query = $this->db->get();
        return $query->result();
    }

}
