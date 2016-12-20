<?php 
    $languages = get_all_language(); 
    $selected_language = "";
    if($this->session->userdata('language')){
       $selected_language =  $this->session->userdata('language');
       
    }
?>
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
			<ul class="nav navbar-nav" style="margin-top:11px">
				<li>
                    <select id="lang" class="form-control">
                        <?php
                        if (!empty($languages)) {
                            foreach ($languages as $lang) {
                                ?>
                                <option <?php echo ($lang->id==$selected_language)?"selected":""; ?> value="<?php echo $lang->id; ?>"><?php echo $lang->language_name; ?></option>
                            <?php }
                        } ?>
                    </select>
                </li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>front/images/vivian.jpg" alt="Admin" />Vivian Nguyen
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                </li>
            </ul>
        </nav>
    </div>
</div>
