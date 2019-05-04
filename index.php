<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();

if(isset($_SESSION['Username'])){
    header("location: home");
}
$getLang = trim(filter_var(htmlentities($_GET['lang']),FILTER_SANITIZE_STRING));
if (!empty($getLang)) {
$_SESSION['language'] = $getLang;
}
// ========================= config the languages ================================
error_reporting(E_NOTICE ^ E_ALL);
if (is_file('home.php')){
    $path = "";
}elseif (is_file('../home.php')){
    $path =  "../";
}elseif (is_file('../../home.php')){
    $path =  "../../";
}
include_once $path."langs/set_lang.php";
?>
<html dir="<? echo lang('html_dir'); ?>">
<head>
    <title><? echo lang('welcome'); ?> | ASTRAL</title>
    <meta charset="UTF-8">
    <meta name="description" content="Wallstant is a social network platform helps you meet new friends and stay connected with your family and with who you are interested anytime anywhere.">
    <meta name="keywords" content="homepage,main,login,social network,social media,Wallstant,meet,free platform">
    <meta name="author" content="AstralScythe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head_imports_main.php";?>
</head>
    <body class="login_signup_body">
        <!--============[ main contains ]============-->
        <div class="login_signup_boxa">
        <!--<img src="Profile.png" alt="" class="box-img">-->
        <h3 align="center" style="color: white;
  font-family: 'Helvetica',sans-serif; font-weight:bold; font-size:35px;text-shadow: 1px 0.5px 6px black;letter-spacing: 6px ;" ><i> ASTRAL</i></h3>
        <br>
        <p align="center" style="color: #80ffaa; margin-bottom: 25px;text-shadow: 1px 1px 5px black; font-size:15px"><i><? echo lang('astralwelcome');?><b> -- Bram Stoker</b></i> </p> <!--The Color is for the text under welcome-->
        </div>
        <div style="width: 100px;height : 100px;position: absolute;top:0;bottom: 0;left: 0;right: 0;margin: auto;">
        <a href="login" class="login_signup_btn2"><? echo lang('enter'); ?></a>
        </div>

