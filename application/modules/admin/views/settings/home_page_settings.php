<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<style type="text/css">
.nav-tabs {
    margin: 0;
    font-size: 0;
    border-bottom-color: #EEE;
}

.nav-tabs li {
    display: inline-block;
    float: none;
}

.nav-tabs li:last-child a {
    margin-right: 0;
}

.nav-tabs li a {
    border-radius: 5px 5px 0 0;
    font-size: 14px;
    margin-right: 1px;
}

.nav-tabs li a, .nav-tabs li a:hover {
    background: #F4F4F4;
    border-bottom: none;
    border-left: 1px solid #EEE;
    border-right: 1px solid #EEE;
    border-top: 3px solid #EEE;
    color: #CCC;
    font-weight:bold;
}

.nav-tabs li a:hover {
    border-bottom-color: transparent;
    border-top: 3px solid #CCC;
    box-shadow: none;
}

.nav-tabs li a:active, .nav-tabs li a:focus {
    border-bottom: 0;
}

.nav-tabs li.active a,
.nav-tabs li.active a:hover,
.nav-tabs li.active a:focus {
    background: #FFF;
    border-left-color: #EEE;
    border-right-color: #EEE;
    border-top: 3px solid #CCC;
    color: #73879C;
    font-weight:bold;
}

