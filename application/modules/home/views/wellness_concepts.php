<!-- breadcrumb start -->
<div class="container">
  <div class="row">
    <div class="col-xs-12 breadcrumb-container">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>">Home</a> </li>
        <li> <a href="<?php echo base_url(); ?>">Wellness</a> </li>
        <li class="active">Wellness Concepts</li>
      </ol>
    </div>
  </div>
</div>
<!-- breadcrumb end --> 

<!-- Welcome Section start-->
<div class="blocks welcome-section inner clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h3>Wellness <span>Concepts</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum dignissim dolor vitae aliquet. Pellentesque ante arcu, semper nec est ac, rutrum sodales lorem. Nunc nisi dolor, molestie et ultrices eu, fringilla commodo augue. </p>
      </div>
      <div class="clearfix"></div>
      <div class="welcome-arts">
        <?php 
        if(isset($page_data[0])){ 
            foreach($page_data[0] as $concept){
                $media['url'] = $concept->url;
                $media['media_name'] = $concept->media_name;
                $media['raw_name'] = $concept->raw_name;
                $media['extension'] = $concept->extension;
            ?>  
          <div class="col-xs-12 col-sm-4"> <a href="<?php echo base_url('home/wellness_plus/'.  encode_url($concept->id)); ?>">
          <h2> <?php echo $concept->wellness_type; ?> </h2>
          <img src="<?php echo generate_image_media_url($media, 'small'); ?>" /></a> 
        </div>
        <?php }} ?>
        
      </div>
    </div>
  </div>
</div>
<!-- Welcome Section end --> 
<!-- Travel Destination Section -->
<div class="blocks travel-destination-sec clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h3>Travel <span>Destination</span></h3>
      </div>
      <div class="clearfix"></div>
      <div id="travel-destination-carousel" class="travel-destination-arts owl-carousel">
          
          <?php if(isset($page_data[1])){ 
              foreach($page_data[1] as $travel){ 
                   $media1['url'] = $travel->url;
                   $media1['media_name'] = $travel->media_name;
                   $media1['raw_name'] = $travel->raw_name;
                   $media1['extension'] = $travel->extension;                  
           ?>
        <div class="item">
          <figure> <a href="javascript:void(0)"><img src="<?php echo generate_image_media_url($media1, 'square'); ?>" /></a> </figure>
          <h4><?php echo $travel->continent_name ?></h4>
          <p><?php echo (strlen($travel->short_description)>130) ? substr($travel->short_description,0,130)."&hellip;" : $travel->short_description; ?></p>
          <a href="javascript:void(0)" class="btn btn-blue learn-more-btn">Learn More</a> </div>
          <?php }} ?>
       
      </div>
    </div>
  </div>
</div>
<!-- Travel Deals Section -->
<div class="blocks travel-deals-sec clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h3>Travel <span>Deals</span></h3>
      </div>
      <div class="clearfix"></div>
      <div class="travel-deals-arts">
        <div class="col-xs-12 col-md-4">
          <figure> <img src="<?php echo base_url(); ?>front/images/wellness-concepts/travel-deals-1.jpg" /> </figure>
          <h4>Early Bird</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sem risus, eleifend sed pharetra id, maximus malesuada dui.</p>
          <a href="javascript:void(0)" class="btn btn-blue learn-more-btn">Check Early Bird Deals</a> </div>
        <div class="col-xs-12 col-md-4">
          <figure> <img src="<?php echo base_url(); ?>front/images/wellness-concepts/travel-deals-2.jpg" /> </figure>
          <h4>E Wallet M Wallet</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sem risus, eleifend sed pharetra id, maximus malesuada dui.</p>
          <a href="javascript:void(0)" class="btn btn-blue learn-more-btn">Check E Wallet M Wallet Deals</a></div>
        <div class="col-xs-12 col-md-4">
          <figure> <img src="<?php echo base_url(); ?>front/images/wellness-concepts/travel-deals-3.jpg" /> </figure>
          <h4>Refferals</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sem risus, eleifend sed pharetra id, maximus malesuada dui.</p>
          <a href="javascript:void(0)" class="btn btn-blue learn-more-btn">Check Referral Deals</a></div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>


