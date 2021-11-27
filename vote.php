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

$sql1= 'SELECT * FROM vote WHERE goods_id='.$_GET['id'].' AND user_id='.$_SESSION['userid'];
$res1 = $db->execute_dql($sql1);
if(!empty($res1))
{

    echo '<script>';
    echo 'alert("You have been voted.");window.history.back(-1);';
    echo '</script>';
}else {
    $sql = ' INSERT INTO vote(goods_id,user_id,add_time)';
    $sql.='VALUES("'.$p['product_id'].'","'.$_SESSION['userid'].'","'.time().'")';
$db->execute_dml($sql);
    echo '<script>';
    echo 'alert("Vote Success.");window.history.back(-1);';
    echo '</script>';
}