<!-- Layer slider start -->
  <div class="tp-banner" >
    <ul>
      <!-- SLIDE  -->
      <li data-transition="zoomout" data-slotamount="5" data-masterspeed="700"  data-saveperformance="off" > 
        <!-- MAIN IMAGE --> 
        <img src="<?php echo base_url(); ?>front/images/wellness-concepts/slider/slider01.jpg"  alt="SFT - Wellness"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
        <!-- LAYERS --> 
        <!-- LAYER NR. 1 -->
        <div class="tp-caption pp_subheader sfl stl tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="bottom" data-voffset="80" 
              data-speed="600" 
              data-start="1000" 
              data-easing="Power3.easeInOut" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="600" 
			style="z-index: 5; max-width: 600px; max-height: auto; white-space: nowrap;"><span>India</span> </div>
        <!-- LAYER NR. 2 -->
        <div class="tp-caption pp_header sfr str tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="bottom" data-voffset="160" 
              data-speed="600" 
              data-start="1300" 
              data-easing="Power3.easeInOut" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="600" 

			style="z-index: 6; max-width: 600px; max-height: auto; white-space: nowrap;"><span>Ajanta</span> </div>
        <!-- LAYER NR. 3 -->
        <div class="tp-caption pp_content sfb stb tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="bottom" data-voffset="256" 
              data-speed="600" 
              data-start="1600" 
              data-easing="Power3.easeInOut" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="650" 

			style="z-index: 7; max-width: 600px; max-height: auto; white-space: nowrap;">The Ajanta Caves in Aurangabad district of Maharashtra<br/>
          state of India are about 30 rock-cut Buddhist cave <br/>
          monuments which date from the 2nd century BCE to about 480 or 650 CE.</div>
      </li>
      <!-- SLIDE  -->
      <li data-transition="zoomout" data-slotamount="5" data-masterspeed="700"  data-saveperformance="off" > 
        
        <!-- MAIN IMAGE --> 
        <img src="<?php echo base_url(); ?>front/images/wellness-concepts/slider/slider02.jpg"  alt="SFT - Wellness"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
        <!-- LAYERS --> 
        <!-- LAYER NR. 1 -->
        <div class="tp-caption pp_subheader sfl stl tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="bottom" data-voffset="80" 
              data-speed="600" 
              data-start="1000" 
              data-easing="Power3.easeInOut" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="600" 
			style="z-index: 5; max-width: 600px; max-height: auto; white-space: nowrap;"><span>India</span> </div>
        <!-- LAYER NR. 2 -->
        <div class="tp-caption pp_header sfr str tp-resizeme" 
            data-x="center" data-hoffset="0" 
            data-y="bottom" data-voffset="160" 
            data-speed="600" 
            data-start="1300" 
            data-easing="Power3.easeInOut" 
            data-splitin="none" 
            data-splitout="none" 
            data-elementdelay="0.1" 
            data-endelementdelay="0.1" 
            data-endspeed="600" 
            style="z-index: 6; max-width: 600px; max-height: auto; white-space: nowrap;">Kerala</div>
        <!-- LAYER NR. 3 -->
        <div class="tp-caption pp_content sfb stb tp-resizeme" 
            data-x="center" data-hoffset="0" 
            data-y="bottom" data-voffset="256" 
            data-speed="600" 
            data-start="1600" 
            data-easing="Power3.easeInOut" 
            data-splitin="none" 
            data-splitout="none" 
            data-elementdelay="0.1" 
            data-endelementdelay="0.1" 
            data-endspeed="600" 
            style="z-index: 7; max-width: 600px; max-height: auto; white-space: nowrap;">Kerala, a state on India's tropical Malabar Coast,<br>
          has nearly 600km of Arabian Sea shoreline. <br>
          It's known for its palm-lined beaches and backwaters, a network of canals. </div>
      </li>
      <!-- SLIDE  -->
    </ul>
    <div class="tp-bannertimer"></div>
  </div>
  <!-- Layer slider end --> 
  
  <?php if(isset($hide_search)){ ?>
  <!--searchWrapper start-->
  <section class="searchWrapper">
    <form method="post" enctype="multipart/form-data" class="searchField">
      <div>
        <label>TRAVEL STYLE</label>
        <select>
          <option>Select Your Travel Style</option>
          <option>Wellness Plus</option>
          <option>Medi Plus</option>
          <option>Beauty Plus</option>
        </select>
      </div>
      <div>
        <label>DESTINATION</label>
        <input type="text" placeholder="City, Region and Keyword">
      </div>
      <div>
        <label>DATE</label>
        <input type="text" placeholder="">
        <img src="<?php echo base_url(); ?>front/images/home/calender.png" class="calender" alt=""> </div>
      <input name="Search" type="submit" id="Search" title="Search" value="Search">
    </form>
  </section>
  <!--searchWrapper end--> 
  <?php } ?>