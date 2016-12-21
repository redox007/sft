<!-- /#wrapper --> 

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
            <?php 
            if(!empty($partners)){ 
                foreach($partners as $item){
					$media1['url'] = $item->url;
				    $media1['media_name'] = $item->media_name;
                    $media1['raw_name'] = $item->raw_name;
                    $media1['extension'] = $item->extension;
                ?>
          <li class="col-xs-6 col-md-4">
            <div class="destination-point">
              <figure> <img src="<?php echo generate_image_media_url($media1, 'square'); ?>" /> </figure>
              <h4><?php echo $item->country_name." ".$item->partner_name; ?></h4>
              <p><?php echo (strlen($item->short_description)>130) ? substr($item->short_description,0,130)."&hellip;" : $item->short_description; ?></p>
              <a href="<?php echo base_url('home/wellness_programs/'.  encode_url($item->wellness_type_id).'/'. encode_url($item->id)); ?>" class="btn btn-blue learn-more-btn">Learn More</a></div>
          </li>
            <?php }} ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
