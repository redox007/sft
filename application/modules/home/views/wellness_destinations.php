
<!-- breadcrumb start -->
<div class="container">
  <div class="row">
    <div class="col-xs-12 breadcrumb-container">
      <ol class="breadcrumb">
        <li> <a href="index.html">Home</a> </li>
        <li> <a href="#">Wellness</a> </li>
        <li class="active">Wellness Concepts</li>
      </ol>
    </div>
  </div>
</div>
<!-- breadcrumb end --> 

<!-- Travel Destination Section -->
<div class="blocks travel-destination-sec no-space clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h3>Travel <span>Destinations</span></h3>
      </div>
      <div class="clearfix"></div>
      <div class="travel-destination-arts clearfix">
        <ul>
            <?php if(isset($continents)){ 
              foreach($continents as $continent){
				  $media1['url'] = $continent->url;
				  $media1['media_name'] = $continent->media_name;
                  $media1['raw_name'] = $continent->raw_name;
                  $media1['extension'] = $continent->extension;
			 ?>
          <li class="col-xs-6 col-md-4">
            <div class="destination-point">
              <figure> <img src="<?php echo generate_image_media_url($media1, 'square'); ?>" /> </figure>
              <h4><?php echo $continent->continent ?></h4>
              <p><?php echo (strlen($continent->short_description)>130) ? substr($continent->short_description,0,130)."&hellip;" : $continent->short_description; ?></p>
              <a href="<?php echo base_url('home/wellness_partners/'.encode_url($continent->continent_id)); ?>" class="btn btn-blue learn-more-btn">Learn More</a></div>
          </li>
        <?php }} ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

