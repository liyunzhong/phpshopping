<?php
require_once 'include/config.inc.php';


if(empty($_SESSION['username']))
{
    echo '<script>;
    alert("login please");
   window.location.href="login.html";
    </script>';
    die();

}


$sql1= 'SELECT * FROM product WHERE product_id='.$_GET['id'];
$res1 = $db->execute_dql($sql1);
$p = $res1[0];

$cart = $_SESSION['cart'];
if(empty($cart))
{
    $_SESSION['cart'] = array(array($p,$_GET['num']));
}else{

    $check = false;
    foreach ($cart as $i=>$c)
    {
        if($c[0]['product_id']==$p['product_id'])
        {
            $cart[$i][1] =$c[1]+$_GET['num'];
            $check = true;
        }else{
        }
    }
    if(!$check){
        $cart[count($cart)] = array($p,$_GET['num']);
    }
    $_SESSION['cart'] = $cart;
}
$cart = $_SESSION['cart'];
$total =0; $num = 0;
foreach ($cart as  $c){
    $total+=$c[0]['price']*$c[1];
    $num+=$c[1];
}
$_SESSION['total'] = $total;
$_SESSION['num'] = $num;
//var_dump($cart[1]);exit;
echo '<script>';
echo 'alert("Add Cart Success.");window.history.back(-1);';
echo '</script>';