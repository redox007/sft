<?php 
$list_item = get_best_of_best(); 
$list_wellness_type = get_wellness_type(); 
?>
<!-- mobile menu start -->
<div class="visible-xs visible-sm mobile-menu clearfix" data-spy="affix" data-offset-top="50" role="navigation"> 
    <button type="button" class="hamburger is-closed" data-toggle="offcanvas"> <span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span> </button>
    <a class="navbar-brand" href="http://www.patamanager.org/Members/8333" target="_blank"><img src="<?php echo base_url(); ?>front/images/sft_wellness_logo.png" alt=""></a> </div>
<!-- mobile menu end -->

<nav class="navbar visible-xs visible-sm" id="sidebar-wrapper" role="navigation">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="Javascript:void(0);" data-toggle="modal" data-target="#loginModal">Login</a></li>
            <li  class="no-space">&sdot;</li>
            <li><a href="Javascript:void(0);" data-toggle="modal" data-target="#signUpModal">Register</a></li>
        </ul>
        <a class="navbar-brand visible-lg" href="http://www.patamanager.org/Members/8333" target="_blank"><img src="<?php echo base_url(); ?>front/images/sft_wellness_logo.png" alt=""></a>
        <ul class="nav sidebar-nav navbar-nav">
            <li> <a href="<?php echo base_url(); ?>">Home</a> </li>
            <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Wellness </a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dummy-list">&nbsp;</li>
                    <li class="dropdown dropdown-submenu"><a href="<?php echo base_url('home/wellness_concepts'); ?>" class="dropdown-toggle" data-toggle="dropdown">Wellness Concepts</a>
                        <ul class="dropdown-menu">
						<?php 
                          if(!empty($list_wellness_type)){ foreach($list_wellness_type as $wellness_type){ $link = ($wellness_type->id == 1 ? 'wellness_plus' : ($wellness_type->id == 2 ? 'medi_plus' : 'beauty_plus')); ?>
                            <li class="dropdown dropdown-submenu"><a href="<?php echo base_url('home/'.$link.'/'.  encode_url($wellness_type->id)); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $wellness_type->type_name; ?></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown dropdown-submenu"><a href="<?php echo base_url('home/best_of_best/'.  encode_url(1).'/'.encode_url(1)); ?>" class="dropdown-toggle" data-toggle="dropdown">Best of Bests</a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                            if(!empty($list_item[1])){ foreach($list_item[1] as $best_of_best){?>
                                            <li><a href="<?php echo base_url('home/wellness_programs/'.  encode_url(1).'/'.encode_url($best_of_best->partner_id)); ?>"><?php echo "Best in ".$best_of_best->name_in_english; ?></a></li>
                                            <?php }} ?>                                         
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu"><a href="<?php echo base_url('home/best_of_best/'.  encode_url(1).'/'.encode_url(2)); ?>" class="dropdown-toggle" data-toggle="dropdown">Best in Region</a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                            if(!empty($list_item[1])){ foreach($list_item[2] as $best_of_region){?>
                                            <li><a href="<?php echo base_url('home/wellness_programs/'.  encode_url(2).'/'.encode_url($best_of_region->partner_id)); ?>"><?php echo "Best in ".$best_of_region->name_in_english; ?></a></li>
                                            <?php }} ?>                                             
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu"><a href="<?php echo base_url('home/best_of_best/'.  encode_url(1).'/'.encode_url(3)); ?>" class="dropdown-toggle" data-toggle="dropdown">Best of Programs</a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                            if(!empty($list_item[1])){ foreach($list_item[3] as $best_of_program){?>
                                            <li><a href="<?php echo base_url('home/wellness_programs/'.  encode_url(3).'/'.encode_url($best_of_program->partner_id)); ?>"><?php echo "Best in ".$best_of_program->name_in_english; ?></a></li>
                                            <?php }} ?>                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>
							<?php }} ?>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-submenu"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Travel Destinations</a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Africa</a></li>
                            <li><a href="javascript:void(0)">Asia</a></li>
                            <li><a href="javascript:void(0)">Australia, New Zealand &amp; Oceania</a></li>
                            <li><a href="javascript:void(0)">Europe</a></li>
                            <li><a href="javascript:void(0)">North America</a></li>
                            <li><a href="javascript:void(0)">South &amp; Central America</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Travel Deals</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">S247 </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)"> Flights</a></li>
                    <li><a href="javascript:void(0)"> Hotels</a></li>
                    <li><a href="javascript:void(0)"> Cars</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)">W.O.W </a> </li>
            <li> <a href="javascript:void(0)">ajmj club </a> </li>
            <li> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Make an Enquiry</a> </li>
            <li class="dropdown call-now"> <a href="tel:<?php echo trim($page_footer->site_contact_no, ' '); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-skype" aria-hidden="true"></i> <?php echo $page_footer->site_contact_no; ?></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)"><i class="fa fa-comments-o" aria-hidden="true"></i> Live Chat</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i> Request a Callback</a></li>
                </ul>
            </li>
            <li class="select-language">
                <form>
                    <div class="form-group">
                        <div id="Language-dropdown-mobile"
                             data-input-name="country3"
                             data-selected-country="US"
                             data-button-size=""
                             data-button-type="btn-language"
                             data-scrollable="true"
                             data-scrollable-height="250px"
                             data-countries='{"vn": "VI", "US": "EN"}'> </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</nav>

