<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>SFT - Wellness</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900|Condiment" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>front/images/sft_wellness_fav_icon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap.min.css" type="text/css">

<!-- Bootstrap Theme -->
<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap-theme.min.css" type="text/css">

<!-- Animate css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/animate.css" type="text/css">

<!-- Dropdown css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap-dropdownhover.min.css" type="text/css">

<!-- Owl Carousel Assets -->
<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/owl.carousel.css"  type="text/css">
<link  rel="stylesheet" href="<?php echo base_url(); ?>front/css/owl.theme.css"  type="text/css">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/rs-plugin/css/settings.css"/>

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front/css/flags.css"/>

<!-- Customise -->
<link rel="stylesheet" href="<?php echo base_url(); ?>front/sass/custom.css" type="text/css">

<!-- Devloper Specific css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/devlop-specific-css.css" type="text/css">

<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/datepicker.css" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- START REVOLUTION SLIDER 4.6.5 fullscreen mode -->
<div id="wrapper" class="tp-banner-container">

  <!-- overlay start work after open mobile nav -->
  <div class="overlay"></div>
  <!-- overlay start work after open mobile nav -->

  <!-- overlay gradient -->
  <div class="overlay-banner"></div>
  <!-- overlay gradient -->
  <header>
    <?php echo isset($menu)?$menu:""; ?>
  </header>

  <?php echo isset($banner)?$banner:""; ?>
</div>
<!-- /#wrapper -->


<?php echo isset($content)?$content:""; ?>

<?php echo isset($why_travel_with_us)?$why_travel_with_us:""; ?>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-3 clearfix footer-comp-description">
        <figure><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>front/images/sft_wellness_logo.png" alt=""></a></figure>
        <?php echo $page_footer->footer_desc;?>
      </div>
      <div class="col-md-9 clearfix footer-right">
        <div class="row">
          <div class="col-xs-12 clearfix">
            <form class="form-inline newsletter-form" action="." enctype="multipart/form-data">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
              </div>
              <input type="submit" class="btn btn-blue newsletter" value="Newsletter Signup">
            </form>
          </div>
          <div class="col-xs-6 col-md-6 col-lg-2 clearfix">
            <h4>Explore More</h4>
            <ul>
              <li><a href="javascript:void(0)">Core Values</a></li>
              <li><a href="javascript:void(0)">Careers</a></li>
              <li><a href="javascript:void(0)">Why Us</a></li>
              <li><a href="javascript:void(0)">FAQ</a></li>
              <li><a href="javascript:void(0)">Terms &amp; Conditions</a></li>
              <li><a href="javascript:void(0)">Privecy Policy</a></li>
            </ul>
          </div>
          <div class="col-xs-6 col-md-6 col-lg-3 clearfix">
            <h4>Travel Agents</h4>
            <p class="agent">As an agent of change, you have the power to change the world.<br>
              <a href="javascript:void(0)" class="btn btn-blue agent">agent login</a></p>
            <a href="" class="new-agency">New Agency? <span>Register here.</span></a> </div>
          <div class="col-xs-6 col-md-6 col-lg-3 clearfix">
            <h4>Contact Us</h4>
            <address>
            <?php echo $page_footer->site_address;?>
            </address>
            <p>
              <label>Email:</label>
              <a href="mailto:<?php echo $page_footer->site_email;?>"><?php echo $page_footer->site_email;?></a></p>
            <p>
              <label>Contact no:</label>
              <a href="tel:<?php echo trim($page_footer->site_contact_no, ' ');?>" class="contact"><?php echo $page_footer->site_contact_no;?></a></p>
          </div>
          <div class="col-xs-6 col-md-6 col-lg-4 clearfix">
            <h4>Our Other Links</h4>
            <ul>
              <li><a href="http://www.sftadventures.com.vn/" target="_blank">http://www.sftadventures.com.vn/</a></li>
              <li><a href="http://www.sftluxury.com.vn/" target="_blank">http://www.sftluxury.com.vn/</a></li>
              <li><a href="http://www.sfttweenteen.com.vn/" target="_blank">http://www.sfttweenteen.com.vn/</a></li>
              <li><a href="http://www.sfttweenteen.com.vn/" target="_blank">http://www.sfttweenteen.com.vn/</a></li>
              <li><a href="http://www.sfttopmice.com.vn/" target="_blank">http://www.sfttopmice.com.vn/</a></li>
              <li><a href="http://www.sftsportngolf.com.vn/" target="_blank">http://www.sftsportngolf.com.vn/</a></li>
              <li><a href="http://sftcharmingvietnam.com.vn/" target="_blank">http://sftcharmingvietnam.com.vn/</a></li>
              <li><a href="http://www.sftmindmastery.com.vn/" target="_blank">http://www.sftmindmastery.com.vn/</a></li>
              <li><a href="http://www.sfttraveller.com.vn/" target="_blank">http://www.sfttraveller.com.vn/</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
           <ul class="col-xs-12 col-sm-6">
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            <li><a href="javascript:void(0)" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
          </ul>
          <p class="col-xs-12 col-sm-6 copyright">&copy; Copyright SFT Corporation 2017</p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Modal window for sign in / sign up start -->
