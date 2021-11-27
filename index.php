<?php
include 'header.php';


$sql = 'SELECT * FROM categories';
$data = $db->execute_dql($sql);

$wh = '';
if(!empty($_GET['type']))
{
  $wh.=' AND cate_id='.$_GET['type'];
}

$sql = 'SELECT * FROM product where 1=1 '.$wh;
$list = $db->execute_dql($sql);

if($_POST)
{
  $sql = ' INSERT INTO contact(name,email,subject,message,create_time)';
  $sql.=' VALUES("'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['subject'].'","'.$_POST['message'].'","'.time().'")';
  $db->execute_dml($sql);
  $msg = 'Submit success';
}

?>


  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>Welcome to Our Florist</h1>
      <h2>We are all making flowers by heart</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/组件 21 – 1.png" style="height: 450px; float: right;" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1">
            <h3>About Our Florist </h3>
            <p class="font-italic">
              Our philosophy in running this florist is：

            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Fisrtly, </li>
              <li><i class="icofont-check-circled"></i> Secondly, </li>
              <li><i class="icofont-check-circled"></i> Last but not least,</li>
            </ul>
            <p>
              <?php echo $p['description']; ?>-
              <?php echo $p['keywords']; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Empty Section ======= -->
    <section class="call-to-action">
      <div class="container">

        <div class="text-center">
        </div>

      </div>
    </section><!-- End Empty Section -->

    <!-- ======= Our Product Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Our Product</h2>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li style="padding: 0;" class="<?php if(empty($_GET['type'])) echo 'filter-active'; ?>">
                <a style="display: block; padding: 10px 20px;color: <?php if(empty($_GET['type'])) echo '#fff'; ?>" href="index.php#portfolio">All</a>
              </li>

              <?php
              foreach ($data as $d){
                ?>
                  <li style="padding: 0;" class="<?php if($_GET['type']==$d['cate_id']) echo 'filter-active'; ?>">
                    <a style="display: block; padding: 10px 20px; color: <?php if($_GET['type']==$d['cate_id']) echo '#fff'; ?>" href="index.php?type=<?php echo $d['cate_id'];?>#portfolio"><?php echo $d['cate_name'];?></a>
                  </li>
              <?php }
              ?>

            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <?php foreach ($list as $l){ ?>
          <div class="col-lg-4 col-md-6 filter-app">
            <div class="portfolio-item">
              <img src="<?php echo $l['thumb']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <a href="detail.php?id=<?php echo $l['product_id']; ?>"><?php echo $l['product_name']; ?></a>
              </div>
            </div>
          </div>
  <?php } ?>

          

        </div>

      </div>
    </section><!-- End Our Product Section -->

      <!-- ======= Empty Section ======= -->
    <section class="call-to-action">
      <div class="container">

        <div class="text-center">
        </div>

      </div>
    </section><!-- End Empty Section -->

    <!-- ======= Our Flower Artist Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Our Flower Artist</h2>
          <p>The florist in this flower shop has many years of experience in floristry-related work and has achieved good results in many floral design competitions. Hope our design can add more colors to your life!</p>
        </div>

        <div class="row" >


          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style=" margin-left: 370px;">
            <div class="member">
              <img src="assets/img/artist/artist.jpg" alt="">
              <h4>Isa Yan</h4>
              <span>Product Manager</span>
              <p>
               Show your thoughts through flowers.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Team Section -->
	<!-- ======= Empty Section ======= -->
    <section class="call-to-action">
      <div class="container">

        <div class="text-center">
        </div>

      </div>
    </section><!-- End Empty Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>If you have any problem or you want to cooperat with us please contact us!</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="contact-about">
              <h3>University of Edinburgh Florist</h3>
              <p>Make the most beautiful flowers with the best ones.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info">
              <div>
                <i class="icofont-google-map"></i>
                <p>Address <br><?php echo $p['address']; ?></p>
              </div>

              <div>
                <i class="icofont-envelope"></i>
                <p><?php echo $p['email']; ?></p>
              </div>

              <div>
                <i class="icofont-phone"></i>
                <p>+<?php echo $p['tel']; ?></p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12">
            <form action="" method="post" role="form" class="php--form">
              <div class="form-group">
                <input type="text" name="name" required class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" required name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" required name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" required rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section --><br>
	        <!-- ======= Empty Section ======= -->
    <section class="call-to-action">
      <div class="container">

        <div class="text-center">
        </div>

      </div>
    </section><!-- End Empty Section -->

    <!-- ======= Map Section ======= -->
    <section class="vote">

    </section><!-- End Map Section -->

  </main><!-- End #main -->
<?php
include 'footer.php';

?>
<script>
  <?php
  if(!empty($msg)){
  ?>
  toastr.success("<?php echo $msg;?>");
  <?php } ?>
</script>