<!-- Sidebar -->
<nav class="navbar hidden-xs hidden-sm" data-spy="affix" data-offset-top="50" id="" role="navigation">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="Javascript:void(0);" data-toggle="modal" data-target="#loginModal">Login</a></li>
            <li  class="no-space">&sdot;</li>
            <li><a href="Javascript:void(0);" data-toggle="modal" data-target="#signUpModal">Register</a></li>
        </ul>
        <a class="navbar-brand hidden-xs" href="http://www.patamanager.org/Members/8333" target="_blank"><img src="<?php echo base_url(); ?>front/images/sft_wellness_logo.png" alt=""></a>
        <ul class="nav sidebar-nav navbar-nav" data-hover="dropdown" data-animations="fadeInLeft fadeInRight fadeInRight fadeInRight">
            <li> <a href="<?php echo base_url(); ?>">Home</a> </li>
            <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Wellness </a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dummy-list">&nbsp;</li>
                    <li class="dropdown"><a href="<?php echo base_url('home/wellness_concepts'); ?>">Wellness Concepts</a>
                        <ul class="dropdown-menu dropdownhover-left">
						<?php 
                          if(!empty($list_wellness_type)){ foreach($list_wellness_type as $wellness_type){ $link = ($wellness_type->id == 1 ? 'wellness_plus' : ($wellness_type->id == 2 ? 'medi_plus' : 'beauty_plus')); ?>
                            <li class="dropdown"><a href="<?php echo base_url('home/'.$link.'/'.  encode_url($wellness_type->id)); ?>"><?php echo $wellness_type->type_name; ?></a>
                                <ul class="dropdown-menu dropdownhover-left">
                                    <li class="dropdown"><a href="<?php echo base_url('home/best_of_best/'.  encode_url(1).'/'.encode_url(1)); ?>">Best of Bests</a>
                                        <ul class="dropdown-menu dropdownhover-left">
                                            <?php 
                                            if(!empty($list_item[1])){ foreach($list_item[1] as $best_of_best){?>
                                            <li><a href="<?php echo base_url('home/wellness_programs/'.  encode_url(1).'/'.encode_url($best_of_best->partner_id)); ?>"><?php echo "Best in ".$best_of_best->name_in_english; ?></a></li>
                                            <?php }} ?>  
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="<?php echo base_url('home/best_of_best/'.  encode_url(1).'/'.encode_url(2)); ?>">Best in Region</a>
                                        <ul class="dropdown-menu dropdownhover-left">
                                             <?php 
                                            if(!empty($list_item[1])){ foreach($list_item[2] as $best_of_region){?>
                                            <li><a href="<?php echo base_url('home/wellness_programs/'.  encode_url(2).'/'.encode_url($best_of_region->partner_id)); ?>"><?php echo "Best in ".$best_of_region->name_in_english; ?></a></li>
                                            <?php }} ?> 
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="<?php echo base_url('home/best_of_best/'.  encode_url(1).'/'.encode_url(3)); ?>">Best of Programs</a>
                                        <ul class="dropdown-menu dropdownhover-left">
                                            <?php 
                                            if(!empty($list_item[1])){ foreach($list_item[3] as $best_of_program){?>
                                            <li><a href="<?php echo base_url('home/wellness_programs/'.  encode_url(3).'/'.encode_url($best_of_program->partner_id)); ?>"><?php echo "Best in ".$best_of_program->name_in_english; ?></a></li>
                                            <?php }} ?> 
                                        </ul>
                                    </li>
                                </ul>
                            </li>
							<?php }} ?>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="javascript:void(0)">Travel Destinations</a>
                        <ul class="dropdown-menu dropdownhover-left">
                            <li><a href="javascript:void(0)">Africa</a></li>
                            <li><a href="javascript:void(0)">Asia</a></li>
                            <li><a href="javascript:void(0)">Australia, New Zealand &amp; Oceania</a></li>
                            <li><a href="javascript:void(0)">Europe</a></li>
                            <li><a href="javascript:void(0)">North America</a></li>
                            <li><a href="javascript:void(0)">South &amp; Central America</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Travel Deals</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">S247 </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)"> Flights</a></li>
                    <li><a href="javascript:void(0)"> Hotels</a></li>
                    <li><a href="javascript:void(0)"> Cars</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0)">W.O.W </a> </li>
            <li> <a href="javascript:void(0)">ajmj club </a> </li>
            <li> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Make an Enquiry</a> </li>
            <li class="dropdown call-now"> <a href="tel:<?php echo trim($page_footer->site_contact_no, ' '); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-skype" aria-hidden="true"></i> <?php echo $page_footer->site_contact_no; ?></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)"><i class="fa fa-comments-o" aria-hidden="true"></i> Live Chat</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i> Request a Callback</a></li>
                </ul>
            </li>
            <li class="select-language">
                <form>
                    <div class="form-group">
                        <div id="Language-dropdown-desktop"
                             data-input-name="country3"
                             data-selected-country="US"
                             data-button-size=""
                             data-button-type="btn-language"
                             data-scrollable="true"
                             data-scrollable-height="250px"
                             data-countries='{"vn": "VI", "US": "EN"}'> </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</nav>
<!-- /#sidebar-wrapper -->