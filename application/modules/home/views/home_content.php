
<!-- Welcome Section start-->
<div class="blocks welcome-section clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h3><?php echo $home_page_data->welcome_txt_title;?></h3>
        <?php echo $home_page_data->welcome_txt_desc1;?>
        <a href="javascript:void(0);" class="btn btn-blue learn-more-btn">Learn More</a>
        <h4>Whatever your style is, <span>See it your way</span></h4>
        <?php echo $home_page_data->welcome_txt_desc2;?>
      </div>
      <div class="clearfix"></div>
      <div class="welcome-arts">
        <div class="col-xs-12 col-sm-4"> <a href="javascript:void(0)">
          <h2> Wellness <span>Plus</span> </h2>
          <img src="<?php echo base_url(); ?>front/images/welcome-arts/welcome-art-1.jpg" /></a> </div>
        <div class="col-xs-12 col-sm-4"> <a href="javascript:void(0)">
          <h2> Medi <span>Plus</span> </h2>
          <img src="<?php echo base_url(); ?>front/images/welcome-arts/welcome-art-2.jpg" /> </a></div>
        <div class="col-xs-12 col-sm-4"> <a href="javascript:void(0)">
          <h2> Beauty <span>Plus</span> </h2>
          <img src="<?php echo base_url(); ?>front/images/welcome-arts/welcome-art-3.jpg" /></a> </div>
      </div>
    </div>
  </div>
</div>
<!-- Welcome Section end -->
<!-- Best Offer Section start-->
<div class="blocks clearfix best-offer">
  <h3><?php echo $home_page_data->best_offer_title;?></h3>
  <span class="description"><?php echo $home_page_data->best_offer_desc;?></span>
  <div id="bestoffer-carousel" class="offers-portfolio owl-carousel">
    <div class="col-xs-12 col-md-4">
      <section class="clearfix"> <img src="<?php echo base_url(); ?>front/images/offer/offer-port-1.jpg" alt="port-1" />
        <div class="offer-rebate">Best Deals <span>10%</span> Off</div>
        <div class="offer-details">
          <p><span>Kerala</span><span>12 Days</span></p>
          <p><span>Fitness Program</span><span>&#36;5,200</span></p>
        </div>
      </section>
      <section>
        <div class="offer-rebate">Best Deals <span>5%</span> Off</div>
        <div class="offer-details">
          <p><span>India</span><span>15 Days</span></p>
          <p><span>Pranayama Session</span><span>&#36;2,200</span></p>
        </div>
        <img src="<?php echo base_url(); ?>front/images/offer/offer-port-2.jpg" alt="port-2" />
        <div class="offer-rebate">Best Deals <span>4%</span> Off</div>
        <div class="offer-details">
          <p><span>Vietnam</span><span>8 Days</span></p>
          <p><span>Fitness Plus</span><span>&#36;2,200</span></p>
        </div>
      </section>
    </div>
    <div class="col-xs-12 col-md-4">
      <section class="clearfix"> <img src="<?php echo base_url(); ?>front/images/offer/offer-port-3.jpg" alt="port-3" />
        <div class="offer-rebate">Best Deals <span>10%</span> Off</div>
        <div class="offer-details">
          <p><span>Italy</span><span>1 Days</span></p>
          <p><span>Green Peace</span><span>&#36;2,200</span></p>
        </div>
      </section>
      <section class="clearfix"> <img src="<?php echo base_url(); ?>front/images/offer/offer-port-4.jpg" alt="port-4" />
        <div class="offer-rebate">Best Deals <span>12%</span> Off</div>
        <div class="offer-details">
          <p><span>France</span><span>12 Days</span></p>
          <p><span>Fitness Program</span><span>&#36;5,200</span></p>
        </div>
      </section>
    </div>
    <div class="col-xs-12 col-md-4">
      <section class="clearfix"> <img src="<?php echo base_url(); ?>front/images/offer/offer-port-5.jpg" alt="port-5" />
        <div class="offer-rebate">Best Deals <span>20%</span> Off</div>
        <div class="offer-details">
          <p><span>Hongkong</span><span>15 Days</span></p>
          <p><span>Only fitness</span><span>&#36;10,000</span></p>
        </div>
      </section>
      <section class="clearfix"> <img src="<?php echo base_url(); ?>front/images/offer/offer-port-6.jpg" alt="port-6" />
        <div class="offer-rebate">Best Deals <span>21%</span> Off</div>
        <div class="offer-details">
          <p><span>Usa</span><span>8 Days</span></p>
          <p><span>Body Massage</span><span>&#36;2,200</span></p>
        </div>
      </section>
    </div>
    <div class="col-xs-12 col-md-4">
      <section class="clearfix"> <img src="<?php echo base_url(); ?>front/images/offer/offer-port-7.jpg" alt="port-7" />
        <div class="offer-rebate">Best Deals <span>30%</span> Off</div>
        <div class="offer-details">
          <p><span>India</span><span>3 Days</span></p>
          <p><span>Ayurveda Session</span><span>&#36;8,200</span></p>
        </div>
      </section>
      <section class="clearfix"> <img src="<?php echo base_url(); ?>front/images/offer/offer-port-8.jpg" alt="port-8" />
        <div class="offer-rebate">Best Deals <span>20%</span> Off</div>
        <div class="offer-details">
          <p><span>Thailand</span><span>10 Days</span></p>
          <p><span>Body Spa</span><span>&#36;5,200</span></p>
        </div>
      </section>
    </div>
  </div>
