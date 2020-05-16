<?php

session_start();
if (isset($_POST['create_session'])) {
    $_SESSION['login_resp'] = json_decode($_POST['login_resp'], true);//$_POST['login_resp'];
    echo true;
    exit;
}

if (isset($_POST['destroy_session'])) {
    unset($_SESSION['login_resp']);
    session_destroy();
    echo true;
    exit;
}

if (isset($_POST['check_down_the_lline_members'])) {
    echo in_array($_POST['code'], $_SESSION['login_resp']['down_the_lline_members']);
    exit;
}

if (isset($_POST['udpate_photo'])) {
    $_SESSION['login_resp']['photo'] = $_POST['photo'];
    echo true;
    exit;
}

if (isset($_POST['udpate_name'])) {
    $_SESSION['login_resp']['associate_name'] = $_POST['name'];
    echo true;
    exit;
}
exit;
