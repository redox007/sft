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
        <li class="active">Make an Enquiry</li>
      </ol>
    </div>
  </div>
</div>
<!-- breadcrumb end --> 

<!-- Enquery Section start-->
<div class="blocks welcome-section inner learfix">
  <div class="container">
    <div class="row"> 
        <?php if ($this->session->flashdata('error_message')) { ?>
                <div class="alert alert-warning">
                    <?php echo $this->session->flashdata('error_message'); ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success_message')) { ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success_message'); ?>
                </div>
            <?php } ?>
      <!-- Enquery Title start-->
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <h3>Make <span>An Enquiry</span></h3>
      </div>
      <!-- Enquery Title end-->
      <form action="" enctype="multipart/form-data" method="post" class="wellness-enquery">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group f-field clearfix">
            <label for="fname">First Name</label>
            <div class="clearfix"></div>
            <select class="form-control" name="start_name">
              <option>Mr.</option>
              <option>Mrs.</option>
			  <option>Ms.</option>
            </select>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
          </div>
          <div class="form-group">
            <label for="pnumber">Phone Number</label>
            <input type="tel" class="form-control" id="pnumber" name="pnumber" placeholder="Phone Number">
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <label for="adate">Arrival Date</label>
            <input type="text" class="form-control" id="adate" name="adate" placeholder="Arrival Date" required>
          </div>
          <div class="form-group">
            <label for="nAdult">Number of Adults</label>
            <input type="number" class="form-control" id="nAdult" name="nAdult" placeholder="Number of Adults" required>
          </div>
           <div class="form-group">
            <label>Wellness Type</label>
            <select class="form-control" id="wellness_type" name="wellness_type">
                <option value="1">Wellness Plus</option>
                <option value="2">Medi Plus</option>
                <option value="3">Beauty Plus</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nroom">Number of Rooms</label>
            <input type="number" class="form-control" id="nroom" name="nroom" placeholder="Number of Rooms" required>
          </div>
          <div class="form-group">
            <label for="nAdult">Type of Rooms</label>
            <select class="form-control" id="type_of_room" name="type_of_room">
                <?php 
                if(!empty($room_type)){
                    foreach($room_type as $room){ ?>
                <option  value="<?php echo $room->id; ?>"><?php echo $room->room_type; ?></option>   
                <?php     }
                }
                ?>
              
            </select>
          </div>
         
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="countryname">Country</label>
            <input type="text" class="form-control" id="countryname" name="countryname" placeholder="Country">
          </div>
          <div class="form-group">
            <label for="re-email">Re-Type Email Address</label>
            <input type="email" class="form-control" id="re-email" placeholder="Re-Type Email Address">
          </div>
          <div class="form-group">
            <label for="adate">Departure Date</label>
            <input type="text" class="form-control" id="ddate" name="ddate" placeholder="Departure Date" required>
          </div>
          <div class="form-group">
            <label for="nAdult">Number of Childrens</label>
            <input type="number" class="form-control" id="nchild" name="nchild" placeholder="Number of Childrens" required>
          </div>
          <div class="form-group">
            <label>Additional Comments &amp; Requests</label>
            <textarea class="form-control" rows="3" placeholder="Type here..." name="comment"></textarea>
          </div>
        </div>
        <div class="clearfix"></div>
        <ul class="room-type clearfix">
          	<li class="col-xs-12 col-md-4"><img src="<?php echo base_url(); ?>front/images/wellness-concepts/room-type/01.jpg" alt=""></li>
            <li class="col-xs-12 col-md-4"><img src="<?php echo base_url(); ?>front/images/wellness-concepts/room-type/02.jpg" alt=""></li>
            <li class="col-xs-12 col-md-4"><img src="<?php echo base_url(); ?>front/images/wellness-concepts/room-type/03.jpg" alt=""></li>
            <li class="col-xs-12 col-md-4"><img src="<?php echo base_url(); ?>front/images/wellness-concepts/room-type/04.jpg" alt=""></li>
            <li class="col-xs-12 col-md-4"><img src="<?php echo base_url(); ?>front/images/wellness-concepts/room-type/05.jpg" alt=""></li>
            <li class="col-xs-12 col-md-4"><img src="<?php echo base_url(); ?>front/images/wellness-concepts/room-type/06.jpg" alt=""></li>
          </ul>
        <div class="clearfix"></div>
        <div class="form-group text-center enquery-submit-area">
          <p>If you would like some help in choosing a Wellness Program, one of our consultants would be happy to advise you. You can contact them via SKYPE, live chat, email or telephone.</p>
          <div class="captcha-container">
              <?php echo $recaptcha_html; ?> 
          </div>
          <input type="submit"  class="btn btn-blue" name="insert_enquery" value="Send" />
          
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Enquery Section end -->
