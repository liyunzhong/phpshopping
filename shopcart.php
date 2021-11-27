<?php include('header.php');

if(empty($_SESSION['username']))
{
    echo '<script>;
    alert("login please");
   window.location.href="login.html";
    </script>';
    die();
}

$products = $_SESSION['cart'];
//$_SESSION['cart'] =null;
//var_dump($products);
if(!empty($products)){
    foreach($products as $i=>$p)
    {

    }
}
?>
    <section class="featured-product">
</section>

        <div class="product-big-title-area">

            <div class="container" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center"  style="background: #ddd">
                            <h2>Shopping cart </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container" >

                <div class="row">

                    <div class="col-md-12">
                        <div class="product-content-right">
                            <div class="woocommerce">

                                <table cellspacing="0" class="shop_table table table-bordered cart">
                                    <thead>
                                    <tr>


                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Goods</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Num</th>
                                        <th class="product-subtotal">Total</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $total=0;
                                    if(!empty($products)){
                                        foreach($products as $i=>$p){
                                            ?>
                                            <tr class="first odd" style="text-align: left;">
                                                <td class="image"><a class="product-image" title="" href="detail.php?id=<?php echo $p[0]['product_id'];?>">
                                                        <img width="45" HEIGHT="30" alt="" src="<?php echo $p[0]['thumb'];?>">
                                                    </a>
                                                    </td>
                                                <td>
                                                    <?php echo $p[0]['product_name'];?>
                                                </td>
                                                <td>

                                                    ￡<?php echo $p[0]['price'];?>
                                                </td>
                                                <td>

                                                    <?php echo $p[1];?></td>
                                                <td>

                                                    ￡<?php echo $p[0]['price']*$p[1];?>

                                                    <?php $total+=$p[0]['price']*$p[1]; ?>
                                                </td>
                                                <td> <a style="background: #917C78; color: #fff" class=" btn btn-primary "
                                                        title="Remove item" href="remove_cart.php?id=<?php echo $i;?>">
                                                        Remove
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php }}else{ ?>

                                        <tr>
                                            <td colspan="4">
                                                <a class="button " href="index.php">Buy now</a>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                    <tr>
                                        <td class="actions" colspan="6">


                                            <div class="coupon">
                                                <h2>
                                                    Total
                                                    <span style="color:#c00">
                                                   ￡<?php echo $total;?>
                                                   </span>
                                                </h2>
                                            </div>

                                            <input type=submit onclick="javascript:location.href='remove_all_cart.php';"; value="Clear cart" name="update_cart" class="button btn btn-danger">

                                            <input onclick="javascript:location.href='submit.php';"; type="submit" value="Submit order" name="proceed" class="checkout-button button alt wc-forward btn btn-success">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="row">

                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="cart-collaterals">











                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

<?php include('footer.php'); ?>