<?php
require_once 'include/config.inc.php';
session_start();

if(empty($_SESSION['username']))
{
    echo '<script>;
    alert("Login First");
   window.location.href="login.html";
    </script>';
    exit;
}


$_SESSION['cart']=null;


echo '<script>';
echo 'alert("Remove Success!");window.location.href="shopcart.php";';
echo '</script>';