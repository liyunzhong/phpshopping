<?php
header('Content-Type:text/html;charset=utf8');
require_once 'include/config.inc.php';


if(empty($_SESSION['username']))
{
    echo '<script>;
    alert("please login");
   window.location.href="login.html";
    </script>';
    die();

}


if($_SESSION['usertype']!=1)
{
    echo '<script>;
    alert("you are administrator,denied");
   window.location.href="index.php";
    </script>';
    die();

}

//$sql = 'SELECT * FROM m_customer WHERE id='.$_SESSION['user']['id'];


$products = $_SESSION['cart'];
$sql=' INSERT INTO orders(order_serial,total,user_id,goods_count,order_status,created)';
$sql.=' VALUES("'.mt_rand(1000,99999).'","'.$_SESSION['total'].'","'.$_SESSION['userid'].'","'.$_SESSION['num'].'",1,"'.time().'")';
$db->execute_dml($sql);
$id = mysqli_insert_id();
$id = mysqli_insert_id($db->conn);
if(!empty($products))
{
    foreach($products as $i=>$p)
    {
        $pr = $p[0];
        $num = $p[1];
        $sql = 'INSERT INTO order_detail(order_id,single_price,goods_count,total_price,goods_id)
 VALUES(
 "'.$id.'",
 "'.($pr['price']).'",
 "'.$num.'",
 "'.($pr['price']*$num).'",
 "'.$pr['product_id'].'" ) ';
       // echo $sql;exit;
        $db->execute_dml($sql);
    }

    $_SESSION['cart'] = null;
}else{
    echo '<script>';
    echo 'alert("Sorry,Shopping cart is empty!");window.location.href="shopcart.php";';
    echo '</script>';
    die();
}

echo '<script>';
echo 'alert("Order submit success");window.location.href="shopcart.php";';
echo '</script>';
