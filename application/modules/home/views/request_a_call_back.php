<!-- breadcrumb start -->
<div class="container">
  <div class="row">
    <div class="col-xs-12 breadcrumb-container">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url();?>">Home</a> </li>
        <li class="active">Request a Callback</li>
      </ol>
    </div>
  </div>
</div>
<!-- breadcrumb end -->
<!-- Enquery Section start-->
<div class="blocks welcome-section inner learfix">
  <div class="container">
    <div class="row">
      <form action="" enctype="multipart/form-data" method="post" class="wellness-enquery" >
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
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="name">Name <span>*</span></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" tabindex=1  >
          </div>
          <div class="form-group">
            <label for="callTime">Date you would like to be called <span>*</span></label>
            <input type="text" name="preffered_call_date" class="form-control" id="preffered_call_date" placeholder="Date you would like to be called" tabindex=3 >
          </div>
          <div class="form-group">
            <label for="name">Country code<span>*</span></label>
            <div class="input-group">
              <div class="input-group-addon">+</div>
              <input type="number" oninput="validity.valid||(value='');" class="form-control" id="country_code" name="country_code" placeholder="Country code" tabindex=5>
            </div>
            <div id="country_erdiv"></div>
          </div>
          <div class="form-group">
            <label for="email">Email address <span>*</span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" tabindex=7 >
          </div>

          <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" id="sex" class="form-control" tabindex=9>
              <option value="M">Male</option>
              <option value="F">Female</option>
              <option value="O">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="skId">Skype ID</label>
            <input type="text" class="form-control" name="skype_id" id="skype_id" placeholder="Skype ID" tabindex=11>
          </div>

          <div class="form-group">
            <label>Any past / current serious health conditions?</label>
            <textarea name="health_condition" class="form-control" rows="3" placeholder="Type here..." tabindex=21></textarea>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">

          <div class="form-group">
            <label for="fname">Country <span>*</span></label>
            <select id="country" name="country" class="form-control" tabindex=2>
             <option value="">Select Country</option><?php
                if(!empty($list_countries)){
                    foreach($list_countries as $countries){?>
                        <option value="<?php echo $countries->id;?>"><?php echo $countries->nicename;?></option><?php
                    }
                } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="fname">Preferred time for call <span>*</span> (please specify Vietnam time)</label>
            <select class="form-control" id="preffered_call_time" name="preffered_call_time" tabindex=4 >
              <option value="09:00">09:00</option>
              <option value="09:30">09:30</option>
              <option value="10:00">10:00</option>
              <option value="10:30">10:30</option>
              <option value="11:00">11:00</option>
              <option value="11:30">11:30</option>
              <option value="12:00">12:00</option>
              <option value="12:30">12:30</option>
              <option value="01:00">01:00</option>
              <option value="01:30">01:30</option>
              <option value="02:00">02:00</option>
              <option value="02:30">02:30</option>
              <option value="03:00">03:00</option>
              <option value="03:30">03:30</option>
              <option value="04:00">04:00</option>
              <option value="04:30">04:30</option>
              <option value="05:00">05:00</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tNumber">Telephone number <span>*</span></label>
            <input type="number" oninput="validity.valid||(value='');" min=0 name="phone" class="form-control no-spin-input" id="phone" placeholder="Type your contact number" tabindex=6 >
          </div>
          <div class="form-group">
            <label for="reTypeEmail">Re-type your email-adress <span>*</span></label>
            <input type="email" name="cemail" class="form-control" id="cemail" placeholder="Email address" tabindex=8 >
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" oninput="validity.valid||(value='');" min="0" max="100" class="form-control" id="age" placeholder="Put Your Age" tabindex=10 >
          </div>
          <div class="form-group">
            <label>What are your main goals whilst staying at Kamalaya?</label>
            <div class="checkbox">
              <label>
                <input name="goals[]" type="checkbox" value="Relaxation &amp; serenity" tabindex=12>
                Relaxation &amp; serenity
              </label>
              <label>
                <input name="goals[]" type="checkbox" value="Increasing energy &amp; vitality" tabindex=13>
                Increasing energy &amp; vitality
              </label>
              <label>
                <input name="goals[]" type="checkbox" value="Increasing fitness" tabindex=14>
                Increasing fitness
              </label>
              <label>
                <input name="goals[]"type="checkbox" value="Balancing weight" tabindex=15>
                Balancing weight
              </label>
              <label>
                <input name="goals[]" type="checkbox" value="Spiritual healing" tabindex=16>
                Spiritual healing
              </label>
              <label>
                <input name="goals[]" type="checkbox" value="Stress management" tabindex=17>
                Stress management
              </label>
              <label>
                <input name="goals[]" type="checkbox" value="Balancing emotions" tabindex=18>
                Balancing emotions
              </label>
              <label>
                <input name="goals[]"type="checkbox" value="Detoxification" tabindex=19>
                Detoxification
              </label>
              <label>
                <input name="goals[]" type="checkbox" value="Other" tabindex=20>
                Other
              </label>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>
        <div class="form-group text-center enquery-submit-area">
          <p>If you would like some help in choosing a Wellness Program, one of our consultants would be happy to advise you. You can contact them via SKYPE, live chat, email or telephone.</p>
          <div class="captcha-container"><?php echo $recaptcha_html; ?> </div>
          <button type="submit" id="submit" class="btn btn-blue">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Enquery Section end -->