.tab-content {
    border-radius: 0 0 4px 4px;
    box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.04);
    background-color: #FFF;
    border: 1px solid #EEE;
    border-top: 0;
    padding: 15px;
}
.tab-pane{ margin: 20px 0;}
</style>
<div class="">
    <div class="page-title">
        <div class="title_left">

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Home Page Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

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

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                        <div id="tabs">
                            <ul class="nav nav-tabs">
                                <!--<li id="basic_setting"><a href="javascript:void(0);" onclick="tab_sel('basic_setting');">Basic Settings</a></li>-->
                                <li id="welcome_text" class="active"><a href="javascript:void(0);" onclick="tab_sel('welcome_text');">Welcome Text</a></li>
                                <li id="offers"><a href="javascript:void(0);" onclick="tab_sel('offers');">Best Offers</a></li>
                                <li id="new_tours"><a href="javascript:void(0);" onclick="tab_sel('new_tours');">Hot Destination</a></li>
                                <li id="choose_us"><a href="javascript:void(0);" onclick="tab_sel('choose_us');">Why choose us</a></li>
                                <li id="set_portfolio"><a href="javascript:void(0);" onclick="tab_sel('set_portfolio');">SFT Portfolio</a></li>
                                <li id="library"><a href="javascript:void(0);" onclick="tab_sel('library');">Library</a></li>
                                <li id="our_partners"><a href="javascript:void(0);" onclick="tab_sel('our_partners');">Our Partners</a></li>
                                <li id="ajmj_club"><a href="javascript:void(0);" onclick="tab_sel('ajmj_club');">AJMJ Club</a></li>
                                <li id="footer"><a href="javascript:void(0);" onclick="tab_sel('footer');">Footer</a></li>
                            </ul>
                            <!--<div class="my_div tab-pane active" id="basic_setting_details">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Site Title">Site Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="site_title" name="site_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->site_title)?$home_page_details->site_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact Info">Contact Info in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="contact_info" class="form-control col-md-7 col-xs-12" style="resize: none;"><?php echo isset($home_page_details->contact_info)?$home_page_details->contact_info:"";?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email">Email<span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->email)?$home_page_details->email:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact No.">Contact No.<span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="contact_no" name="contact_no" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->contact_no)?$home_page_details->contact_no:""; ?>">
                                   </div>
                                </div>

                            </div>--> <!--end of Basic Setting div-->
                            <div class="my_div tab-pane active" id="welcome_text_details" style="display: block;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="welcome_text_title" name="welcome_txt_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->welcome_txt_title)?$home_page_details->welcome_txt_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Paragraph 1">Paragraph 1 in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("welcome_txt_desc1", isset($home_page_details->welcome_txt_desc1)?$home_page_details->welcome_txt_desc1:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Paragraph 2">Paragraph 2 in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("welcome_txt_desc2", isset($home_page_details->welcome_txt_desc2)?$home_page_details->welcome_txt_desc2:"");?>
                                    </div>
                                </div>
                            </div> <!--end of welcome text div-->
                            <div id="offers_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="best_offer_title" name="best_offer_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->best_offer_title)?$home_page_details->best_offer_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Details">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("best_offer_desc", isset($home_page_details->best_offer_desc)?$home_page_details->best_offer_desc:"");?>
                                    </div>
                                </div>
                            </div> <!--end of offer div-->
                            <div id="new_tours_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="toor_title" name="toor_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->toor_title)?$home_page_details->toor_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("toor_desc", isset($home_page_details->toor_desc)?$home_page_details->toor_desc:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Picture">Select Video
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="pv" id="preview1">
                                        <?php load_medias(isset($home_page_details->toor_media)?$home_page_details->toor_media:"", $input_media_id = '#input-media-toor', true); ?>
                                    </div>
                                        <input id="input-media-toor" type="hidden" value="<?php echo isset($home_page_details->toor_media)?$home_page_details->toor_media:1?>" name="toor_media" />
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-primary media-button" data-input-field="#input-media-toor"  data-preview="#preview1" >Media</button>
                                    </div>
                                </div>
                            </div> <!--end of new toor div-->
                            <div id="choose_us_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title in">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="why_choose_title" name="why_choose_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->why_choose_title)?$home_page_details->why_choose_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Best offer">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("why_choose_desc", isset($home_page_details->why_choose_desc)?$home_page_details->why_choose_desc:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Best offer">Paragraph1 in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("why_choose_details1", isset($home_page_details->why_choose_details1)?$home_page_details->why_choose_details1:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Best offer">Paragraph2 in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("why_choose_details2", isset($home_page_details->why_choose_details2)?$home_page_details->why_choose_details2:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Best offer">Paragraph3 in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("why_choose_details3", isset($home_page_details->why_choose_details3)?$home_page_details->why_choose_details3:"");?>
                                    </div>
                                </div>
                            </div> <!--end of choose us div-->
                            <div id="set_portfolio_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="portfolio_title" name="portfolio_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->portfolio_title)?$home_page_details->portfolio_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Details">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("portfolio_desc", isset($home_page_details->portfolio_desc)?$home_page_details->portfolio_desc:"");?>
                                    </div>
                                </div>
                            </div> <!--end of portfolio div-->
                            <div id="library_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="library_title" name="library_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->library_title)?$home_page_details->library_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Details">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("library_desc", isset($home_page_details->library_desc)?$home_page_details->library_desc:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Picture">Add Library Media(s)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="pv" id="preview2">
                                            <?php load_medias(isset($home_page_details->library_media)? [ $home_page_details->library_media ]:"[]", $input_media_id = '#input-media-library'); ?>
                                        </div>
                                            <input id="input-media-library" type="hidden" value="<?php echo isset($home_page_details->library_media)?$home_page_details->library_media:""; ?>" name="library_media" />
                                        <!-- Large modal -->
                                        <button type="button" class="btn btn-primary media-button" data-is-multi="true" data-input-field="#input-media-library"  data-preview="#preview2" >Media</button>
                                    </div>
                                </div>
                            </div> <!--end of portfolio div-->
                            <div id="our_partners_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="partner_title" name="partner_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->partner_title)?$home_page_details->partner_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Details">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("partner_desc", isset($home_page_details->partner_desc)?$home_page_details->partner_desc:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Picture">Add Logo(s)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="pv" id="preview3">
                                        <?php load_medias(isset($home_page_details->partner_media)?[ $home_page_details->partner_media ]:"[]", $input_media_id = '#input-media-partner'); ?>
                                    </div>
                                    <input id="input-media-partner" type="hidden" value="<?php echo isset($home_page_details->partner_media)?$home_page_details->partner_media:'' ?>" name="partner_media" />
                                    <button type="button" class="btn btn-primary media-button" data-input-field="#input-media-partner" data-is-multi="true" data-preview="#preview3" >Media</button>
                                    </div>
                                </div>
                            </div> <!--end of portfolio div-->
                            <div id="ajmj_club_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?><span class="required">*</span>
                                   </label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="ajmj_title" name="ajmj_title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($home_page_details->ajmj_title)?$home_page_details->ajmj_title:" "; ?>">
                                   </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=">Details">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("ajmj_desc", isset($home_page_details->ajmj_desc)?$home_page_details->ajmj_desc:"");?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Picture">Select Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="pv" id="preview4">
                                        <?php load_medias(isset($home_page_details->ajmj_media)?$home_page_details->ajmj_media:"", $input_media_id = '#input-media-ajmj', true); ?>
                                    </div>
                                        <input id="input-media-ajmj" type="hidden" value="<?php echo isset($home_page_details->ajmj_media)?$home_page_details->ajmj_media:1?>" name="ajmj_media" />
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-primary media-button" data-input-field="#input-media-ajmj"  data-preview="#preview4" >Media</button>
                                    </div>
                                </div>
                            </div> <!--end of ajmj div-->
                            <div id="footer_details" class="my_div tab-pane" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=">Details">Details in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo $this->ckeditor->editor("footer_desc", isset($home_page_details->footer_desc)?$home_page_details->footer_desc:"");?>
                                    </div>
                                </div>

                            </div> <!--end of footer div-->
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                                </div>
                            </div>
                        </div> <!--end of tab div-->
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- /page content -->


</div>
</div>

</body>
<script type="text/javascript">
    <?php if ($this->session->userdata('tab_data') != '') {?>
        tab_sel('<?php echo $this->session->userdata('tab_data');?>');
    <?php }?>
    function tab_sel(id)
    {
        $('div li').removeClass('active');
        $('div .my_div.tab-pane').removeClass('active').hide();
        $('#'+id).prop('class', 'active');
        $('#'+id+'_details').prop('class', 'my_div tab-pane active').show();
    }
</script>
