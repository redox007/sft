<!-- /#wrapper --> 

<!-- breadcrumb start -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 breadcrumb-container">
            <ol class="breadcrumb">
                <li> <a href="index.html">Home</a> </li>
                <li> <a href="#">Wellness</a> </li>
                <li> <a href="#">Wellness Concepts</a> </li>
                <li> <a href="#">Wellness Plus</a> </li>
                <li> <a href="#">Thailand Kamalaya</a> </li>
                <li> <a href="#">Diamond</a> </li>
                <li> <a href="#">Basic Diamond</a> </li>
                <li class="active">Overview</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end --> 

<!-- Discover Section start-->
<div class="blocks welcome-section inner program clearfix">
    <div class="container">
        <div class="row"> 

            <!--overview-details start-->
            <div class="col-xs-12 overview-details"> 
                <!-- Nav tabs -->
                <ul id="tabs" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#overview" role="tab" data-toggle="tab">Overview</a></li>
                    <li role="presentation"><a href="#online" role="tab" data-toggle="tab">Full Itinerary</a></li>
                </ul>
                <div class="tab-content clearfix"> 
                    <!--overview start-->
                    <div role="tabpanel" class="tab-pane overview fade in active clearfix" id="overview"> 

                        <!--quick-package-view start-->
                        <section class="quick-package-view">
							<div class="right-part">
								<a href="<?php echo base_url('home/wellness_enquery/'.encode_url($wellness_details->partner_id)); ?>" class="btn btn-enquiry"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Make An Enquiry</a> <a class="btn btn-widhlist"><i class="fa fa-heart" aria-hidden="true"></i> Save to Wishlist</a> <a href="<?php echo base_url('home/download_file/'.$wellness_details->pdf); ?>" class="btn btn-pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download <strong>PDF</strong></a>
							</div>
							  <p class="code">Trip code: <span><?php echo $wellness_details->code; ?></span></p>
							  <h4><?php echo $wellness_details->no_of_day; ?> <strong>Days</strong> <!--<span>Nairobi to Nairobi</span>--></h4>
							  <p class="price"><!--<span>From</span>--><span><sup>$</sup><?php echo $wellness_details->price; ?><em>USD</em></span></p>
							  <p class="share"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></p>                   
                        </section>
                        <!--quick-package-view end-->

                        <h3>Package <span>Overview</span></h3>
                        <p><?php echo $wellness_details->description; ?></p>
                    </div>
                    <!--overview end--> 
                    <!--online start-->
                    <div role="tabpanel" class="tab-pane online fade clearfix" id="online"> 
                        <!--itinery-information start-->

                        <section class="itinery-information clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <p class="trip-update">&nbsp;</p>
                                <p class="trip-departure-time">&nbsp;</p>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="pull-right clearfix"><a href="<?php echo base_url('home/wellness_enquery/'.encode_url($wellness_details->partner_id)); ?>" class="btn btn-enquiry"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Make An Enquiry</a> <a class="btn btn-widhlist"><i class="fa fa-heart" aria-hidden="true"></i> Save to Wishlist</a> <a href="<?php echo base_url('home/download_file/'.$wellness_details->pdf); ?>" class="btn btn-pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download <strong>PDF</strong></a></div>
                            </div>
                        </section>
                        <!--itinery-information end-->
                        <div class="clearfix"></div>
                        <section class="itinery-overfiew clearfix">
                            <div class="col-xs-12 col-sm-4">
                                <ul class="day-list clearfix">
                                  

                                    <?php if (!empty($itinerary)) {
                                        foreach ($itinerary as $l => $item) {
                                            ?>
                                            <li sft-program-Id="day<?php echo $item->day_number; ?>" <?php echo ($l == 0) ? "class='active'" : ""; ?> ><a class="searchbychar" href="#" data-target="day<?php echo $item->day_number; ?>">Day <?php echo $item->day_number; ?></a></li>
    <?php }
} ?>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <ul class="day-description clearfix">
<?php if (!empty($itinerary)) {
    foreach ($itinerary as $key => $x) {
		 		$media['url'] = $x->url;
                $media['media_name'] = $x->media_name;
                $media['raw_name'] = $x->raw_name;
                $media['extension'] = $x->extension;
        ?>     
                                            <li id="day<?php echo $x->day_number; ?>" <?php echo ($key == 0) ? "class='active'" : ""; ?> >
                                                <div class="col-xs-12 col-sm-3">
                                                    <figure><img src="<?php echo generate_image_media_url($media, 'wellness_type'); ?>" alt=""></figure>
                                                </div>
                                                <div class="col-xs-12 col-sm-9 content">
                                                    <h3>Day<span><?php echo $x->day_number; ?></span></h3>
                                                    <p><?php echo $x->description; ?></p>
                                                </div>
                                            </li>
    <?php }
} ?>   
                                </ul>
                            </div>
                        </section>
                    </div>
                    <!--online end--> 
                </div>
            </div>
            <!--overview-details start--> 

            <!-- Discover Title start-->
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <h3>Discover <span>Program</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum dignissim dolor vitae aliquet. Pellentesque ante arcu, semper nec est ac, rutrum sodales lorem. Nunc nisi dolor, molestie et ultrices eu, fringilla commodo augue. </p>
            </div>
            <!-- Discover Title end--> 

        </div>
    </div>
</div>
<!-- Discover Section end --> 

<!-- Travel Destination Section -->
<div class="blocks travel-destination-sec no-space clearfix">
    <div class="container">
        <div class="row">
            <div id="travel-destination-carousel" class="travel-destination-arts owl-carousel">
                <?php 
                if(!empty($programs)){ foreach($programs as $pro){
                    $media['url'] = $pro->url;
                    $media['media_name'] = $pro->media_name;
                    $media['raw_name'] = $pro->raw_name;
                    $media['extension'] = $pro->extension;
                    ?>
                <div class="item">
                    <figure> <a href="javascript:void(0)"><img src="<?php echo generate_image_media_url($media, 'square'); ?>" /></a> </figure>
                    <h4><?php echo $pro->program_name; ?></h4>
                    <p><?php echo $pro->short_description; ?></p>
                    <a href="javascript:void(0)" class="btn btn-blue learn-more-btn">Learn More</a> </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!-- Travel Deals Section -->
