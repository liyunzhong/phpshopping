<?php
require_once 'include/config.inc.php';

if(empty($_SESSION['username']))
{
    echo '<script>;
    alert("Please Login");
   window.location.href="login.html";
    </script>';
    exit;
}


$cart = $_SESSION['cart'];
$cart_new = array();$j=0;
if(!empty($cart))
{
    foreach($cart as $i=>$c)
    {
        if($_GET['id']==$i) continue;
        $cart_new[$j] = $c;
        $j++;
    }
}
    $_SESSION['cart'] = $cart_new;

echo '<script>';
echo 'alert("Remove OK!");window.location.href="shopcart.php";';
echo '</script>';