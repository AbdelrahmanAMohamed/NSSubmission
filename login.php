<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
session_regenerate_id(true);

// Create a new CSRF token.
if (! isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(64));
}
// Check a POST is valid.
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // POST data is valid.
}

if ($_SESSION['token']==$_POST['token']) {
  // VALID TOKEN PROVIDED - PROCEED WITH PROCESS
} else {
  // ERROR - INVALID TOKEN
}


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
    <!--============[ Nav bar ]============-->
        <div class="login_signup_navbar">
                <a href="index" class="login_signup_navbarLinks">ASTRAL</a>
                <a href="#" class="login_signup_navbarLinks"><? echo lang('help'); ?></a>
                <a href="#" class="login_signup_navbarLinks"><? echo lang('terms'); ?></a>
                <a href="#" class="login_signup_navbarLinks"><? echo lang('privacyPolicy'); ?></a>
        </div>
        <!--============[ main contains ]============-->
        <div class="login_signup_box">
        <h3 align="center" style="color: white;
  font-family: 'Helvetica',sans-serif; font-weight:bold; font-size:35px;text-shadow: 1px 0.5px 6px black;letter-spacing: 6px ;"><? echo lang('welcome_to'); ?> ASTRAL</h3>
        <p align="center" style="color: #999; margin-bottom: 25px;"><? echo lang('wallstant_main_string'); ?></p> <!--The Color is for the text under welcome-->
           <!--<form method="POST" action="login.php">-->
            <div style="display: flex;">
                <div style="width: 100%;">
                    <br><h4 style="color: #80ffaa; font-weight:bold"><? echo lang('login_now'); ?></h4>
                    
                    <p><input type="text" name="login_username" id="un" class="login_signup_textfield" placeholder="<? echo lang('email_or_username'); ?>"/></p>
                    <!--<p><input type="hidden" name="csrf" value="<?php echo $csrf ?>"></p>-->
                    <p><input type="password" name="login_password" id="pd" class="login_signup_textfield" placeholder="<? echo lang('password'); ?>"/></p>
                    <br>
                    <button type="submit" class="login_signup_btn1" id="loginFunCode"><? echo lang('login'); ?></button>

                    <p id="login_wait" style="margin: 0px;"></p>

                    <br>
                    <br>
                    <br>

                    <p><a href="#" style="font-weight:bold;color: white; font-size: 11px; float: <? echo lang('float2'); ?>;"> <? echo lang('forgot_password'); ?></a></p>
                    <!--</form>-->
                
                    
                </div>
            </div>
        </div>
        <div style="background: rgba(0, 0, 0, 0.4); border-radius: 3px; max-width: 100px; padding: 15px; margin:auto;margin-top: 15px;color: #7b7b7b;" align="center">
            <a href="signup" style="color:white;"><? echo lang('signup'); ?></a> 
        </div>

<script type="text/javascript">
function loginUser(){
var username = document.getElementById("un").value;
var password = document.getElementById("pd").value;
$.ajax({
type:'POST',
url:'includes/login_signup_codes.php',
data:{'req':'login_code','un':username,'pd':password},
beforeSend:function(){
$('.login_signup_btn1').hide();
$('#login_wait').html("<? echo lang('loading'); ?>...");
},
success:function(data){
$('#login_wait').html(data);
if (data == "Welcome...") {
    $('#login_wait').html("<p class='alertGreen'><? echo lang('welcome'); ?>..</p>");
    setTimeout(' window.location.href = "home"; ',2000);
}else{
    $('.login_signup_btn1').show();
}
},
error:function(err){
alert(err);
}
});
}
$('#loginFunCode').click(function(){
loginUser();
});
$(".login_signup_textfield").keypress( function (e) {
    if (e.keyCode == 13) {
        loginUser();
    }
});
</script>
</body>
</html>
