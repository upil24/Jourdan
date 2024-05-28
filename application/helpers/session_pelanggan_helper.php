<?php
function is_logged_in_pelanggan()
{
    //memanggil library CI
    $ci = get_instance();
    //jika didalam session tidak ada email
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Anda belum login !!!</div>');
        redirect('home');
    }
}
