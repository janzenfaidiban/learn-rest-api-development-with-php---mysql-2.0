<?php
session_start();
require_once('includes/Helper.php');

if(!isset($_SESSION['userdata']['islogged_in'])){
    global $helper;
    $helper->Message = 'Kindly Login';
    $helper->Location = 'login.php';
    $helper->set_flash_message_Warn();
}else{
    session_destroy();
    global $helper;
    $helper->Message = 'Logout Successfully';
    $helper->Location = 'login.php';
    $helper->set_flash_message();
}
?>