<?php

function dd($data)
{
    print_r($data);
    die;
}

function notice($status, $pesan)
{
    $CI = &get_instance();
    $CI->load->library('session');
    $CI->session->set_flashdata('status', $status);
    $CI->session->set_flashdata('pesan', $pesan);
}