</div>
<!-- Best Offer Section end-->
<!-- New Tour Section start-->
<div class="blocks clearfix new-tour">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <h3><?php echo $home_page_data->toor_title;?></h3>
        <?php echo $home_page_data->toor_desc;?>
        <div class="tour-video clearfix">
          <?php echo $home_page_data->toor_media;?>
        </div>
        <a href="javascript:void(0);" class="btn btn-blue learn-more-btn">Learn More</a> </div>
    </div>
  </div>
</div>
<!-- New Tour Section end-->
<!-- Why Choose Us start-->
<div class="blocks clearfix why-choose-us">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <h3><?php echo $home_page_data->why_choose_title;?></h3>
        <?php echo $home_page_data->why_choose_desc;?>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <ul class="choose-list">
        <li class="col-xs-12 col-sm-6 col-md-4">
          <div>
            <h3>Handpicked Hotels</h3>
            <?php echo $home_page_data->why_choose_details1;?>
            <a href="javascript:void(0)">Learn More</a></div>
        </li>
        <li class="col-xs-12 col-sm-6 col-md-4">
          <div>
            <h3>World Class Service</h3>
            <?php echo $home_page_data->why_choose_details2;?>
            <a href="javascript:void(0)">Learn More</a></div>
        </li>
        <li class="col-xs-12 col-sm-6 col-md-4">
          <div>
            <h3>Best Price Guarantee</h3>
            <?php echo $home_page_data->why_choose_details3;?>
            <a href="javascript:void(0)">Learn More</a></div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- Why Choose Us end-->
<!-- Portfolio Section start-->
<div class="blocks container clearfix sft-portfolio">
  <h3><?php echo $home_page_data->portfolio_title;?></h3>
  <?php echo $home_page_data->portfolio_desc;?>
  <div id="portfolio-carousel" class="owl-carousel portfolio-carousel">
    <div class="item"><a href="http://www.sftadventures.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-adventure.png" alt="adventure"></a></div>
    <div class="item"><a href="http://sftcharmingvietnam.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-charming.png" alt="charming"></a></div>
    <div class="item"><a href="http://www.sftluxury.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-luxury.png" alt="luxury"></a></div>
    <div class="item"><a href="http://sftmindmastery.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-mind-mastery.png" alt="mind-mastery"></a></div>
    <div class="item"><a href="http://www.sftsportngolf.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-sport-&-golf.png" alt="sport-golf"></a></div>
    <div class="item"><a href="http://www.sfttopmice.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-topmice.png" alt="topmice"></a></div>
    <div class="item"><a href="http://www.sfttweenteen.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-tweenteen.png" alt="tweenteen"></a></div>
    <div class="item"><a href="http://sftwellness.com.vn/" target="_blank"><img class="owl-lazy" data-src="<?php echo base_url(); ?>front/images/portfolio/logo-wellness.png" alt="wellness"></a></div>
  </div>
</div>
<!-- Portfolio Section end-->
<!-- Library Section -->
<div class="blocks library-section clearfix">
  <h3><?php echo $home_page_data->library_title;?></h3>
  <?php echo $home_page_data->library_desc;?>
  <div id="library-carousel" class="owl-carousel">
     <?php
      if(!empty($library_medias)){ //print_r($library_medias);die;
        foreach($library_medias as $lmedia){?>
          <div class="item"><?php $str = $lmedia;
          if(strstr($str, 'medias') == true){?>
            <h3>LOREM IPSUM DOLOR SIT AMET <span>ON 5<sup>TH</sup> OCTOBER 2016</span></h3>
            <img src="<?php echo base_url().$lmedia; ?>"/><?php
          }else{
            echo $lmedia;
          }?>
          </div><?php
        }
      }?>
    </div>
  </div>
</div>
<!-- Partners Section -->
<div class="blocks our-partner-section clearfix">
  <div class="container">
    <h3><?php echo $home_page_data->partner_title;?></h3>
    <?php echo $home_page_data->partner_desc;?>
    <div id="partners-carousel" class="owl-carousel partners-carousel">
      <?php if(!empty($partner_medias)){
        foreach($partner_medias as $img_name => $logo){?>
          <div class="item">
            <img class="owl-lazy" data-src="<?php echo base_url().$logo; ?>" alt="<?php echo $img_name; ?>">
          </div><?php
        }
      }?>
    </div>
  </div>
</div>
<!-- Club Section -->
<div class="blocks container club-section clearfix">
  <h3><?php echo $home_page_data->ajmj_title;?></h3>
  <?php echo $home_page_data->ajmj_desc;?><?php
  if(!empty($ajmj_medias)){?>
    <img src="<?php echo base_url().$ajmj_medias[0];?>" /> <?php
  }?>
  <a href="javascript:void(0)" class="btn btn-blue learn-more-btn">Learn More</a>
</div>
