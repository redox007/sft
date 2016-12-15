
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
        <h3>Travel <span>Destination</span></h3>
      </div>
      <div class="clearfix"></div>
      <div class="travel-destination-arts clearfix">
        <ul>
            <?php if(isset($continents)){ 
              foreach($continents as $travel){ ?>
          <li class="col-xs-6 col-md-4">
            <div class="destination-point">
              <figure> <img src="<?php echo base_url(); ?>front/images/wellness-concepts/travel-destination-01.jpg" /> </figure>
              <h4><?php echo $travel->continent_name ?></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sem risus, eleifend sed pharetra id, maximus malesuada dui.</p>
              <a href="javascript:void(0)" class="btn btn-blue learn-more-btn">Learn More</a></div>
          </li>
        <?php }} ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>

