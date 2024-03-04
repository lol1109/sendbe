<?php

function check_login() {
    $CI = get_instance();
    $user_id = $CI->session->userdata('Username');


    if (!$user_id) {
        redirect('Auth'); // Redirect ke halaman login jika tidak login
    }
}
function sudah_login() {
    $CI = get_instance();
    $user_id = $CI->session->userdata('Username');


    if ($user_id) {
        redirect('Home'); // Redirect ke halaman login jika tidak login
    } 
}