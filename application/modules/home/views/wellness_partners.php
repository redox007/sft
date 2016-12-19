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
                ?>
          <li class="col-xs-6 col-md-4">
            <div class="destination-point">
              <figure> <img src="<?php echo base_url(); ?>front/images/wellness-concepts/travel-destination-01.jpg" /> </figure>
              <h4><?php echo $item->partner_name; ?></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sem risus, eleifend sed pharetra id, maximus malesuada dui.</p>
              <a href="<?php echo base_url('home/wellness_programs/'.  encode_url($item->wellness_type_id).'/'. encode_url($item->id)); ?>" class="btn btn-blue learn-more-btn">Learn More</a></div>
          </li>
            <?php }} ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
