<?php
session_start();
if (isset($_POST['create_session'])) {
    $_SESSION['login_resp'] = $_POST['login_resp'];
    echo true;
    exit;
}

if (isset($_POST['destroy_session'])) {
    unset($_SESSION['login_resp']);
    session_destroy();
    echo true;
    exit;
}
exit;
