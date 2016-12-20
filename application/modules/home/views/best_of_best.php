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
        <h3><em class="best-of-best">Best</em>of the <span>Best</span></h3>
      </div>
      <div class="clearfix"></div>
      <div class="travel-destination-arts clearfix">
        <ul>
            <?php 
            if(!empty($best_of_best)){ 
                foreach($best_of_best as $item){
                    $media['url'] = $item->url;
                $media['media_name'] = $item->media_name;
                $media['raw_name'] = $item->raw_name;
                $media['extension'] = $item->extension;
                ?>
          <li class="col-xs-6 col-md-4">
            <div class="destination-point">
			  <h4><em class="best-of-best">Best in</em> <?php echo $item->name_in_english; ?></h4>
              <figure> <img src="<?php echo generate_image_media_url($media, 'square'); ?>" /> <span class="best-in-badge"><img src="<?php echo base_url(); ?>front/images/wellness-concepts/best-in-badge.png" class="img-responsive" alt=""></span> </figure>
              <h4><?php echo $item->country_name." ".$item->partner_name; ?></h4>
              <p><?php echo $item->short_description; ?></p>
              <a href="<?php echo base_url('home/wellness_programs/'.  encode_url($wellnes_type).'/'. encode_url($item->partner_id)); ?>" class="btn btn-blue learn-more-btn">Learn More</a></div>
          </li>
            <?php }} ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
