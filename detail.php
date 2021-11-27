<?php
include 'header.php';
$sql = 'SELECT * FROM product WHERE product_id='.$_GET['id'];
$p = $db->execute_dql($sql);
$p = $p[0];

$cates = $db->execute_dql('select * from categories where cate_id='.$p['cate_id']);
$p['cate_id'] = $cates[0]['cate_name'];




$sql = 'SELECT * FROM categories';
$data = $db->execute_dql($sql);


$rand = $db->execute_dql('select * from product order by rand()');
$rand = $rand[0];

$db->execute_dml('UPDATE product SET click_count=click_count+1 where product_id='.$_GET['id']);
?>

<link rel="stylesheet" href="assets/style.css">
<!--Product Details Area Start-->
<div class="product-deails-area" style="padding-top: 128px">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9">
        <div class="product-details-content row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="zoomWrapper">
              <div id="img-1" class="zoomWrapper single-zoom">
                <a href="#">
                  <img id="zoom1" src="<?php echo $p['thumb'];?>" data-zoom-image="<?php echo $p['thumb'];?>" alt="big-1">
                </a>
              </div>
              <div class="product-thumb row">
                <ul class="p-details-slider" id="gallery_01">

                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="product-details-conetnt">

              <div class="product-name">
                <h1> <?php echo $p['product_name'];?>  </h1>
              </div>
              <p class="no-rating no-margin"><a href="#">
                  Type:
                  <?php echo $p['cate_id'];?>
                ,Click:<?php echo $p['click_count'];?>
                </a></p>
              <p class="availability"> <span></span></p>
              <div class="price-box">
                <p class="old-price">
                  <span class="price"></span>
                </p>
                <p class="special-price">
                  <span class="price">￡<?php echo $p['price'];?></span>
                </p>
              </div>
              <div class="details-description">
                <p>
                  <?php echo $p['description'];?>
                </p>

              </div>

              <div class="add-to-cart-qty">

                <div class="cart-qty-button">
                  <label for="qty">Num:</label>
                  <input type="number" class="input-text qty" value="1" maxlength="12" id="qty" name="qty">
                  <button onclick="addCart()" style="background: #917C78" class="button btn-cart" type="button"><span>Add cart</span></button>
                  <button onclick="vote()" style="background: #917C78" class="button btn-cart" type="button"><span>Vote</span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="p-details-tab">
              <ul role="tablist" class="nav nav-tabs">
                <li class="active" role="presentation">
                  <a data-toggle="tab" role="tab" aria-controls="description" href="#description">Details</a></li>

              </ul>
            </div>
            <div class="clearfix"></div>
            <div class="tab-content review product-details">
              <div id="description" class="tab-pane active" role="tabpanel">
                <p>
                  <?php echo html_entity_decode($p['content']);?>
                </p>
              </div>
              <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="row">
                  <div class="col-lg-5 col-md-3 col-sm-12">

                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

        <div class="sidebar-content">
          <div class="section-title no-margin"><h2>Categories</h2></div>
          <div class="popular-tags">
            <ul class="tag-list">
              <?php
              foreach ($data as $d){
              ?>
              <li><a href="index.php?type=<?php echo $d['cate_id']; ?>"><?php echo $d['cate_name']; ?></a></li>
              <?php } ?>
            </ul>

          </div>
        </div>

        <div class="sidebar-content">
          <div class="banner-box">
            <a href="detail.php?id=<?php echo $rand['product_id']; ?>"><img alt="" src="<?php echo $rand['thumb']; ?>"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Product Details Area-->
<?php
include 'footer.php';

?>
<script>

  function addCart() {

    location.href="cart.php?id=<?php echo $p['product_id'];?>&num="+$("#qty").val();
  }

  function vote() {

    location.href="vote.php?id=<?php echo $p['product_id'];?>";
  }
  <?php
  if(!empty($msg)){
  ?>
  toastr.success("<?php echo $msg;?>");
  <?php } ?>
</script>