<div class="modal fade" id="loginModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo base_url(); ?>front/images/register/modal-close.png" /></button>
        <h4>SIGN IN</h4>
        <img src="<?php echo base_url(); ?>front/images/register/fb-login.jpg"/> <img src="<?php echo base_url(); ?>front/images/register/linked-in-login.jpg"/> <img src="<?php echo base_url(); ?>front/images/register/google-login.jpg"/>
        <h5><span>Or with your Email</span></h5>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password">
          </div>
          <label><a href="javascript:void();">Forgot Password?</a></label>
          <button type="submit" class="btn btn-success btn-block">Sign In</button>
        </form>
      </div>
      <div class="modal-footer">
        <p>No account? <a href="javascript:void(0)">Start here</a></p>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="signUpModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo base_url(); ?>front/images/register/modal-close.png" /></button>
        <h4>SIGN UP</h4>
        <img src="<?php echo base_url(); ?>front/images/register/fb-login.jpg"/> <img src="<?php echo base_url(); ?>front/images/register/linked-in-login.jpg"/> <img src="<?php echo base_url(); ?>front/images/register/google-login.jpg"/>
        <h5><span>Or with your Email</span></h5>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-success btn-block">Sign Up</button>
        </form>
      </div>
      <div class="modal-footer">
        <p>Sign in to reveal exclusive deals and book faster! <a href="javascript:void(0)">Sign in</a></p>
        <p>Interested in <span>AJMJ Club?</span></p>
        <p>By having an account you are agreeing with our <a href="javascript:void(0)">Terms and Conditions</a> and <a href="javascript:void(0)">Privacy Statement</a></p>
      </div>
    </div>
  </div>
</div>
<!-- Modal window for sign in / sign up end -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>front/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>front/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url(); ?>front/js/ie10-viewport-bug-workaround.js"></script>
<!-- fontawesome -->
<script src="https://use.fontawesome.com/1c6768a440.js"></script>
<!-- bootstarp mouse hover plugin -->
<script src="<?php echo base_url(); ?>front/js/bootstrap-dropdownhover.js"></script>
<!-- bootstarp Nvigation plugin -->
<script src="<?php echo base_url(); ?>front/js/navigation.js"></script>
<!-- OWl Carousel plugin -->
<script src="<?php echo base_url(); ?>front/js/owl.carousel.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="<?php echo base_url(); ?>front/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>front/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- Flag  -->
<script src="<?php echo base_url(); ?>front/js/jquery.flagstrap.min.js"></script>
<!-- Rev Slider  -->
<script src="<?php echo base_url(); ?>front/js/rev-slider.js"></script>
<!-- Home Owl Slider  -->
<script src="<?php echo base_url(); ?>front/js/home-owl-slider.js"></script>

<script src="<?php echo base_url(); ?>front/js/wellness-owl-slider.js"></script> 
<!-- itinerary scroll --> 
<script src="<?php echo base_url(); ?>front/js/itinerary.js"></script> 
<script src="<?php echo base_url(); ?>front/js/bootstrap-datepicker.js"></script> 

<script>
$(document).ready(function () {
	//flagStrap
	$('#advanced').flagStrap({
        buttonSize: "btn-lg",
        buttonType: "btn-primary",
        labelMargin: "5px",
        scrollable: false,
        scrollableHeight: "350px"
    });

    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
	
	//flagStrap
	$('#Language-dropdown-desktop').flagStrap({
	    buttonSize: "btn-lg",
	    buttonType: "btn-primary",
	    labelMargin: "5px",
	    scrollable: false,
	    scrollableHeight: "350px"
	});
	$('#Language-dropdown-mobile').flagStrap({
		buttonSize: "btn-lg",
		buttonType: "btn-primary",
		labelMargin: "5px",
		scrollable: false,
		scrollableHeight: "350px"
	});
	$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
	    event.preventDefault();
	    event.stopPropagation();
	    $(this).parent().siblings().removeClass('open');
	    $(this).parent().toggleClass('open');
	});

  $('#type_of_room').change(function(){
        var room = $(this).val();
        $.ajax({
            url:"<?php echo base_url(); ?>home/ajax_get_image",
            type: 'POST',
            data: {room:room},
            success: function (data, textStatus, jqXHR) {
                
               $('.room-type').html(data);         
            }
        });
    });

});


var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	 
	var checkin = $('#adate').datepicker({
            format: 'yyyy-mm-dd',
		onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		}
	}).on('changeDate', function(ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 1);
			checkout.setValue(newDate);
		}
		checkin.hide();
		$('#dpd2')[0].focus();
	}).data('datepicker');
	var checkout = $('#ddate').datepicker({
             format: 'yyyy-mm-dd',
		onRender: function(date) {
			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		}
	}).on('changeDate', function(ev) {
		checkout.hide();
	}).data('datepicker');
</script>
</body>
</html>
