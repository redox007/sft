<!-- breadcrumb start -->
<div class="container">
  <div class="row">
    <div class="col-xs-12 breadcrumb-container">
      <ol class="breadcrumb">
        <li> <a href="index.html">Home</a> </li>
        <li> <a href="#">Wellness</a> </li>
        <li> <a href="#">Wellness Concepts</a> </li>
        <li> <a href="#">Wellness Plus</a> </li>
        <li class="active">Thailand Kamalaya</li>
      </ol>
    </div>
  </div>
</div>
<!-- breadcrumb end -->

<!-- Welcome Section start-->
<div class="blocks welcome-section inner program clearfix">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h3>Discover <span>Program</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum dignissim dolor vitae aliquet. Pellentesque ante arcu, semper nec est ac, rutrum sodales lorem. Nunc nisi dolor, molestie et ultrices eu, fringilla commodo augue. </p>
      </div>
    </div>
  </div>
</div>
<!-- Welcome Section end --> 

<!-- Travel Destination Section -->
<div class="blocks travel-destination-sec no-space clearfix">
  <div class="container">
    <div class="row">
      <div class="travel-destination-arts clearfix">
        <ul>
            <?php 
            if(isset($programs)){ 
                foreach($programs as $program){
                    $media['url'] = $program->url;
                    $media['media_name'] = $program->media_name;
                    $media['raw_name'] = $program->raw_name;
                    $media['extension'] = $program->extension;
                ?>
          <li class="col-xs-6 col-md-4">
            <div class="destination-point">
              <figure> <img src="<?php echo generate_image_media_url($media, 'square'); ?>" /> </figure>
              <h4><?php echo $program->program_name; ?></h4>
              <p><?php echo (strlen($program->short_description)>130)?substr($program->short_description,0,130)."....":$program->short_description; ?></p>
              <a href="<?php echo base_url('home/wellness_programs_day/'.encode_url($program->id)); ?>" class="btn btn-blue learn-more-btn">Learn More</a></div>
          </li>
            <?php }} ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

