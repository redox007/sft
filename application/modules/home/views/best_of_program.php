<!-- /#wrapper --> 

<!-- breadcrumb start -->
<div class="container">
  <div class="row">
    <div class="col-xs-12 breadcrumb-container">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>">Home</a> </li>
        <li> <a href="<?php echo base_url(); ?>">Wellness</a> </li>
        <li><a href="<?php echo base_url('home/wellness_concepts'); ?>">Wellness Concepts</a></li>
        <li> <a href="<?php echo base_url('home/wellness_plus'); ?>">Wellness Plus</a> </li>
        <li class="active"> Best of Best </li>
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
            <?php 
            if(!empty($best_of_program)){ 
                foreach($best_of_program as $list){ ?>
          <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h2><em class="best-of-best"><?php echo $list[0]->name_in_english; ?></h2>
      </div>
        <ul>
            <?php 
            if(!empty($list)){ 
                foreach($list as $item){
                    if($item->partner_id!=""){
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
              <p><?php echo (strlen($item->short_description)>130) ? substr($item->short_description,0,130)."&hellip;" : $item->short_description; ?></p>
              <a href="<?php echo base_url('home/wellness_programs/'.  encode_url($wellnes_type).'/'. encode_url($item->partner_id)); ?>" class="btn btn-blue learn-more-btn">Learn More</a></div>
          </li>
            <?php }}} ?>
          
        </ul>
          <?php }} ?>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
